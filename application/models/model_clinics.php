<?php
class Model_Clinics extends CI_Model {    
    function deleteClinic($id)
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('ClinicId', $id);

        $this->db->delete('clinics');
    }

    function getNextClinicId()
    { 
        $this->db->query("SET sql_mode = '' ");
        $sql = 'SELECT MAX(ClinicId) AS Max_ClinicId FROM clinics';
        $result = $this->db->query($sql);

        if($result->num_rows() > 0)
        {
            $count = (int)$result->result()[0]->Max_ClinicId ;
        }
        else
        {
            $count = 0;
        }

        return $count + 1;
    }       

    function getAdminClinicsCount()
    { 
        $this->db->query("SET sql_mode = '' ");
        $sql = "SELECT COUNT(*) AS US_Count FROM clinics WHERE ClinicType='ADMIN'";
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

    function getClinicsCount()
    { 
        $this->db->query("SET sql_mode = '' ");
        $sql = 'SELECT COUNT(*) AS US_Count FROM clinics';
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
    
    function addClinic($clinicdata)
    {
        while(TRUE)
        {
            $this->db->query("SET sql_mode = '' ");
            $this->db->set('CreatedDate', 'NOW()', FALSE);
            $insert = $this->db->insert('clinics', $clinicdata);

            $res = array(
                'id'         => 0,
                'errorFound' => TRUE,
                'message'    => 'Error Adding Clinic'
            );

            if($insert)
            {
                $res = array(
                    'id'         => $this->db->insert_id(),
                    'errorFound' => FALSE,
                    'message'    => 'Clinic added successfully!'
                );
            }
            break;
        }
        return $res;
    }
    
    public function getClinicDataOverId($id)
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('ClinicId', $id);

        $query = $this->db->get('clinics');

        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function getAllClinics()
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->select('*'); 
        $this->db->order_by('ClinicId', 'ASC');
        $query = $this->db->get('clinics');
        
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function getTopFiveRecentClinics()
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->order_by('ClinicId', 'DESC');
        $this->db->limit('5'); 
        $this->db->order_by('ClinicId', 'ASC');
        $query = $this->db->get('clinics');
        
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    }     
}