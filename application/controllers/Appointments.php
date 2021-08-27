<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Appointments extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // $this->load->model('home_model');
    }

    public function index()
	{
        $this->load->model('model_appointments');
        $appointments = $this->model_appointments->getAllAppointmentsExtended();
        //print_r($appointments);die();
        $data['appointments'] =  $appointments;
        $this->load->view('includes/header', $data);
        $this->load->view('view_appointments', $data);
        $this->load->view('includes/footer', $data);
    }

	public function add_appointment()
	{
        $this->load->model('model_appointments');
        $this->load->model('model_patients');

        if($this->input->method(TRUE) == 'GET')
        {
            $patients = $this->model_patients->getAllPatients();
            $data['patients'] =  $patients;
            $data['today'] = date('Y-m-d H:i:s');
            $this->load->view('includes/header', $data);
            $this->load->view('view_add_appointment', $data);
            $this->load->view('includes/footer', $data);
        }
        elseif($this->input->method(TRUE) == 'POST')
        {
            $appointmentDate = strtotime($this->input->post('appointmentDate'));
            $date = date('Y-m-d', $appointmentDate);
            //print_r($date);die();
            $data = array(
                'PatientId'       =>  $this->session->userdata('userId'),
                'Symptoms'        =>  $this->input->post('symptoms'),
                'AppointmentDate' =>  $date
            );
            
            $this->model_appointments->addAppointment($data);
                
            redirect('add-appointment');
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
