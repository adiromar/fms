<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __Construct()
	{
		parent::__Construct();
		$this->load->model("user_model");
		$this->load->helper('url');
		$this->load->model("page_model");
	}

	public function index()
	{	
		$this->data['error_message'] = "";
		if(isset($_POST['login']))
		{	
			// $session = $this->session->userdata('isLogin');
			// print_r($session);die();
			$username = $this->input->post("username");
			$password = sha1($this->input->post("password"));
			 
			// echo $username;
			// echo $password;die;
			$login_condition = array("user_name"=>$username, "user_password"=>$password, "status"=>'1');
			$user_data = $this->user_model->userLogin($login_condition);
			
			if($user_data !== FALSE)
			{
				$user_id = $user_data['user_id'];
				
				// echo $rm;die;
				// echo "logged_in" . $user_id;echo $type;die;
				// die();
				
				$this->session->set_userdata("user_id", $user_id);			
				$this->session->set_userdata("user_name", $username);

				$this->session->set_userdata("username", $user_data['user_name']);
				
					redirect('pages/view');

			}else{
				$this->session->set_flashdata('login_error', ' Invalid Login Details.');
			}
		}		
		$this->load->view("user/login", $this->data);
	}

	public function register()
	{
		$data['title'] = "Register";
		// $this->load->view('templates/header');
		$this->load->view('user/register', $data);
		$this->load->view('templates/footer');
	}

	public function logout()
	{
		$this->session->unset_userdata("username");
		$this->session->unset_userdata("status");
		$this->session->sess_destroy();
		redirect("user/index");
	}

	public function register_user(){
		$this->load->helper(array('form'));

         /* Load form validation library */ 
         $this->load->library('form_validation');
			
         /* Set validation rule for name field in the form */ 
         $this->form_validation->set_rules('username', 'Username', 'required'); 
         $this->form_validation->set_rules('email', 'Email', 'required|valid_email'); 
         $this->form_validation->set_rules('password', 'Password', 'trim|required'); 
			
         if ($this->form_validation->run() == FALSE) { 
         $this->load->view('user/register'); 
         } 
         else { 
         	$username =$this->input->post('username');
			$email =$this->input->post('email');
			$password =$this->input->post('password');

			$user_data = array(
					'user_name'=>$username,
					'user_password'=>sha1($password),
			        'email'=>$email,
			        'status' =>1
			    );
			$insert_user = $this->user_model->insertUser($user_data);
			if ($insert_user == true){
				$this->session->set_flashdata('succ', ' User Successfully Registered.');
				$this->load->view('user/register'); 
			}else{
				$this->session->set_flashdata('reg_error', '  Could not Register User');
				$this->load->view('user/index'); 
			}
            
         } 
	}

	
}





