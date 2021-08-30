<?php
class Model_Patients extends CI_Model {
    function patientExists($email){
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('Email', $email);
        $query = $this->db->get('patients');
        
        if($query->num_rows() > 0)
        {
            return true;
        }
        return false;
    }
    
    function updatepatientsubscriptionstatus($patientid, $status){
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('PatientId', $patientid);
        $data = array('Subscribed' => $status);
        $result = $this->db->update('patients', $data);

        return $result;
    }

    function updateActiveStatus($id)
    {
        $data = array('Active' => 1);
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('PatientId', $id);
        $this->db->update('patients', $data);
    }

    function updateLastLogin($email){
        $now = new DateTime();
        $now->setTimezone(new DateTimeZone('Africa/Nairobi'));        
        $timestamp = $now->format('Y-m-d H:i:s');

        $data = array('LastLogin' => $timestamp);
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('Email', $email);
        $this->db->update('patients', $data);
        
        // $array = array('Email' => $email, 'LastLogin' => $timestamp);
        // $this->db->set($array);
        // $this->db->insert('logins');        
    }

    function deletepatient($id)
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('PatientId', $id);

        $this->db->delete('patients');
    }

    function validate()
    {
        $this->db->query("SET sql_mode = '' ");        
        $this->db->select('Email, FirstName, LastName, PatientType, PatientName');
        $this->db->where('Email', $this->input->post('email'));
        $this->db->where('Password', md5($this->input->post('password')));
        $query = $this->db->get('patients');
        
        if($query->num_rows() > 0){
            if($query->result_array()[0]['ProfileImage'] == '')
            {
                $profileImage = 'patient-placeholder.png';
            }
            else
            {
                $profileImage = $query->result_array()[0]['ProfileImage'];
            }

            $ret = array(
                'errorFound'   => FALSE,
                'message'      => 'Patient Found',
                'Email'        => $query->result_array()[0]['Email'],
                'FirstName'    => $query->result_array()[0]['FirstName'],
                'LastName'     => $query->result_array()[0]['LastName'],
                'PatientType'     => $query->result_array()[0]['PatientType'],
                'PatientName'     => $query->result_array()[0]['PatientName'],
                'ProfileImage' => $profileImage
            );
            
            $this->updateLastLogin($this->input->post('email'));
            return $ret;
        }

        return array(
            'errorFound'   => TRUE,
            'message'      => 'Patient not Found',
            'Email'        => '',
            'FirstName'    => '',
            'LastName'     => '',
            'PatientType'     => '',
            'PatientName'     => '',
            'ProfileImage' => ''
        );
    }

    function getNextPatientId()
    { 
        $this->db->query("SET sql_mode = '' ");
        $sql = 'SELECT MAX(PatientId) AS Max_PatientId FROM patients';
        $result = $this->db->query($sql);

        if($result->num_rows() > 0)
        {
            $count = (int)$result->result()[0]->Max_PatientId ;
        }
        else
        {
            $count = 0;
        }

        return $count + 1;
    }       

    function getAdminPatientsCount()
    { 
        $this->db->query("SET sql_mode = '' ");
        $sql = "SELECT COUNT(*) AS US_Count FROM patients WHERE PatientType='ADMIN'";
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

    function getPatientsCount()
    { 
        $this->db->query("SET sql_mode = '' ");
        $sql = 'SELECT COUNT(*) AS US_Count FROM patients';
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
    
    function addPatient($patientdata)
    {
        while(TRUE)
        {
            $patientExists = $this->patientExists($patientdata['Email']);


            if($patientExists)
            {
                $res = array(
                    'errorFound' => TRUE,
                    'message'    => 'Email already in use'
                );
                break;
            }

            $this->db->query("SET sql_mode = '' ");
            $this->db->set('CreatedDate', 'NOW()', FALSE);
            $insert = $this->db->insert('patients', $patientdata);

            $res = array(
                'id'         => 0,
                'errorFound' => TRUE,
                'message'    => 'Error Adding Patient'
            );

            if($insert)
            {
                $res = array(
                    'id'         => $this->db->insert_id(),
                    'errorFound' => FALSE,
                    'message'    => 'Patient added successfully!'
                );
            }
            break;
        }
        return $res;
    }
    
    public function getPatientDataOverId($id)
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('PatientId', $id);

        $query = $this->db->get('patients');

        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    } 

    public function getpatientdataoveremail($email)
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('Email', $email);

        $query = $this->db->get('patients');

        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    } 

    public function getYourPatients()
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->select('*');
        $this->db->where('AddedBy', $this->session->userdata('userId'));
        $this->db->order_by('PatientId', 'ASC');
        $query = $this->db->get('patients');
        
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    } 

    public function getAllPatients()
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->select('*'); 
        $this->db->order_by('PatientId', 'ASC');
        $query = $this->db->get('patients');
        
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function getTopFiveRecentPatients()
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->order_by('PatientId', 'DESC');
        $this->db->limit('5'); 
        $this->db->order_by('PatientId', 'ASC');
        $query = $this->db->get('patients');
        
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    }     
}