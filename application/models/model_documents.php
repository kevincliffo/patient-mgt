<?php
class Model_Documents extends CI_Model {
    function documentExists($name){
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('DocumentName', $name);
        $query = $this->db->get('documents');
        
        if($query->num_rows() > 0)
        {
            return true;
        }
        return false;
    }
    
    function updateActiveStatus($id)
    {
        $data = array('Active' => 1);
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('DocumentId', $id);
        $this->db->update('documents', $data);
    }

    function deletedocument($id)
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('DocumentId', $id);

        $this->db->delete('documents');
    }

    function getNextDocumentId()
    { 
        $this->db->query("SET sql_mode = '' ");
        $sql = 'SELECT MAX(DocumentId) AS Max_DocumentId FROM documents';
        $result = $this->db->query($sql);

        if($result->num_rows() > 0)
        {
            $count = (int)$result->result()[0]->Max_DocumentId ;
        }
        else
        {
            $count = 0;
        }

        return $count + 1;
    }

    function getDocumentsCount()
    { 
        $this->db->query("SET sql_mode = '' ");
        $sql = 'SELECT COUNT(*) AS US_Count FROM documents';
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
    
    function addDocument($documentdata)
    {
        while(TRUE)
        {
            $documentExists = $this->documentExists($documentdata['DocumentName']);


            if($documentExists)
            {
                $res = array(
                    'errorFound' => TRUE,
                    'message'    => 'Name already in use'
                );
                break;
            }

            $this->db->query("SET sql_mode = '' ");
            $this->db->set('UploadedDate', 'NOW()', FALSE);
            $insert = $this->db->insert('documents', $documentdata);

            $res = array(
                'id'         => 0,
                'errorFound' => TRUE,
                'message'    => 'Error Adding Document'
            );

            if($insert)
            {
                $res = array(
                    'id'         => $this->db->insert_id(),
                    'errorFound' => FALSE,
                    'message'    => 'Document added successfully!'
                );
            }
            break;
        }
        return $res;
    }
    
    public function getDocumentDataOverId($id)
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('DocumentId', $id);

        $query = $this->db->get('documents');

        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function getAllDocuments()
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->select('*'); 
        $this->db->order_by('DocumentId', 'ASC');
        $query = $this->db->get('documents');
        
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function getTopFiveRecentDocuments()
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->order_by('DocumentId', 'DESC');
        $this->db->limit('5'); 
        $this->db->order_by('DocumentId', 'ASC');
        $query = $this->db->get('documents');
        
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    }     
}