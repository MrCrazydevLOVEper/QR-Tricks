	

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminLoginController extends CI_Controller {

	public function __construct() {

	    parent:: __construct();
	    $this->load->helper('url');
	    $this->load->model('AdminModel');
	    $this->load->database('default');
	    if ($this->session->userdata('user_id')) 
	    {
	    	redirect('AdminController/homeView');
	    }
	}

	public function index()
	{
		header('Access-Control-Allow-Origin: *');
		$this->load->view('login');
	}

	public function login()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$data = $this->input->post();
			
			if($data["name"]==""||$data["password"]=="")
			{
				$data = array(
					'title' => 'Error',
					'heading' => 'Empty Details',
					'message' => 'Please Fill the Fields'
				);
				$this->load->view("login",$data);
			}
			else
			{							
				$success=$this->AdminModel->CheckLogin($data);				
				if( !empty($success["status"]) && $success["status"]=="success")
				{
			    	$session_email = array(
	                      'username' => $success['username'],
	                      'user_id' => $success["user_id"]
			    	);
			    	$this->session->set_userdata($session_email);
					redirect(base_url() . 'AdminController/homeView',$data);
				}
				else
				{
					$data = array(
						'title' => 'Error',
						'heading' => 'Wrong Details',
						'message' => 'Incorrect credentials'
					);
					$this->load->view("login",$data);
				}				
			}
		}
		else
		{
				$data = array(
					'title' => 'Error',
					'heading' => 'Empty Details',
					'message' => 'Please Fill the Fields'
				);
				$this->load->view("login",$data);
		}
	}

	public function logout(){
		$this->load->model('adminmodel');
		$output= $this->adminmodel->logoutt();
		echo json_encode($output);
		$this->session->unset_userdata('email');
		redirect('Adminlogin/index');
	}


}



?>



