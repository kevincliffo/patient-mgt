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
                'Gender'   => 'FEMALE',
                'DOB'      => '1995-01-01 08:00:00',
                'UnderlyingCondition' => '',
                'Address'  => '6725-80100 Mombasa',
                'Location' => 'Mombasa'
            );        

            $query = $this->model_users->addUser($userdata);
            break;
        }
    }

    function convert_string_to_date($date_string)
    {
        $date = strtotime($date_string);
        $date_object = date('Y-m-d H:i:s', $date);
        
        //$date_object->setTimezone(new DateTimeZone('Africa/Nairobi'));        
        $timestamp = $date_object;
        return $timestamp;
    }

    public function register()
    {
        if($this->input->method(TRUE) == 'GET')
        {
            $this->load->view('view_registration');
        }
        elseif($this->input->method(TRUE) == 'POST')
        {
            $this->load->model('model_users');
            $data = array(
                'UserName'  => $this->input->post('userName'),
                'FirstName' => $this->input->post('firstName'),
                'LastName'  => $this->input->post('lastName'),
                'UserType'  => 'User',
                'Gender'       => $this->input->post('gender'),
                'Email'     => $this->input->post('email'),
                'Password'  => md5($this->input->post('password')),
                'IDNumber'  => $this->input->post('idNumber'),
                'MobileNo'  => $this->input->post('mobileNo'),
                'Location'  => $this->input->post('location'),
                'Address'  => $this->input->post('address'),
                'DOB'          => $this->convert_string_to_date('dob'),
                'UnderlyingCondition' => $this->input->post('underlyingCondition'),
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
                $this->model_users->addUser($data);
                break;
            }
            redirect('login');
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
        $this->load->model('model_consultants');
        $this->load->model('model_patients');
        $this->load->model('model_users');
        $this->load->model('model_appointments');
        $this->load->model('model_clinics');

        $data['title'] = 'Chriscam &#8739; Creative Business & Consultancy';
        $data['faviconpartpath'] = base_url().'images/favicon.png';

        $data['consultants_count'] = $this->model_consultants->getConsultantsCount();
        $data['patients_count'] = $this->model_patients->getPatientsCount();
        $data['users_count'] = $this->model_users->getUsersCount();
        $data['appointments_count'] = $this->model_appointments->getAppointmentsCount();
        $data['clinics_count'] = $this->model_clinics->getClinicsCount();

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
                $this->session->set_userdata('firstName', $ret['FirstName']);
                $this->session->set_userdata('lastName', $ret['LastName']);
                $this->session->set_userdata('name', $name);
                $this->session->set_userdata('userId', $ret['UserId']);
                $this->session->set_userdata('userName', $ret['UserName']);
                $this->session->set_userdata('email', $ret['Email']);
                $this->session->set_userdata('userType', $ret['UserType']);
                $this->session->set_userdata('idNumber', $ret['IDNumber']);
                $this->session->set_userdata('mobileNo', $ret['MobileNo']);
                $this->session->set_userdata('address', $ret['Address']);
                $this->session->set_userdata('location', $ret['Location']);
                $this->session->set_userdata('gender', $ret['Gender']);
                $this->session->set_userdata('dob', $ret['DOB']);
                $this->session->set_userdata('underlyingCondition', $ret['UnderlyingCondition']);
                $this->session->set_userdata('createdDate', $ret['CreatedDate']);
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
