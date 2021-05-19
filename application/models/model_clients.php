<?php
class Model_Clients extends CI_Model {
    function clientExists($email){
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('CompanyEmail', $email);
        $query = $this->db->get('clients');
        
        if($query->num_rows() > 0)
        {
            return true;
        }
        return false;
    }
    
    function updateclientsubscriptionstatus($clientid, $status){
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('ClientId', $clientid);
        $data = array('Subscribed' => $status);
        $result = $this->db->update('clients', $data);

        return $result;
    }

    function updateActiveStatus($id)
    {
        $data = array('Active' => 1);
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('ClientId', $id);
        $this->db->update('clients', $data);
    }

    function updateLastLogin($email){
        $now = new DateTime();
        $now->setTimezone(new DateTimeZone('Africa/Nairobi'));        
        $timestamp = $now->format('Y-m-d H:i:s');

        $data = array('LastLogin' => $timestamp);
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('Email', $email);
        $this->db->update('clients', $data);
        
        // $array = array('Email' => $email, 'LastLogin' => $timestamp);
        // $this->db->set($array);
        // $this->db->insert('logins');        
    }

    function deleteclient($id)
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('ClientId', $id);

        $this->db->delete('clients');
    }

    function validate()
    {
        $this->db->query("SET sql_mode = '' ");        
        $this->db->select('Email, FirstName, LastName, ClientType');
        $this->db->where('Email', $this->input->post('email'));
        $this->db->where('Password', md5($this->input->post('password')));
        $query = $this->db->get('clients');
        
        if($query->num_rows() > 0){
            $ret = array(
                'errorFound' => FALSE,
                'message'    => 'Client Found',
                'Email'      => $query->result_array()[0]['Email'],
                'FirstName'  => $query->result_array()[0]['FirstName'],
                'LastName'   => $query->result_array()[0]['LastName'],
                'ClientType'   => $query->result_array()[0]['ClientType'],
            );

            $this->updateLastLogin($this->input->post('email'));
            return $ret;
        }

        return array(
            'errorFound' => TRUE,
            'message'    => 'Client not Found',
            'Email'      => '',
            'FirstName'  => '',
            'LastName'   => '',
            'ClientType'   => ''
        );
    }

    function getNextClientId()
    { 
        $this->db->query("SET sql_mode = '' ");
        $sql = 'SELECT MAX(ClientId) AS Max_ClientId FROM clients';
        $result = $this->db->query($sql);

        if($result->num_rows() > 0)
        {
            $count = (int)$result->result()[0]->Max_ClientId ;
        }
        else
        {
            $count = 0;
        }

        return $count + 1;
    }       

    function getAdminClientsCount()
    { 
        $this->db->query("SET sql_mode = '' ");
        $sql = "SELECT COUNT(*) AS US_Count FROM clients WHERE ClientType='ADMIN'";
        $result = $this->db->query($sql);

        if($result->num_rows() > 0)
        {
            $count = (int)$result->result()[0]->US_Count ;
        }
        else
        {
            $count = 0;
        }

        return $count;
    } 

    function getClientsCount()
    { 
        $this->db->query("SET sql_mode = '' ");
        $sql = 'SELECT COUNT(*) AS US_Count FROM clients';
        $result = $this->db->query($sql);

        if($result->num_rows() > 0)
        {
            $count = (int)$result->result()[0]->US_Count ;
        }
        else
        {
            $count = 0;
        }

        return $count;
    }      
    
    function addClient($clientdata)
    {
        while(TRUE)
        {
            $clientExists = $this->clientExists($clientdata['CompanyEmail']);


            if($clientExists)
            {
                $res = array(
                    'errorFound' => TRUE,
                    'message'    => 'Email already in use'
                );
                break;
            }

            $this->db->query("SET sql_mode = '' ");
            $this->db->set('CreatedDate', 'NOW()', FALSE);
            $insert = $this->db->insert('clients', $clientdata);

            $res = array(
                'id'         => 0,
                'errorFound' => TRUE,
                'message'    => 'Error Adding Client'
            );

            if($insert)
            {
                $res = array(
                    'id'         => $this->db->insert_id(),
                    'errorFound' => FALSE,
                    'message'    => 'Client added successfully!'
                );
            }
            break;
        }
        return $res;
    }
    
    public function getClientDataOverId($id)
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('ClientId', $id);

        $query = $this->db->get('clients');

        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    } 

    public function getclientdataoveremail($email)
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('Email', $email);

        $query = $this->db->get('clients');

        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    } 

    public function getAllClients()
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->select('*'); 
        $this->db->order_by('ClientId', 'ASC');
        $query = $this->db->get('clients');
        
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function getTopFiveRecentClients()
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->order_by('ClientId', 'DESC');
        $this->db->limit('5'); 
        $this->db->order_by('ClientId', 'ASC');
        $query = $this->db->get('clients');
        
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    }     
}