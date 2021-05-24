<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Patients extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // $this->load->model('home_model');
    }

    public function index()
	{
        $this->load->model('model_patients');
        $patients = $this->model_patients->getAllPatients();
        
        $data['patients'] =  $patients;
        $this->load->view('includes/header', $data);
        $this->load->view('view_patients', $data);
        $this->load->view('includes/footer', $data);
    }

	public function add_patient()
	{
        $this->load->model('model_patients');

        if($this->input->method(TRUE) == 'GET')
        {
            $data = array();
            $this->load->view('includes/header', $data);
            $this->load->view('view_add_patient', $data);
            $this->load->view('includes/footer', $data);
        }
        elseif($this->input->method(TRUE) == 'POST')
        {
            $data = array(
                'FirstName'           => $this->input->post('firstName'),
                'LastName'            =>  $this->input->post('lastName'),
                'IDNumber'            => $this->input->post('idNumber'),
                'Email'               => $this->input->post('email'),
                'Gender'              => $this->input->post('gender'),
                'PatientType'         => $this->input->post('patientType'),
                'PatientImage'        => '',
                'MobileNo'            => $this->input->post('mobileNo'),
                'DOB'                 => $this->convert_string_to_date($this->input->post('dob')),
                'UnderlyingCondition' => $this->input->post('underlyingCondition'),
                'Address'             => $this->input->post('Address'),
                'Location'            => $this->input->post('Location')
            );

            while(TRUE)
            {
                $ret = $this->upload_patient_image();
                if($ret['errorFound'])
                {
                    $this->session->set_flashdata('message_no', 1);
                    $this->session->set_flashdata('message', $ret['message']);
                    redirect('register');
                    break;
                }
                
                $data['PatientImage'] = $ret['fileName'];
                $this->model_patients->addPatient($data);
                break;
            }
            redirect('add-patient');
        }
	}

    function upload_patient_image()
    {
        $config = array('upload_path' => "./patient-images/",
                        'allowed_types' => "png|jpeg|jpg",
                        'max_size' => "2048000");

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        
        if($this->upload->do_upload('patientImage'))
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
    
    public function patient_profile()
    {
        $this->load->model('model_patients');
        $data['patient'] = $this->model_patients->getPatientDataOverId(1);
   
        $this->load->view('includes/header', $data);
        $this->load->view('view_patient_profile', $data);
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
}
