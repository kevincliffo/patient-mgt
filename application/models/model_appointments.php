<?php
class Model_Appointments extends CI_Model {    
    function deleteAppointment($id)
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('AppointmentId', $id);

        $this->db->delete('appointments');
    }

    function getNextAppointmentId()
    { 
        $this->db->query("SET sql_mode = '' ");
        $sql = 'SELECT MAX(AppointmentId) AS Max_AppointmentId FROM appointments';
        $result = $this->db->query($sql);

        if($result->num_rows() > 0)
        {
            $count = (int)$result->result()[0]->Max_AppointmentId ;
        }
        else
        {
            $count = 0;
        }

        return $count + 1;
    }       

    function getAdminAppointmentsCount()
    { 
        $this->db->query("SET sql_mode = '' ");
        $sql = "SELECT COUNT(*) AS US_Count FROM appointments WHERE AppointmentType='ADMIN'";
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

    function getAppointmentsCount()
    { 
        $this->db->query("SET sql_mode = '' ");
        $sql = 'SELECT COUNT(*) AS US_Count FROM appointments';
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
    
    function addAppointment($appointmentdata)
    {
        while(TRUE)
        {
            $this->db->query("SET sql_mode = '' ");
            //$this->db->set('AppointmentDate', 'NOW()', FALSE);
            $insert = $this->db->insert('appointments', $appointmentdata);

            $res = array(
                'id'         => 0,
                'errorFound' => TRUE,
                'message'    => 'Error Adding Appointment'
            );

            if($insert)
            {
                $res = array(
                    'id'         => $this->db->insert_id(),
                    'errorFound' => FALSE,
                    'message'    => 'Appointment added successfully!'
                );
            }
            break;
        }
        return $res;
    }
    
    public function getAppointmentDataOverId($id)
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('AppointmentId', $id);

        $query = $this->db->get('appointments');

        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function getAllAppointments()
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->select('*'); 
        $this->db->order_by('AppointmentId', 'ASC');
        $query = $this->db->get('appointments');
        
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function getAllAppointmentsExtended()
    {
        $this->db->select('*');
        $this->db->from('appointments');
        $this->db->join('patients', 'patients.PatientIdentifier = appointments.PatientIdentifier');

        return $query = $this->db->get()->result_array();
    }

    public function getTopFiveRecentAppointments()
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->order_by('AppointmentId', 'DESC');
        $this->db->limit('5'); 
        $this->db->order_by('AppointmentId', 'ASC');
        $query = $this->db->get('appointments');
        
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    }     
}