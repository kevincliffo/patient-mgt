<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('FileObject.php');
class Documents extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // $this->load->model('home_model');
    }

    public function index()
	{
        $this->load->model('model_documents');
        $documents = $this->model_documents->getAllDocuments();
        $this->session->set_userdata('folder_path', './file_uploads/');
        
        $data['documents'] =  $documents;
        $this->load->view('includes/header', $data);
        $this->load->view('view_documents_table_view', $data);
        $this->load->view('includes/footer', $data);
    }

    public function folder_view()
    {
        $this->load->model('model_documents');
        $documents = $this->model_documents->getAllDocuments();

        $this->session->set_userdata('showViewMenu', TRUE);
        $data['documents'] =  $documents;
        
        $dir = './file_uploads/';
        $data['files'] = $this->get_folder_structure($dir);
        $this->load->view('includes/header', $data);
        $this->load->view('view_documents_folder_view', $data);
        $this->load->view('includes/footer', $data);
    }

    function get_file_details($path)
    {
        $ext = strtoupper(pathinfo($path, PATHINFO_EXTENSION));

        switch($ext)
        {
            case 'PDF':
                $iconClass = 'fas fa-file-pdf';
                $iconColour = 'color:#F40F02;';
                break;
            case 'DOC':
            case 'DOCX':
                $iconClass = 'fas fa-file-word';
                $iconColour = 'color:#2c5c96;';
                break;
            case 'XLS':
            case 'XLSX':
                $iconClass = 'fas fa-file-excel';
                $iconColour = 'color:#1D6F42;';
                break;
            case 'TXT':
                $iconClass = 'fas fa-file';
                $iconColour = 'color:grey;';
                break;
            case 'PPTX':
                $iconClass = 'fas fa-file-powerpoint';
                $iconColour = 'color:#D04423;';
                break;
            case 'PNG':
            case 'BMP':
            case 'JPG':
            case 'JPEG':
                $iconClass = 'far fa-images';
                $iconColour = 'color:#DC3E15;';
                break;
        }
        
        $ret = array(
            'extension' => $ext,
            'iconClass' => $iconClass,
            'iconColour' => $iconColour
        );

        return $ret;
    }

    function get_folder_structure($dir)
    {
        $files_list = array();
        if($dir == '')
        {
            $dir = './file_uploads/';
        }
        else
        {
            if($this->endsWith($dir, '/') == FALSE)
            {
                $dir = $dir.'/';
            }
        }
        
        $files = array_slice(scandir($dir), 2); 
        foreach($files as $file)
        {
            $fo = new FileObject();
            $fl = $dir.$file;
            $fo->setName($file);
            $fo->setUrl($fl);
            // print_r($dir);
            // print_r($fl);
            $fo->setLastModifiedTime(date("d/m/Y H:i", filemtime($fl)));

            if(is_file($fl))
            {
                $fo->setIsFile(TRUE);
                $ret = $this->get_file_details($fl);
                $fo->setExtension($ret['extension']);
                $fo->setIconClass($ret['iconClass']);
                $fo->setIconColour($ret['iconColour']);
                $fo->setSize(number_format(filesize($fl)).' KB');
            }
            else
            {
                $fo->setIsDir(TRUE);
                $fo->setIconClass("fa fa-folder");
                $fo->setIconColour('color:#ecc464;');
                $fo->setSize("");
            }
            array_push($files_list, $fo);
        }
        
        return $files_list;
    }

    function endsWith( $haystack, $needle ) {
        $length = strlen( $needle );
        if( !$length ) {
            return true;
        }
        return substr( $haystack, -$length ) === $needle;
    }

    function folder_structure()
    {
        $dir = $this->session->userdata('folder_path');

        $this->session->set_userdata('showViewMenu', TRUE);

        $data['files'] = $this->get_folder_structure($dir);
        $this->load->view('includes/header', $data);
        $this->load->view('view_documents_folder_view_json', $data);
        $this->load->view('includes/footer', $data);        
    }

    public function folder_structure_list()
    {
        $dir = $this->session->userdata('folder_path');
        
        $this->session->set_userdata('showViewMenu', TRUE);

        $data['files'] = $this->get_folder_structure($dir);
        $this->load->view('includes/header', $data);
        $this->load->view('view_documents_folder_view_list', $data);
        $this->load->view('includes/footer', $data);
    }

	public function folder_structure_list_json()
	{
        $key = $this->uri->segment(2);
        
        $dir = $this->session->userdata($key);
        //$dir = base64_decode(urldecode($url));
        $this->session->set_userdata('showViewMenu', TRUE);

        $data['files'] = $this->get_folder_structure($dir);
        $this->session->set_userdata('files', $data['files']);
        redirect('folder-structure', 'refresh');
        // $this->load->view('includes/header', $data);
        // $this->load->view('view_documents_folder_view', $data);
        // $this->load->view('includes/footer', $data);
    }

    public function folder_structure_detail()
    {
        $dir = $this->session->userdata('folder_path');
        
        $this->session->set_userdata('showViewMenu', TRUE);

        $data['files'] = $this->get_folder_structure($dir);
        $this->load->view('includes/header', $data);
        $this->load->view('view_documents_folder_view_detail', $data);
        $this->load->view('includes/footer', $data);
    }

    function get_folder_structure_recursive($parentDirectory)
    {        
        $files = array_slice(scandir($parentDirectory), 2); 
        foreach($files as $file)
        {
            $fl = $parentDirectory.'/'.$file;
            $isFile = is_file($fl);
            if($isFile)
            {
                print_r('Is File : ' . $file.'</br>');
            }
            else{
                print_r('Is Folder : ' . $file.'</br>');
                $this->get_folder_structure($fl);
            }
        }
    }

	public function add_document()
	{
        $this->load->model('model_documents');

        if($this->input->method(TRUE) == 'GET')
        {
            $data['uploader'] = $this->session->userdata('name');
            $this->load->view('includes/header', $data);
            $this->load->view('view_add_document', $data);
            $this->load->view('includes/footer', $data);
        }
        elseif($this->input->method(TRUE) == 'POST')
        {
            $data = array(
                'DocumentName' => $this->input->post('documentName'),
                'DocumentType' => $this->input->post('documentType'),
                'Owner'        => $this->input->post('owner'),
                'UploadedBy'   => $this->input->post('uploadedBy'),
                'Description'  => $this->input->post('description'),
            );

            while(TRUE)
            {
                $ret = $this->upload_file();

                if($ret['errorFound'])
                {
                    $this->session->set_flashdata('message_no', 1);
                    $this->session->set_flashdata('message', $ret['message']);
                    break;
                }
                
                $data['DocumentInternalName'] = $ret['fileName'];
                $data['DocumentFileUrl'] = $ret['file_full_path'];
                $this->model_documents->addDocument($data);
                break;
            }
            redirect('add-document');
        }
	}

    function upload_file()
    {
        $config = array('upload_path' => "./file_uploads/",
                        'allowed_types' => "pdf|doc|docx|png|jpeg|jpg",
                        'max_size' => "4096000");

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        
        if($this->upload->do_upload('documentFile'))
        {
            $upload_data = $this->upload->data();

            $file_name = $upload_data['file_name'];
            $file_full_path = $upload_data['full_path'];
            
            $value = array(
                        'errorFound' => 0,
                        'message'    => '',
                        'fileName'   => $file_name,
                        'file_full_path' => $file_full_path
                    );
        }
        else
        {
            $value = array(
                'errorFound' => 1,
                'message'    => $this->upload->display_errors(),
                'fileName'   => ''
            );
        }
        return $value;
    }   
}
