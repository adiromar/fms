<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function __Construct()
	{
		parent::__Construct();
		$this->load->helper('url');
		$this->load->helper('file'); 
		$this->load->library('pagination');
		$this->load->model('user_model');	
		$this->load->model('page_model');		
	}
	
	public function view(){
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
		$data['title'] = 'Dashboard';
		$data['files'] = $this->page_model->fetch_files_user($user_id);

			$this->load->view('templates/header');
			$this->load->view('pages/home', $data);
			$this->load->view('templates/footer');
		}

	public function upload_files(){
		$data['title'] = 'Upload File';
			$this->load->view('templates/header');
			$this->load->view('pages/upload_files', $data);
			$this->load->view('templates/footer');
		}

	public function delete_file($id){
		$this->load->library('email');

		$baseurl = base_url();
		$name = $this->page_model->fetch_file_name_by_id($id);
		$link = base_url().'files/'.$name[0]['file_name'];
		echo $link;
		if (file_exists($name[0]['file_name'])){
				unlink($link);
			}
		$del =$this->page_model->delete_id('file_mgmt' ,$id);
		
		if ($del == true){

			$this->session->set_flashdata('file_deleted', ' File Successfully Deleted');
			redirect ('pages/view');
		}else{
			$this->session->set_flashdata('error_deletion', ' Could Not Delete File');
			redirect ('pages/view/');
		}
	}

	
}