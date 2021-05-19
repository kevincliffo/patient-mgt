<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tasks extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // $this->load->model('home_model');
    }

    public function index()
	{
        $this->load->model('model_tasks');
        $tasks = $this->model_tasks->getAllTasks();
        
        $data['tasks'] =  $tasks;
        $this->load->view('includes/header', $data);
        $this->load->view('view_tasks', $data);
        $this->load->view('includes/footer', $data);
    }

	public function add_task()
	{
        $this->load->model('model_tasks');

        if($this->input->method(TRUE) == 'GET')
        {
            $data = array();
            $this->load->view('includes/header', $data);
            $this->load->view('view_add_task', $data);
            $this->load->view('includes/footer', $data);
        }
        elseif($this->input->method(TRUE) == 'POST')
        {
            $data = array(
                'FirstName'    => $this->input->post('firstName'),
                'LastName'     =>  $this->input->post('lastName'),
                'Email'        => $this->input->post('email'),
                'Password'     => md5($this->input->post('password')),
                'TaskName'     =>  $this->input->post('taskName'),
                'TaskType'     => $this->input->post('taskType'),
                'ProfileImage' => '',
                'IDNumber'     => $this->input->post('idNumber'),
                'MobileNo'     => $this->input->post('mobileNo'),
            );

            $this->model_tasks->addTask($data);
            
            redirect('add-task');
        }
	}
}
