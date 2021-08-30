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

        $nextPatientId = $this->model_patients->getNextPatientId();
        $patientIdentifier = 'PAT-'
                           . date('Y')
                           .'-'
                           . str_pad($nextPatientId, 6, "0", STR_PAD_LEFT);

        if($this->input->method(TRUE) == 'GET')
        {
            $patients = $this->model_patients->getYourPatients();
            
            $data['patients'] =  $patients;
            $data['patientIdentifier'] = $patientIdentifier;

            $this->load->view('includes/header', $data);
            $this->load->view('view_add_appointment', $data);
            $this->load->view('includes/footer', $data);
        }
        elseif($this->input->method(TRUE) == 'POST')
        {
            $appointmentDate = strtotime($this->input->post('appointmentDate'));
            $date = date('Y-m-d', $appointmentDate);
            
            $data = array(
                'PatientIdentifier'=>  $this->input->post('symptoms'),
                'Symptoms'        =>   $this->input->post('symptoms'),
                'AppointmentDate' =>   $date
            );
            
            $patient_type = $this->input->post('patientType');
            $this->model_appointments->addAppointment($data);

            if($patient_type == 'New')
            {
                $thi->add_patient_to_database($patientIdentifier);
            }
                
          
            redirect('add-appointment');
        }
	}

    function add_patient_to_database($patientIdentifier)
    {
        $data = array(
            'AddedBy'             => $this->session->userdata('userId'),
            'PatientIdentifier'   => $patientIdentifier,
            'FirstName'           => $this->input->post('firstName'),
            'LastName'            =>  $this->input->post('lastName'),
            'IDNumber'            => $this->input->post('idNumber'),
            'Email'               => $this->input->post('email'),
            'Gender'              => $this->input->post('gender'),
            'PatientType'         => $this->input->post('patientType'),
            'PatientImage'        => '',
            'MobileNo'            => $this->input->post('mobileNo'),
            'Age'                 => $this->input->post('age'),
            'UnderlyingCondition' => $this->input->post('underlyingCondition'),
            'Address'             => $this->input->post('address'),
            'Location'            => $this->input->post('location')
        );
        $this->load->model('model_patients');        
        $this->model_patients->addPatient($data);
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
