<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Projects extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // $this->load->model('home_model');
    }

    public function index()
	{
        $this->load->model('model_projects');
        $projects = $this->model_projects->getAllProjects();
        
        $data['projects'] =  $projects;
        $this->load->view('includes/header', $data);
        $this->load->view('view_projects', $data);
        $this->load->view('includes/footer', $data);
    }

    function generate_project_number()
    {
        $this->load->model('model_projects');
        $id = $this->model_projects->getNextProjectId();

        $prefix = 'PRJ';
        $year = date('Y');

        $project_no = $prefix
                    . '-'
                    . $year
                    . '-'
                    . str_pad($id, 6, "0", STR_PAD_LEFT);

        return  $project_no;
    }

	public function add_project()
	{
        $this->load->model('model_projects');
        $this->load->model('model_clients');
        $this->load->model('model_users');


        if($this->input->method(TRUE) == 'GET')
        {
            $data['project_no'] = $this->generate_project_number();
            $data['clients'] = $this->model_clients->getAllClients();
            $data['users'] = $this->model_users->getAllUsers();
            $this->load->view('includes/header', $data);
            $this->load->view('view_add_project', $data);
            $this->load->view('includes/footer', $data);
        }
        elseif($this->input->method(TRUE) == 'POST')
        {          
            $data = array(
                'ProjectNumber'  => $this->input->post('projectNumber'),
                'ProjectType'    => $this->input->post('projectType'),
                'ProjectFileUrl' => $this->input->post('projectFile'),
                'Client'         => $this->input->post('client'),
                'Description'    => $this->input->post('description'),
                'Status'         => $this->input->post('projectStatus'),
                'AssignedTo'     => $this->input->post('assignedTo'),
                'CreatedDate'    => $this->convert_string_to_date($this->input->post('startDate')),
                'FinishedDate'   => $this->convert_string_to_date($this->input->post('finishDate'))
            );

            $this->model_projects->addProject($data);
            
            redirect('add-project');
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
