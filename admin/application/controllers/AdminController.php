<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

   public function __construct() {
        parent:: __construct();
        $this->load->helper('url');
	    $this->load->model('AdminModel');
	    $this->load->database('default');
   }

	public function index()
	{
		$this->load->view('login');
	} 
	public function homeView()  
    {  
	    if (!$this->session->userdata('username') && !$this->session->userdata('user_id')) 
	    {
	    	redirect('AdminLoginController');
	    }
	    else
	    {
	        header('Access-Control-Allow-Origin: *');
	        $data["count_result"] =$this->AdminModel->getdashboardcountt();		
	        if ( $data["count_result"]["dashboard_acces"]=="true") 
	        {
	        	$this->load->view('dashboard',$data);	
	        }
	        else
	        {
	        	$this->load->view('dashboardnotaccesuser',$data);
	        }
	    }
    } 
	// ================= Users Start  ==================== 
	public function Users()
	{ 
			$this->load->view('user'); ; 
	}
	public function getUsers()
	{
		header('Access-Control-Allow-Origin: *');
		$success=$this->AdminModel->getUserss();
		echo json_encode($success);
	}
	// ================= Users END  ====================  
	// ================= Invitation Start  ==================== 
	public function Invitation()
	{ 
		$this->load->view('invitation'); ; 
	}
	public function getInvitation()
	{
		header('Access-Control-Allow-Origin: *');
		$success=$this->AdminModel->getInvitationn();
		echo json_encode($success);
	}
	public function updateInvitationPrice()
	{
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();
		if(!empty($_FILES['inv_img']['name']))
        {
            $config['upload_path'] = 'uploads/';
            $config['allowed_types']  = 'jpg|jpeg|png|gif';
            $config['file_name'] 	  = $_FILES['inv_img']['name'];
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            if($this->upload->do_upload('inv_img')){
                $uploadData = $this->upload->data();
                $photo = $uploadData['file_name'];
                $data["inv_img"]='uploads/'.$photo;
            }
        } 
		$success=$this->AdminModel->updateInvitationPricee($data);
		echo json_encode($success);
	}
	public function DeleteInvitationForm()
	{
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();
		$success=$this->AdminModel->DeleteInvitationFormm($data);
		echo json_encode($success);
	}
	// ================= Invitation END  ====================  	
	// ================= Logout Start  ====================
	public function logout()  
	{  
		$this->session->unset_userdata('username');  
		$this->session->unset_userdata('user_id');  
		redirect(base_url());  
	}   	
	// ================= Logout END  ====================  	
	// ================= User Invitation Start  ====================  	
	public function userInvitation()
	{ 
		$this->load->view('user_invitation'); ; 
	}
	public function getUserInvitation()
	{
		header('Access-Control-Allow-Origin: *');
		$success=$this->AdminModel->getUserInvitationn();
		echo json_encode($success);
	}
	// ================= User Invitation END  ====================  	
	// ================= Page Insight Start  ====================   	
	public function pageInsight()
	{ 
		header('Access-Control-Allow-Origin: *');
		$data['insight'] =$this->AdminModel->getPageInsight();
		$this->load->view('page_insight', $data);
	}	
	// ================= Page Insight END  ====================  
	// ================= Gift Start  ====================  	
	public function gift()
	{ 
		$this->load->view('gift'); ; 
	}
	public function getGift()
	{
		header('Access-Control-Allow-Origin: *');
		$success=$this->AdminModel->getGiftt();
		echo json_encode($success);
	}
	public function insertGift()
	{
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();
		if(!empty($_FILES['image']['name']))
        {
            $config['upload_path'] = 'uploads/';
            $config['allowed_types']  = 'jpg|jpeg|png|gif';
            $config['file_name'] 	  = $_FILES['image']['name'];
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            if($this->upload->do_upload('image')){
                $uploadData = $this->upload->data();
                $photo = $uploadData['file_name'];
                $data["image"]='uploads/'.$photo;
            }
        } 
		$success=$this->AdminModel->insertGiftt($data);
		echo json_encode($success);
	}
	public function updateGift()
	{
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();
		if(!empty($_FILES['image']['name']))
        {
            $config['upload_path'] = 'uploads/';
            $config['allowed_types']  = 'jpg|jpeg|png|gif';
            $config['file_name'] 	  = $_FILES['image']['name'];
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            if($this->upload->do_upload('image')){
                $uploadData = $this->upload->data();
                $photo = $uploadData['file_name'];
                $data["image"]='uploads/'.$photo;
            }
        } 
		$success=$this->AdminModel->updateGiftt($data);
		echo json_encode($success);
	}
	public function deleteGift()
	{
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();
		$success=$this->AdminModel->deleteGiftt($data);
		echo json_encode($success);
	}
	// ================= Gift END  ====================  	
}