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
                'ProfileImage' => '',
                'IDNumber'     => $this->input->post('idNumber'),
                'MobileNo'     => $this->input->post('mobileNo'),
            );

            $this->model_users->addUser($data);
            
            redirect('add-user');
        }
	}
}
