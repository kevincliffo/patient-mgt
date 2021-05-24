<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Clinics extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // $this->load->model('home_model');
    }

    public function index()
	{
        $this->load->model('model_clinics');
        $clinics = $this->model_clinics->getAllClinics();
        //print_r($clinics);die();
        $data['clinics'] =  $clinics;
        $this->load->view('includes/header', $data);
        $this->load->view('view_clinics', $data);
        $this->load->view('includes/footer', $data);
    }

	public function add_clinic()
	{
        $this->load->model('model_clinics');

        if($this->input->method(TRUE) == 'GET')
        {
            $data = array();
            $this->load->view('includes/header', $data);
            $this->load->view('view_add_clinic', $data);
            $this->load->view('includes/footer', $data);
        }
        elseif($this->input->method(TRUE) == 'POST')
        {
            $data = array(
                'Name'       => $this->input->post('name'),
                'Manager'        =>  $this->input->post('manager'),
                'Location'       => $this->input->post('location'),
                'PhoneNumber'        =>  $this->input->post('phoneNumber'),
            );
            
            $this->model_clinics->addClinic($data);
                
            redirect('add-clinic');
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
}