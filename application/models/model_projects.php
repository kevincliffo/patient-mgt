<?php
class Model_Projects extends CI_Model {
    function projectExists($projectNumber){
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('ProjectNumber', $projectNumber);
        $query = $this->db->get('projects');
        
        if($query->num_rows() > 0)
        {
            return true;
        }
        return false;
    }

    function deleteproject($id)
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('ProjectId', $id);

        $this->db->delete('projects');
    }

    function getNextProjectId()
    { 
        $this->db->query("SET sql_mode = '' ");
        $sql = 'SELECT MAX(ProjectId) AS Max_ProjectId FROM projects';
        $result = $this->db->query($sql);

        if($result->num_rows() > 0)
        {
            $count = (int)$result->result()[0]->Max_ProjectId ;
        }
        else
        {
            $count = 0;
        }

        return $count + 1;
    }

    function getProjectsCount()
    { 
        $this->db->query("SET sql_mode = '' ");
        $sql = 'SELECT COUNT(*) AS US_Count FROM projects';
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
    
    function addProject($projectdata)
    {
        while(TRUE)
        {
            $projectExists = $this->projectExists($projectdata['ProjectNumber']);


            if($projectExists)
            {
                $res = array(
                    'errorFound' => TRUE,
                    'message'    => 'Project Number already in use'
                );
                break;
            }

            $this->db->query("SET sql_mode = '' ");
            // $this->db->set('CreatedDate', 'NOW()', FALSE);
            $insert = $this->db->insert('projects', $projectdata);

            $res = array(
                'id'         => 0,
                'errorFound' => TRUE,
                'message'    => 'Error Adding Project'
            );

            if($insert)
            {
                $res = array(
                    'id'         => $this->db->insert_id(),
                    'errorFound' => FALSE,
                    'message'    => 'Project added successfully!'
                );
            }
            break;
        }
        return $res;
    }
    
    public function getProjectDataOverId($id)
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('ProjectId', $id);

        $query = $this->db->get('projects');

        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    } 

    public function getprojectdataoveremail($email)
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('Email', $email);

        $query = $this->db->get('projects');

        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    } 

    public function getAllProjects()
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->select('*'); 
        $this->db->order_by('ProjectId', 'ASC');
        $query = $this->db->get('projects');
        
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function getTopFiveRecentProjects()
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->order_by('ProjectId', 'DESC');
        $this->db->limit('5'); 
        $this->db->order_by('ProjectId', 'ASC');
        $query = $this->db->get('projects');
        
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    }     
}