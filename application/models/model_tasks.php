<?php
class Model_Tasks extends CI_Model {
    function taskExists($email){
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('Email', $email);
        $query = $this->db->get('tasks');
        
        if($query->num_rows() > 0)
        {
            return true;
        }
        return false;
    }
    
    function updatetasksubscriptionstatus($taskid, $status){
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('TaskId', $taskid);
        $data = array('Subscribed' => $status);
        $result = $this->db->update('tasks', $data);

        return $result;
    }

    function updateActiveStatus($id)
    {
        $data = array('Active' => 1);
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('TaskId', $id);
        $this->db->update('tasks', $data);
    }

    function updateLastLogin($email){
        $now = new DateTime();
        $now->setTimezone(new DateTimeZone('Africa/Nairobi'));        
        $timestamp = $now->format('Y-m-d H:i:s');

        $data = array('LastLogin' => $timestamp);
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('Email', $email);
        $this->db->update('tasks', $data);
        
        // $array = array('Email' => $email, 'LastLogin' => $timestamp);
        // $this->db->set($array);
        // $this->db->insert('logins');        
    }

    function deletetask($id)
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('TaskId', $id);

        $this->db->delete('tasks');
    }

    function validate()
    {
        $this->db->query("SET sql_mode = '' ");        
        $this->db->select('Email, FirstName, LastName, TaskType');
        $this->db->where('Email', $this->input->post('email'));
        $this->db->where('Password', md5($this->input->post('password')));
        $query = $this->db->get('tasks');
        
        if($query->num_rows() > 0){
            $ret = array(
                'errorFound' => FALSE,
                'message'    => 'Task Found',
                'Email'      => $query->result_array()[0]['Email'],
                'FirstName'  => $query->result_array()[0]['FirstName'],
                'LastName'   => $query->result_array()[0]['LastName'],
                'TaskType'   => $query->result_array()[0]['TaskType'],
            );

            $this->updateLastLogin($this->input->post('email'));
            return $ret;
        }

        return array(
            'errorFound' => TRUE,
            'message'    => 'Task not Found',
            'Email'      => '',
            'FirstName'  => '',
            'LastName'   => '',
            'TaskType'   => ''
        );
    }

    function getNextTaskId()
    { 
        $this->db->query("SET sql_mode = '' ");
        $sql = 'SELECT MAX(TaskId) AS Max_TaskId FROM tasks';
        $result = $this->db->query($sql);

        if($result->num_rows() > 0)
        {
            $count = (int)$result->result()[0]->Max_TaskId ;
        }
        else
        {
            $count = 0;
        }

        return $count + 1;
    }       

    function getAdminTasksCount()
    { 
        $this->db->query("SET sql_mode = '' ");
        $sql = "SELECT COUNT(*) AS US_Count FROM tasks WHERE TaskType='ADMIN'";
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

    function getTasksCount()
    { 
        $this->db->query("SET sql_mode = '' ");
        $sql = 'SELECT COUNT(*) AS US_Count FROM tasks';
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
    
    function addTask($taskdata)
    {
        while(TRUE)
        {
            $taskExists = $this->taskExists($taskdata['Email']);


            if($taskExists)
            {
                $res = array(
                    'errorFound' => TRUE,
                    'message'    => 'Email already in use'
                );
                break;
            }

            $this->db->query("SET sql_mode = '' ");
            $this->db->set('CreatedDate', 'NOW()', FALSE);
            $insert = $this->db->insert('tasks', $taskdata);

            $res = array(
                'id'         => 0,
                'errorFound' => TRUE,
                'message'    => 'Error Adding Task'
            );

            if($insert)
            {
                $res = array(
                    'id'         => $this->db->insert_id(),
                    'errorFound' => FALSE,
                    'message'    => 'Task added successfully!'
                );
            }
            break;
        }
        return $res;
    }
    
    public function getTaskDataOverId($id)
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('TaskId', $id);

        $query = $this->db->get('tasks');

        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    } 

    public function gettaskdataoveremail($email)
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('Email', $email);

        $query = $this->db->get('tasks');

        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    } 

    public function getAllTasks()
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->select('*'); 
        $this->db->order_by('TaskId', 'ASC');
        $query = $this->db->get('tasks');
        
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function getTopFiveRecentTasks()
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->order_by('TaskId', 'DESC');
        $this->db->limit('5'); 
        $this->db->order_by('TaskId', 'ASC');
        $query = $this->db->get('tasks');
        
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    }     
}