<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {

public function __Construct()
	{
		parent::__Construct();
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
		$this->load->library("upload");	
		$this->load->model('post_model');
	}

		public function upload_files(){
		$this->load->library('upload');
		$user_id=$this->session->userdata('user_id');
		date_default_timezone_set('Asia/Kathmandu');
		$now = date('Y-m-d H:i:s');

    	$dataInfo = array();
		$files = $_FILES;

		$file_info = $this->input->post('file_info');
    	$config = array(
				// 'file_name' => $new_name,
				'upload_path' => './uploads/files/',
				// 'allowed_types' => "gif|jpg|png|jpeg|pdf",
				'allowed_types' => "gif|jpg|png|jpeg|pdf|txt|docx|csv",
				'overwrite' => false,
				'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
				'max_height' => "6000",
				'max_width' => "5600"
			);
       // print_r($config);
        $_FILES['userfile']['name']= time() . '_' . $files['userfile']['name'];
        $_FILES['userfile']['type']= $files['userfile']['type'];
        $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'];
        $_FILES['userfile']['error']= $files['userfile']['error'];
        $_FILES['userfile']['size']= $files['userfile']['size'];    

        $this->upload->initialize($config);
        // $this->upload->do_upload();
        // $dataInfo[] = $this->upload->data();
    if (! $this->upload->do_upload('userfile')){
    	$this->session->set_flashdata('invalid_file', 'File not supported or Invalid file. ( Only images, pdf, txt, docx, csv accepted )');
		redirect('pages/upload_files');
    }else{
    	$dataInfo[] = $this->upload->data();
    	if (!empty($dataInfo[0]['file_name'])){
		$data = array('file_name'=> $dataInfo[0]['file_name'],
				  'file_info' => $file_info,
				  'inserted_by' => $user_id,
				  'inserted_date' => $now
		);
	$uploadss = $this->post_model->insert_form('file_mgmt',$data);
		}
    }
    
    
 		if ($uploadss == true){
 			$this->session->set_flashdata('insert_success', 'File Successfully Uploaded.');
				redirect('pages/upload_files');
 		}else{
 			$this->session->set_flashdata('insert_err', 'Sorry!! Some Error Occured In File Upload.');
 			redirect('pages/upload_files');
 			
 		}
	}
} // 