<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InvitationModel extends CI_Model {

	public function __construct()  
	{  
		parent::__construct();  
		$this->load->database('default');
	} 

	public function createInvitation($data){
		$arrayValue = json_encode($data, true);
		// Get User value by user token start
		$token = $data['token'];
		$userInfo = $this->db->query("SELECT * FROM `user` WHERE `token`='$token'")->result_array();
		if(sizeof($userInfo) != 0){ 
			$user_id = $userInfo[0]["user_id"];
			// Get User value by user token end
			$insertQuery = $this->db->query("INSERT INTO invitation (`form_id`, `user_id`, `info`, `token`) VALUES('".$data['form_id']."', '$user_id','$arrayValue', '$token')");
			if($this->db->affected_rows() > 0){
				$insert_id = $this->db->insert_id();
				$url = base_url().'Invitation/invitationInformation/inv-'.$data["form_id"].'-'.$user_id.'-'.$insert_id;
				$response["url"] = $url;
				$response["encode_url"] = urlencode($url);
				$response["status"] = "success";
				// $this->db->query("UPDATE invitation SET custom_url = '".urlencode($url)."' WHERE id='$insert_id'");
				$this->db->query("UPDATE invitation SET custom_url = '$url' WHERE id='$insert_id'");
			}
			else{
				$response["status"] = "fail";
				$response["msg"] = "Try again later"; 
			}
		}
		else{ 
			$response["status"] = "fail";
			$response["msg"] = "Try again later"; 
		}
		return $response;
	}

	public function imageGenerate($form_id, $user_id, $id){
		$data = $this->db->query("SELECT * FROM `invitation` WHERE form_id='$form_id' AND user_id='$user_id' AND id = '$id'")->result_array();
		if(sizeof($data)>0){
			$response["data"] = $data[0];
			$response["status"] = "success";
		}
		else{
			$response["status"] = "fail";
		}
		return $response;
	}
 
	public function userRegistration($data){ 
		$name = $data["name"];
		$mobile = $data["mobile"];
		$district = $data["district"];
		$state = $data["state"];
		$token = uniqid();
		$query = $this->db->query("SELECT * FROM `user` WHERE `mobile`='$mobile'")->result_array();
		if(sizeof($query) == 0){
			$otp = mt_rand(1000,9999); 
			$this->db->query("INSERT INTO `user`( `name`, `mobile`, `district`, `state`,`otp`, `token`) VALUES ('$name','$mobile','$district','$state','$otp','$token')");
			if($this->db->affected_rows() > 0){
				$response["status"] = "success";
				$response["msg"] = "User created successfully";
				$response["token"] = $token;
				$response["user_name"] = $name;
			} 
			else{
				$response["status"] = "fail";
				$response["msg"] = "Something went wrong!!!";
			}
		}
		else{
			$response["status"] = "fail";
			$response["msg"] = "mobile number already found";
		}
		return $response;
	}
	
	public function validateOTPp($data){ 
		$otp = $data["otp"];
		$token = $data["token"]; 
		$query = $this->db->query("SELECT * FROM `user` WHERE `token`='$token' and `otp`='$otp'")->result_array();
		if(sizeof($query) == 1){ 
			$response["status"] = "success";
			$response["msg"] = "Login successfully";
			$response["token"] = $token;
			$response["user_name"] = $query[0]["name"];
		}
		else{
			$response["status"] = "fail";
			$response["msg"] = "invalid credentials";
		}
		return $response;
	}
 
	public function userLoginn($data){  
		$mobile = $data["login-mobile"]; 
		$query = $this->db->query("SELECT * FROM `user` WHERE `mobile`='$mobile'")->result_array();
		if(sizeof($query) != 0){
			$otp = mt_rand(1000,9999); 
			$this->db->query("UPDATE `user` SET `otp`='$otp' WHERE `mobile`='$mobile' ");
			if($this->db->affected_rows() > 0){
				$response["status"] = "success";
				$response["msg"] = "OTP sent to your mobile number";
				$response["token"] = $query[0]["token"];
				$response["user_name"] = $query[0]["name"];
			} 
			else{
				$response["status"] = "fail";
				$response["msg"] = "Something went wrong!!!";
			}
		}
		else{
			$response["status"] = "fail";
			$response["msg"] = "mobile number not found";
		}
		return $response;
	}
 
	public function vendorRegistrationn($data){ 
		$name = $data["vendor-name"];
		$mobile = $data["vendor-mobile"];
		$state = $data["vendor-state"];
		$district = $data["vendor-district"];
		$baddress = $data["vendor-business-address"];
		$bname = $data["vendor-business-name"];
		$token = uniqid();
		$query = $this->db->query("SELECT * FROM `user` WHERE `mobile`='$mobile'")->result_array();
		if(sizeof($query) == 0){
			$otp = mt_rand(1000,9999); 
			$this->db->query("INSERT INTO `user`(`name`, `mobile`, `district`, `state`, `bname`, `baddress`, `type`, `otp`,`token`) VALUES ('$name','$mobile','$district','$state','$bname','$baddress','V','$otp','$token')");
			if($this->db->affected_rows() > 0){
				$response["status"] = "success";
				$response["msg"] = "User created successfully";
				$response["token"] = $token;
				$response["user_name"] = $name;
			} 
			else{
				$response["status"] = "fail";
				$response["msg"] = "Something went wrong!!!";
			}
		}
		else{
			$response["status"] = "fail";
			$response["msg"] = "mobile number already found";
		}
		return $response;
	}
 
	public function getUserInfo($data){ 
		$token = $data["token"]; 
		$user = $this->db->query("SELECT * FROM `user` WHERE `token`='$token'")->result_array();
		if(sizeof($user) > 0){
			$user[0]["invitation"] = $this->db->query("SELECT * FROM `invitation` WHERE `token`='$token'")->result_array();
			$response["status"] = "success";
			$response["msg"] = "User created successfully";
			$response["data"] = $user;
		}
		else{
			$response["status"] = "fail";
			$response["msg"] = "User Not Found!!!";
		}
		return $response;
	}

	public function getAllInvitationn($token){  
		$business = $this->db->query("SELECT a.*, if(b.list_id, 'yes', 'no') as present FROM `form` a left join `saved_list` b on b.invitation_id = a.`form_id` AND b.token = '$token' WHERE a.`flag`='1' AND a.inv_type='business'")->result_array();
		$wedding  = $this->db->query("SELECT a.*, if(b.list_id, 'yes', 'no') as present FROM `form` a left join `saved_list` b on b.invitation_id = a.`form_id` AND b.token = '$token' WHERE a.`flag`='1' AND a.inv_type='wedding'")->result_array(); 
		$response["status"] = "success"; 
		$response["business"] = $business;
		$response["wedding"] = $wedding; 
		return $response;
	}  
	public function savedListt($data) {
		$token = $data['token'];
		$invitation_id = $data['invitation_id'];
		$query = $this->db->query("SELECT * FROM `saved_list` WHERE `token`='$token' AND `invitation_id`='$invitation_id'")->result_array(); 
		if (sizeof($query) != 0) {
			$this->db->query("DELETE FROM `saved_list` WHERE `token`='$token' AND `invitation_id`='$invitation_id'");
			if ($this->db->affected_rows() > 0) {
				$response['status'] = 'success';
				$response['msg'] = 'Invitation removed from your saved list';
			} 
			else {
				$response['status'] = 'fail';
				$response['msg'] = 'Failed to remove invitation from the saved list';
			}
		} else {
			$this->db->query("INSERT INTO `saved_list` (`token`, `invitation_id`) VALUES ('$token', '$invitation_id')");
			if ($this->db->affected_rows() > 0) {
				$response['status'] = 'success';
				$response['msg'] = 'Invitation added to your saved list';
			} else {
				$response['status'] = 'fail';
				$response['msg'] = 'Failed to add invitation to the saved list';
			}
		} 
		return $response;
	} 

	public function getSavedCardss($data){  
		$token = $data["token"];
		$page = $data["page"];
		$cards = $this->db->query("SELECT b.*, if(a.list_id, 'yes', 'no') as present FROM `saved_list` as a inner join `form` as b ON a.invitation_id = b.form_id WHERE a.token = '$token' and b.inv_type='$page' and b.`flag`='1'")->result_array(); 
		$response["status"] = "success"; 
		$response["inv"] = $cards; 
		return $response;
	}

	public function getMyCardss($data){ 
		$token = $data["token"]; 
		$page = $data["page"]; 
		$invitation = $this->db->query("SELECT a.* FROM `invitation` a inner join `form` b ON a.form_id = b.form_id WHERE a.`token`='$token' AND b.inv_type='$page'")->result_array();
		if(sizeof($invitation) > 0){ 
			$response["status"] = "success"; 
			$response["data"] = $invitation;
		}
		else{
			$response["status"] = "fail";
			$response["msg"] = "User Not Found!!!";
		}
		return $response;
	}

	public function historyReportt($data){ 
		$token = $data["token"]; 
		$page = $data["page"]; 
		$this->db->query("INSERT INTO `view_history` (`token`, `page`) VALUES ('$token', '$page')"); 
	}
	public function getGiftt()  
	{   
		return $this->db->query("SELECT * FROM `gift` WHERE flag = '1'")->result_array(); 
	} 	



	
}

