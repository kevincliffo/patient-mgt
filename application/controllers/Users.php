<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // $this->load->model('home_model');
    }

    public function index()
	{
        $this->load->model('model_users');
        $users = $this->model_users->getAllUsers();
        
        $data['users'] =  $users;
        $this->load->view('includes/header', $data);
        $this->load->view('view_users', $data);
        $this->load->view('includes/footer', $data);
    }

    function convert_string_to_date($date_string)
    {
        $date = strtotime($date_string);
        $date_object = date('Y-m-d H:i:s', $date);
        
        //$date_object->setTimezone(new DateTimeZone('Africa/Nairobi'));        
        $timestamp = $date_object;
        return $timestamp;
    }

	public function add_user()
	{
        $this->load->model('model_users');

        if($this->input->method(TRUE) == 'GET')
        {
            $data = array();
            $this->load->view('includes/header', $data);
            $this->load->view('view_add_user', $data);
            $this->load->view('includes/footer', $data);
        }
        elseif($this->input->method(TRUE) == 'POST')
        {
            $data = array(
                'FirstName'    => $this->input->post('firstName'),
                'LastName'     =>  $this->input->post('lastName'),
                'Email'        => $this->input->post('email'),
                'Password'     => md5($this->input->post('password')),
                'UserName'     =>  $this->input->post('userName'),
                'UserType'     => $this->input->post('userType'),
                'Gender'       => $this->input->post('gender'),
                'IDNumber'     => $this->input->post('idNumber'),
                'MobileNo'     => $this->input->post('mobileNo'),
                'Location'     => $this->input->post('location'),
                'Address'      => $this->input->post('address'),
                'DOB'          => $this->convert_string_to_date($this->input->post('dob')),
                'UnderlyingCondition' => $this->input->post('underlyingCondition')
            );

            while(TRUE)
            {
                $ret = $this->upload_user_image();
                if($ret['errorFound'])
                {
                    $this->session->set_flashdata('message_no', 1);
                    $this->session->set_flashdata('message', $ret['message']);
                    redirect('add-user');
                    break;
                }
                
                $data['ProfileImage'] = $ret['fileName'];
                $this->model_users->addUser($data);
                break;
            }
            
            redirect('add-user');
        }
	}

    function upload_user_image()
    {
        $config = array('upload_path' => "./user-images/",
                        'allowed_types' => "png|jpeg|jpg",
                        'max_size' => "2048000");

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        
        if($this->upload->do_upload('profileImage'))
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

    public function user_profile($id)
    {
        $this->load->model('model_users');

        $data['user'] = $this->model_users->getUserDataOverId($id);
        $this->load->view('includes/header', $data);
        $this->load->view('view_profile_user', $data);
        $this->load->view('includes/footer', $data);
    }

    public function profile()
    {
        $data = array();
        $this->load->view('includes/header', $data);
        $this->load->view('view_profile', $data);
        $this->load->view('includes/footer', $data);        
    }
}
