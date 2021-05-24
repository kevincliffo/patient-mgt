<?php
class Model_Consultants extends CI_Model {
    function updateActiveStatus($id)
    {
        $data = array('Active' => 1);
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('ConsultantId', $id);
        $this->db->update('consultants', $data);
    }

    function updateLastLogin($email){
        $now = new DateTime();
        $now->setTimezone(new DateTimeZone('Africa/Nairobi'));        
        $timestamp = $now->format('Y-m-d H:i:s');

        $data = array('LastLogin' => $timestamp);
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('Email', $email);
        $this->db->update('consultants', $data);
        
        // $array = array('Email' => $email, 'LastLogin' => $timestamp);
        // $this->db->set($array);
        // $this->db->insert('logins');        
    }

    function deleteconsultant($id)
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('ConsultantId', $id);

        $this->db->delete('consultants');
    }

    function validate()
    {
        $this->db->query("SET sql_mode = '' ");        
        $this->db->select('Email, FirstName, LastName, ConsultantType, ConsultantName');
        $this->db->where('Email', $this->input->post('email'));
        $this->db->where('Password', md5($this->input->post('password')));
        $query = $this->db->get('consultants');
        
        if($query->num_rows() > 0){
            if($query->result_array()[0]['ProfileImage'] == '')
            {
                $profileImage = 'consultant-placeholder.png';
            }
            else
            {
                $profileImage = $query->result_array()[0]['ProfileImage'];
            }

            $ret = array(
                'errorFound'   => FALSE,
                'message'      => 'Consultant Found',
                'Email'        => $query->result_array()[0]['Email'],
                'FirstName'    => $query->result_array()[0]['FirstName'],
                'LastName'     => $query->result_array()[0]['LastName'],
                'ConsultantType'     => $query->result_array()[0]['ConsultantType'],
                'ConsultantName'     => $query->result_array()[0]['ConsultantName'],
                'ProfileImage' => $profileImage
            );
            
            $this->updateLastLogin($this->input->post('email'));
            return $ret;
        }

        return array(
            'errorFound'   => TRUE,
            'message'      => 'Consultant not Found',
            'Email'        => '',
            'FirstName'    => '',
            'LastName'     => '',
            'ConsultantType'     => '',
            'ConsultantName'     => '',
            'ProfileImage' => ''
        );
    }

    function getNextConsultantId()
    { 
        $this->db->query("SET sql_mode = '' ");
        $sql = 'SELECT MAX(ConsultantId) AS Max_ConsultantId FROM consultants';
        $result = $this->db->query($sql);

        if($result->num_rows() > 0)
        {
            $count = (int)$result->result()[0]->Max_ConsultantId ;
        }
        else
        {
            $count = 0;
        }

        return $count + 1;
    }

    function getConsultantsCount()
    { 
        $this->db->query("SET sql_mode = '' ");
        $sql = 'SELECT COUNT(*) AS US_Count FROM consultants';
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
    
    function addConsultant($consultantdata)
    {
        while(TRUE)
        {
            $consultantExists = $this->consultantExists($consultantdata['Email']);


            if($consultantExists)
            {
                $res = array(
                    'errorFound' => TRUE,
                    'message'    => 'Email already in use'
                );
                break;
            }

            $this->db->query("SET sql_mode = '' ");
            $this->db->set('CreatedDate', 'NOW()', FALSE);
            $insert = $this->db->insert('consultants', $consultantdata);

            $res = array(
                'id'         => 0,
                'errorFound' => TRUE,
                'message'    => 'Error Adding Consultant'
            );

            if($insert)
            {
                $res = array(
                    'id'         => $this->db->insert_id(),
                    'errorFound' => FALSE,
                    'message'    => 'Consultant added successfully!'
                );
            }
            break;
        }
        return $res;
    }
    
    public function getConsultantDataOverId($id)
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('ConsultantId', $id);

        $query = $this->db->get('consultants');

        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    } 

    public function getConsultantDataOverEmail($email)
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('Email', $email);

        $query = $this->db->get('consultants');

        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    } 

    public function getAllConsultants()
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->select('*'); 
        $this->db->order_by('ConsultantId', 'ASC');
        $query = $this->db->get('consultants');
        
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function getTopFiveRecentConsultants()
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->order_by('ConsultantId', 'DESC');
        $this->db->limit('5'); 
        $this->db->order_by('ConsultantId', 'ASC');
        $query = $this->db->get('consultants');
        
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    }     
}