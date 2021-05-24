<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // $this->load->model('home_model');
    }

    function doinitializetasksif()
    {
        $this->load->model('model_users');

        $userscount = $this->model_users->getuserscount();

        while(true)
        {
            if($userscount > 0)
            {
                break;
            }

            $userdata = array(
                'UserName' => 'admin',
                'FirstName' => 'Admin',
                'LastName' => 'Admin',
                'UserType' => 'Admin',
                'Email' => 'admin@yahoo.com',			
                'Password' => md5('1admin@'),
                'IDNumber' => '00000000',
                'ProfileImage' => 'user.jpg',
                'MobileNo' => '0700000000',
            );        

            $query = $this->model_users->addUser($userdata);
            break;
        }
    }

    public function register()
    {
        if($this->input->method(TRUE) == 'GET')
        {
            $this->load->view('view_registration');
        }
        elseif($this->input->method(TRUE) == 'POST')
        {
            $data = array(
                'UserName'  => $this->input->post('userName'),
                'FirstName' => $this->input->post('firstName'),
                'LastName'  => $this->input->post('lastName'),
                'UserType'  => 'User',
                'Email'     => $this->input->post('email'),
                'Password'  => $this->input->post('password'),
                'IDNumber'  => $this->input->post('idNumber'),
                'MobileNo'  => $this->input->post('mobileNo')
            );

            while(TRUE)
            {
                $ret = $this->upload_user_image();
                if($ret['errorFound'])
                {
                    $this->session->set_flashdata('message_no', 1);
                    $this->session->set_flashdata('message', $ret['message']);
                    redirect('register');
                    break;
                }
                
                $data['ProfileImage'] = $ret['fileName'];
                print_r($data);
                break;
            }
        }
    }

    function upload_user_image()
    {
        $config = array('upload_path' => "./user-images/",
                        'allowed_types' => "png|jpeg|jpg",
                        'max_size' => "2048000");

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        
        if($this->upload->do_upload('userImage'))
        {
            $upload_data = $this->upload->data();

            $file_name = $upload_data['file_name'];
            $file_full_path = $upload_data['full_path'];
            
            $value = array(
                        'errorFound' => 0,
                        'message'    => '',
                        'fileName'   => $file_name,
                        'file_full_path' => $file_full_path
                    );
        }
        else
        {
            $value = array(
                'errorFound' => 1,
                'message'    => $this->upload->display_errors(),
                'fileName'   => ''
            );
        }
        return $value;
    }

    public function dashboard()
    {
        $data['title'] = 'Chriscam &#8739; Creative Business & Consultancy';
        $data['faviconpartpath'] = base_url().'images/favicon.png';

        $this->load->view('includes/header', $data);
        $this->load->view('view_home', $data);
        $this->load->view('includes/footer', $data);	
    }

	public function index()
	{
        $this->load->model('model_users');

        if($this->input->method(TRUE) == 'GET')
        {
            $this->doinitializetasksif();
            $this->load->view('view_login');
        }
        elseif($this->input->method(TRUE) == 'POST')
        {
            while(TRUE)
            {
                $ret = $this->model_users->validate();

                if($ret['errorFound'])
                {
                    $this->session->set_flashdata('message_no', 1);
                    $this->session->set_flashdata('message', $ret['message']);

                    redirect('home');
                    break;
                }

                $name = $ret['FirstName']. ' '. $ret['LastName'];
                $this->session->set_userdata('name', $name);
                $this->session->set_userdata('userName', $ret['UserName']);
                $this->session->set_userdata('email', $ret['Email']);
                $this->session->set_userdata('userType', $ret['UserType']);
                $this->session->set_userdata('profileImage', $ret['ProfileImage']);
                $this->session->set_userdata('loggedIn', TRUE);
                $this->session->set_userdata('showViewMenu', FALSE);
                redirect('dashboard');
                break;
            }
        }
	}
    
    function logout()
    {
        $sess_array = array(
                      'Email' => '',
                      'is_logged_in' =>FALSE,
                      'userType' => ''
                     );
                     
        $sess_array = array(
            'errorFound' => '',
            'message'    => 'User Logged Out',
            'Email'      => '',
            'FirstName'  => '',
            'LastName'   => '',
            'UserType'   => '',
            'UserName'   => '',
        );

        $this->session->sess_destroy();
        $data['title'] = 'Login';
        $data['message'] = 'Successfully Logged Out';
        $data['loggedout'] = TRUE;
        
        redirect('', 'refresh');        
    }
}
