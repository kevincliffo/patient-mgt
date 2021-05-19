<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Clients extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // $this->load->model('home_model');
    }

    public function index()
	{
        $this->load->model('model_clients');
        $clients = $this->model_clients->getAllClients();
        
        $data['clients'] =  $clients;
        $this->load->view('includes/header', $data);
        $this->load->view('view_clients', $data);
        $this->load->view('includes/footer', $data);
    }

    function generateclientno()
    {
    	$this->load->model('model_clients');
        $id = $this->model_clients->getnextclientid();
    	$prefix = 'CUST';
		$currentyear = date("Y");
		
		$clientno = $prefix 
		          . '-'
		          . $currentyear 
		          . '-'
		          . str_pad($id, 6, "0", STR_PAD_LEFT);

      	return $clientno;
    }

	public function add_client()
	{
        $this->load->model('model_clients');

        if($this->input->method(TRUE) == 'GET')
        {
            $data = array();
            $this->load->view('includes/header', $data);
            $this->load->view('view_add_client', $data);
            $this->load->view('includes/footer', $data);
        }
        elseif($this->input->method(TRUE) == 'POST')
        {
            $data = array(
                'ClientNumber'           => $this->generateclientno(),
                'CompanyName'            =>  $this->input->post('companyName'),
                'CompanyEmail'           => $this->input->post('companyEmail'),
                'CompanyTelephone'       => $this->input->post('companyTelephone'),
                'ClientType'             => $this->input->post('clientType'),
                'ContactPersonName'      =>  $this->input->post('contactPersonName'),
                'ContactPersonEmail'     => $this->input->post('contactPersonEmail'),
                'ContactPersonTelephone' => $this->input->post('mobileNo'),
                'Address'                => $this->input->post('address'),
            );

            $this->model_clients->addClient($data);
            
            redirect('add-client');
        }
	}
}
