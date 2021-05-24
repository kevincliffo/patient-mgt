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
                'ConsultantName' => $this->input->post('name'),
                'PracticeNumber' => $this->input->post('practiceNumber'),
                'Email'          => $this->input->post('email'),
                'Field'          => $this->input->post('field'),
                'MobileNumber'   => $this->input->post('mobileNo'),
            );

            $this->model_consultants->addConsultant($data);
            
            redirect('add-consultant');
        }
	}
}
