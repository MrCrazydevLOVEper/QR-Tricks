<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model {

	public function __construct()  
	{  
		 // Call the Model constructor  
		parent::__construct();  
		$this->load->database('default');
	} 
	public function CheckLogin($data)  
	{		
		//$data['password'] = $data["password"];
		$this->db->where('name', $data["name"]);
		$this->db->where('password', $data["password"]);
		$query = $this->db->get('yb_user');
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

        $sql= "SELECT * FROM tbl_user where flag=1 ";
        $query = $this->db->query($sql);
        $yb_users_count = $query->result();
        $result["yb_users_count"] = sizeof($yb_users_count);  

		$result["dashboard_acces"]='true'; 
		return $result;
	}

	// customer list
	public function getCustomerListt()  
	{  
		$sql="SELECT * from tbl_user";
		$query = $this->db->query($sql);
		$yb_area_master = $query->result_array(); 
		return $yb_area_master;
	} 


	public function insertCustomerListt($data)  
	{  
		$this->db->insert('tbl_user', $data);
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
	
	public function updateCustomerListt($data)  
	{  
		$user_id=$data["user_id"];
		unset($data["user_id"]);
		$this->db->where('user_id', $user_id);
		$this->db->update('tbl_user', $data);		
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

	public function RestoreCustomerListt($data)  
	{	
		$user_id=$data["user_id"];
		$flag=$data["flag"];
		unset($data["user_id"]);
		$this->db->where('user_id', $user_id);
		$this->db->update('tbl_user', array("flag"=>$flag)	);
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

	public function DeleteCustomerListt($data)  
	{	
		$user_id=$data["user_id"];
		unset($data["user_id"]);
		$this->db->where('user_id', $user_id);
		$this->db->delete('tbl_user');
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
	// customer list

	public function getHsnnoo()  
	{  
		$sql="SELECT * from tbl_hsnno";
		$query = $this->db->query($sql);
		$yb_area_master = $query->result_array(); 
		return $yb_area_master;
	} 


	public function insertHsnnoo($data)  
	{  
		$this->db->insert('tbl_hsnno', $data);
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
	
	public function updateHsnnoo($data)  
	{  
		$hsnno_id=$data["hsnno_id"];
		unset($data["hsnno_id"]);
		$this->db->where('hsnno_id', $hsnno_id);
		$this->db->update('tbl_hsnno', $data);		
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

	public function RestoreHsnnoo($data)  
	{	
		$hsnno_id=$data["hsnno_id"];
		$flag=$data["flag"];
		unset($data["hsnno_id"]);
		$this->db->where('hsnno_id', $hsnno_id);
		$this->db->update('tbl_hsnno', array("flag"=>$flag)	);
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

	public function DeleteHsnnoo($data)  
	{	
		$hsnno_id=$data["hsnno_id"];
		unset($data["hsnno_id"]);
		$this->db->where('hsnno_id', $hsnno_id);
		$this->db->delete('tbl_hsnno');
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
	// ============================ hsnno end ====================

	public function getourinfodetailss()
	{
		$sql = "SELECT * FROM tbl_company_info";			
		$query = $this->db->query($sql);
		$details = $query->result_array();			 
		return $details;
	}
	public function updateourinfovaluess($data)
	{  
		$sql = "SELECT * FROM tbl_company_info";			
		$query = $this->db->query($sql);
		$details = $query->result_array();	
		if (sizeof($details)>0) {
			$company_info_id=$data["company_info_id"];
			unset($data["company_info_id"]);
			$this->db->where('company_info_id', $company_info_id);
			$this->db->update('tbl_company_info', $data);			
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
		}else{
			$company_info_id=$data["company_info_id"];
			unset($data["company_info_id"]);
			$this->db->insert('tbl_company_info', $data);
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
	}
	//invoice
	public function getuserdetailss()  
	{  	
		$sql = "SELECT * FROM tbl_user where flag=1";			
		$query = $this->db->query($sql);
		$details = $query->result_array();	 
		return $details;		
	}

	public function getuseraddressdetails($data)  
	{	  
		$sql= "SELECT * from tbl_user WHERE flag=1 and user_id='".$data["user_unique_id"]."' ";
		$query = $this->db->query($sql);
		$yb_user_address = $query->result_array(); 
		return $yb_user_address;
	}

	public function gettaxx()  
	{  
		$sql="SELECT * from tbl_tax";
		$query = $this->db->query($sql);
		$tax_list = $query->result_array(); 
		return $tax_list;
	} 

	public function getCustomerInvoiceListt()  
	{  
		$sql="SELECT a.*,c.* from tbl_invoice as a  
		inner join tbl_user as c on a.user_id = c.user_id ";
		$query = $this->db->query($sql);
		$data =$query->result(); 

		return $data;
	} 


	public function getpdf($data)  
	{  
		$invoice_id = $data['order_id'];
		$company_sql = "SELECT * FROM tbl_company_info";			
		$company_query = $this->db->query($company_sql);
		$result['company'] = $company_query->result_array();	
		$sql="SELECT a.*,c.* from tbl_invoice as a  
		inner join tbl_user as c on a.user_id = c.user_id where a.invoice_id ='".$invoice_id."'  ";
		$query = $this->db->query($sql);
		$result['invoice'] =$query->result_array(); 
		$item_sql="SELECT b.* from tbl_invoice as a 
		inner join tbl_invoice_items as b on a.invoice_id=b.invoice_id where a.invoice_id ='".$invoice_id."'  ";
		$item_query = $this->db->query($item_sql); 
		$result['items'] = $item_query->result_array(); 
		return $result;
	}  

	public function createInvoicee($data)
	{ 
		$customer_id = $data['user_unique_id'];
		$billing_date = $data['billing_date'];
		$billing_due_date = $data['billing_due_date'];
		$billing_status = $data['billing_status'];
		$address = $data['address']; 
		$invoice_data = $data['invoice_data'];
		$order_total = $data['order_total'];

		//get tax
		$sql="SELECT * from tbl_tax";
		$query = $this->db->query($sql);
		$tax_list = $query->result_array(); 
		$gst = $tax_list[0]['gst'];
		$sgst = $tax_list[0]['sgst'];

		//get user details
		$sql="SELECT * from tbl_user where user_id = '".$customer_id."' ";
		$query = $this->db->query($sql);
		$user_details = $query->result_array(); 

		// set ivoice address
		$a=0;
		if( empty($address) ){
			$billing_address = $user_details[0]['address'];
		}
		else{
			$billing_address = $address;
		}

		//crete invoice number
		$month_name = date('M');
		$date = date('d');
		$invoice_number = 'thirdaxis'.time();
		
		// main invoice data insert 
		$sql = "INSERT INTO tbl_invoice( invoice_no,user_id,billing_date,billing_due_date,billing_address,billing_status,sub_total,total_amount )
		        VALUES('".$invoice_number."', '".$customer_id."' , '".$billing_date."' , '".$billing_due_date."' , '".$billing_address."' , '".$billing_status."' ,
		         '".$order_total."' , '".$order_total."' ) ";
		$query =  $this->db->query($sql); 
		$last_id = $this->db->insert_id();


		// print_r($billing_address);
		
		
		for ($i=0; $i < sizeof($invoice_data) ; $i++) { 
			$hsnno = $data['invoice_data'][$i]['hsnno'];
			$price = $data['invoice_data'][$i]['price'];
			$taxtype = $data['invoice_data'][$i]['taxtype'];
			$discount = $data['invoice_data'][$i]['discount'];
			$description = $data['invoice_data'][$i]['description'];
			$quantity = $data['invoice_data'][$i]['quantity'];

			if($taxtype == 'GST'){ 
                $tax_value = $price * ($gst / 100);
            }
            if($taxtype == 'SGST'){
                $tax_value = $price * ($sgst / 100);
            } 
            if($taxtype == 'none'){
                $tax_value = 0;
            }

            $item_total_tax = number_format( (float)($quantity * $tax_value), 2, '.', '') ;
            $subtotal_value =  ( ($quantity * $price) + ($quantity * $tax_value)  ) - $discount; 
            $item_subtotal =  number_format((float)$subtotal_value, 2, '.', '');  

			// sub invoice item data insert 
			$sql = "INSERT INTO tbl_invoice_items( invoice_id,description,hsnno,quantity,price,tax_type,tax_amount,discount,item_sub_total,item_total )
		        VALUES('".$last_id."', '".$description."' , '".$hsnno."' , '".$quantity."' , '".$price."' , '".$taxtype."' ,'".$item_total_tax."' ,
		         '".$discount."' , '".$item_subtotal."'  , '".$item_subtotal."' ) ";
			$query =  $this->db->query($sql); 

		}

 		$result["status"] = "success";
		$result["message"] = "Invoice Stored Sucessfully";
		return $result; 
	}

	public function getourtaxdetailss()
	{
		$sql = "SELECT * FROM tbl_tax";			
		$query = $this->db->query($sql);
		$details = $query->result_array();			 
		return $details;
	}
	public function updateourtaxvaluess($data)
	{  
		$sql = "SELECT * FROM tbl_tax";			
		$query = $this->db->query($sql);
		$details = $query->result_array();	
		if (sizeof($details)>0) {
			$tax_id=$data["tax_id"];
			unset($data["tax_id"]);
			$this->db->where('tax_id', $tax_id);
			$this->db->update('tbl_tax', $data);			
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
		}else{
			$tax_id=$data["tax_id"];
			unset($data["tax_id"]);
			$this->db->insert('tbl_tax', $data);
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
	}



 
	
 

	 



}

