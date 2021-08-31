<?php
class Model_Users extends CI_Model {
    function userExists($email){
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('Email', $email);
        $query = $this->db->get('users');
        
        if($query->num_rows() > 0)
        {
            return true;
        }
        return false;
    }
    
    function updateusersubscriptionstatus($userid, $status){
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('UserId', $userid);
        $data = array('Subscribed' => $status);
        $result = $this->db->update('users', $data);

        return $result;
    }

    function updateActiveStatus($id)
    {
        $data = array('Active' => 1);
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('UserId', $id);
        $this->db->update('users', $data);
    }

    function updateLastLogin($email){
        $now = new DateTime();
        $now->setTimezone(new DateTimeZone('Africa/Nairobi'));        
        $timestamp = $now->format('Y-m-d H:i:s');

        $data = array('LastLogin' => $timestamp);
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('Email', $email);
        $this->db->update('users', $data);
        
        // $array = array('Email' => $email, 'LastLogin' => $timestamp);
        // $this->db->set($array);
        // $this->db->insert('logins');        
    }

    function deleteuser($id)
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('UserId', $id);

        $this->db->delete('users');
    }
    
    function validate()
    {
        $this->db->query("SET sql_mode = '' ");        
        $this->db->select('UserId, Email, FirstName, LastName, UserType, UserName, IDNumber, ProfileImage, Gender, DOB, MobileNo, Address, Location, UnderlyingCondition, CreatedDate');
        $this->db->where('Email', $this->input->post('email'));
        $this->db->where('Password', md5($this->input->post('password')));
        $query = $this->db->get('users');
        
        if($query->num_rows() > 0){
            if($query->result_array()[0]['ProfileImage'] == '')
            {
                $profileImage = 'user-placeholder.png';
            }
            else
            {
                $profileImage = $query->result_array()[0]['ProfileImage'];
            }

            $ret = array(
                'errorFound'   => FALSE,
                'message'      => 'User Found',
                'UserId'       => $query->result_array()[0]['UserId'],
                'Email'        => $query->result_array()[0]['Email'],
                'FirstName'    => $query->result_array()[0]['FirstName'],
                'LastName'     => $query->result_array()[0]['LastName'],
                'UserType'     => $query->result_array()[0]['UserType'],
                'UserName'     => $query->result_array()[0]['UserName'],
                'IDNumber'     => $query->result_array()[0]['IDNumber'],
                'MobileNo'     => $query->result_array()[0]['MobileNo'],
                'Address'     => $query->result_array()[0]['Address'],
                'Location'     => $query->result_array()[0]['Location'],
                'Gender'     => $query->result_array()[0]['Gender'],
                'DOB'     => $query->result_array()[0]['DOB'],
                'UnderlyingCondition'     => $query->result_array()[0]['UnderlyingCondition'],
                'CreatedDate'  => $query->result_array()[0]['CreatedDate'],
                'ProfileImage' => $profileImage
            );
            
            $this->updateLastLogin($this->input->post('email'));
            return $ret;
        }

        return array(
            'errorFound'   => TRUE,
            'message'      => 'User not Found',
            'Email'        => '',
            'FirstName'    => '',
            'LastName'     => '',
            'UserType'     => '',
            'UserName'     => '',
            'IDNumber'     => '',
            'MobileNo'     => '',
            'CreatedDate'  => '',
            'ProfileImage' => ''
        );
    }

    function getNextUserId()
    { 
        $this->db->query("SET sql_mode = '' ");
        $sql = 'SELECT MAX(UserId) AS Max_UserId FROM users';
        $result = $this->db->query($sql);

        if($result->num_rows() > 0)
        {
            $count = (int)$result->result()[0]->Max_UserId ;
        }
        else
        {
            $count = 0;
        }

        return $count + 1;
    }       

    function getAdminUsersCount()
    { 
        $this->db->query("SET sql_mode = '' ");
        $sql = "SELECT COUNT(*) AS US_Count FROM users WHERE UserType='ADMIN'";
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

    function getUsersCount()
    { 
        $this->db->query("SET sql_mode = '' ");
        $sql = 'SELECT COUNT(*) AS US_Count FROM users';
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
    
    function addUser($userdata)
    {
        while(TRUE)
        {
            $userExists = $this->userExists($userdata['Email']);


            if($userExists)
            {
                $res = array(
                    'errorFound' => TRUE,
                    'message'    => 'Email already in use'
                );
                break;
            }

            $this->db->query("SET sql_mode = '' ");
            $this->db->set('CreatedDate', 'NOW()', FALSE);
            $insert = $this->db->insert('users', $userdata);

            $res = array(
                'id'         => 0,
                'errorFound' => TRUE,
                'message'    => 'Error Adding User'
            );

            if($insert)
            {
                $res = array(
                    'id'         => $this->db->insert_id(),
                    'errorFound' => FALSE,
                    'message'    => 'User added successfully!'
                );
            }
            break;
        }
        return $res;
    }
    
    public function getUserDataOverId($id)
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('UserId', $id);

        $query = $this->db->get('users');

        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    } 

    public function getuserdataoveremail($email)
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('Email', $email);

        $query = $this->db->get('users');

        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    } 

    public function getAllUsers()
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->select('*'); 
        $this->db->order_by('UserId', 'ASC');
        $query = $this->db->get('users');
        
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function getTopFiveRecentUsers()
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->order_by('UserId', 'DESC');
        $this->db->limit('5'); 
        $this->db->order_by('UserId', 'ASC');
        $query = $this->db->get('users');
        
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    }     
}