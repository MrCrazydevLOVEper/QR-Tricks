<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model {

	public function __construct()  
	{   
		parent::__construct();  
		$this->load->database('default');
	} 
	public function CheckLogin($data)  
	{		 
		$this->db->where('name', $data["name"]);
		$this->db->where('password', $data["password"]);
		$query = $this->db->get('admin');
		$userdetails = $query->result_array();		
		if($query->num_rows()>0)
		{
			$result["status"]="success";
			$result["user_id"]=$userdetails[0]["user_id"];
			$result["username"]=$userdetails[0]["username"];
			return $result;
		}
		else
		{
			$result["status"]="fail";
			$result["user_id"]='';
		}
	}

	public function getdashboardcountt()  
	{	
        $tz = 'Asia/Dubai';
        $timestamp = time();
        $dt = new DateTime("now", new DateTimeZone($tz));
        $dt->setTimestamp($timestamp);
        $from_date = $dt->format('Y-m-d');

        $sql= "SELECT * FROM user";
        $query = $this->db->query($sql);
        $users_count = $query->result();
        $result["user"] = sizeof($users_count);  

        $sql= "SELECT * FROM invitation";
        $query = $this->db->query($sql);
        $total_invoice = $query->result();
        $result["invitation"] = sizeof($total_invoice);   

		$result["dashboard_acces"]='true'; 
		return $result;
	}
	
	// ===== User Start =====
	public function getUserss()  
	{  
		$sql="SELECT * from user";
		$query = $this->db->query($sql);
		$yb_area_master = $query->result_array(); 
		return $yb_area_master;
	} 
	// ===== User END ===== 
	// ================= Invitation Start  ==================
	public function getInvitationn()  
	{  
		$sql="SELECT * from form where flag=1";
		$query = $this->db->query($sql);
		$yb_area_master = $query->result_array(); 
		return $yb_area_master;
	} 
	public function updateInvitationPricee($data)  
	{  
		$form_id =$data["form_id"];
		unset($data["form_id"]);
		$this->db->where('form_id', $form_id );
		$this->db->update('form', $data);		
		if ($this->db->affected_rows() == '1')
		{
			$result["result"] = "success";
			return $result;
		}
		else
		{
			$result["result"] = "fail";
			return $result;
		}
	}
	public function DeleteInvitationFormm($data)  
	{	
		$form_id=$data["form_id"];  
		$this->db->where('form_id', $form_id);
		$this->db->update('form', array("flag"=>0)	);
		if ($this->db->affected_rows() == '1')
		{
			$result["result"] = "success";
			return $result;
		}
		else
		{
			$result["result"] = "fail";
			return $result;
		}
	}
	// ================= Invitation End  ====================  
	// ================= User Invitation Start  ==================== 
	public function getUserInvitationn()  
	{   
		return  $this->db->query("SELECT i.*, f.inv_type, f.inv_name, u.name FROM `invitation` i 
		inner join `form` f ON i.form_id = f.form_id 
		inner join `user` u ON i.`user_id` = u.`user_id` 
		ORDER BY i.created_at DESC")->result_array(); 
	} 
	// ================= User Invitation End  ==================== 	
	// ================= Page Insight Start  ====================   
	public function getPageInsight()  
	{   
		return $this->db->query("SELECT `page`, count(`hid`) as page_count FROM `view_history` GROUP BY `page`")->result_array(); 
	} 	
	// ================= Page Insight end  ====================  
	// ================= Gift Start  ==================== 
	public function getGiftt()  
	{   
		return $this->db->query("SELECT * FROM `gift` WHERE flag = '1'")->result_array(); 
	} 	
	public function insertGiftt($data)  
	{ 
		$this->db->insert('gift', $data);		
		if ($this->db->affected_rows() == '1')
		{
			$result["result"] = "success";
			return $result;
		}
		else
		{
			$result["result"] = "fail";
			return $result;
		}
	}
	public function updateGiftt($data)  
	{  
		$gift_id =$data["gift_id"];
		unset($data["gift_id"]);
		$this->db->where('gift_id', $gift_id );
		$this->db->update('gift', $data);		
		if ($this->db->affected_rows() == '1')
		{
			$result["result"] = "success";
			return $result;
		}
		else
		{
			$result["result"] = "fail";
			return $result;
		}
	}
	public function deleteGiftt($data)  
	{	
		$gift_id=$data["gift_id"];  
		$this->db->where('gift_id', $gift_id);
		$this->db->update('gift', array("flag"=>0)	);
		if ($this->db->affected_rows() == '1')
		{
			$result["result"] = "success";
			return $result;
		}
		else
		{
			$result["result"] = "fail";
			return $result;
		}
	}
	// ================= Gift End  ====================  


	// ==============================================================================================================
	// ==============================================================================================================
	// ==============================================================================================================
	// ==================================================[ THE END ]=================================================
	// ==============================================================================================================
	// ==============================================================================================================
	// ==============================================================================================================
 
}

