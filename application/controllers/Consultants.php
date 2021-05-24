<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Consultants extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // $this->load->model('home_model');
    }

    public function index()
	{
        $this->load->model('model_consultants');
        $consultants = $this->model_consultants->getAllConsultants();
        
        $data['consultants'] =  $consultants;
        $this->load->view('includes/header', $data);
        $this->load->view('view_consultants', $data);
        $this->load->view('includes/footer', $data);
    }

	public function add_consultant()
	{
        $this->load->model('model_consultants');

        if($this->input->method(TRUE) == 'GET')
        {
            $data = array();
            $this->load->view('includes/header', $data);
            $this->load->view('view_add_consultant', $data);
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

            $this->model_consultants->addUser($data);
            
            redirect('add-consultant');
        }
	}
}
