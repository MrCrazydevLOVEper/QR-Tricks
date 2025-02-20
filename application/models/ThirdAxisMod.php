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

        $sql= "SELECT * FROM tbl_invoice where flag=1 ";
        $query = $this->db->query($sql);
        $total_invoice = $query->result();
        $result["total_invoice"] = sizeof($total_invoice); 

        $sql= "SELECT * FROM tbl_invoice where payment_status='paid' ";
        $query = $this->db->query($sql);
        $paid = $query->result();
        $result["paid"] = sizeof($paid); 

        $sql= "SELECT * FROM tbl_invoice where payment_status='unpaid' ";
        $query = $this->db->query($sql);
        $unpaid = $query->result();
        $result["unpaid"] = sizeof($unpaid);  

        $sql= "SELECT * FROM tbl_invoice where payment_status='partially' ";
        $query = $this->db->query($sql);
        $partially = $query->result();
        $result["partially"] = sizeof($partially);  

		$result["dashboard_acces"]='true'; 
		return $result;
	}

	// customer list
	public function getCustomerListt()  
	{  
		// $sql="SELECT * from tbl_user";
		// $query = $this->db->query($sql);
		// $yb_area_master = $query->result_array(); 
		// return $yb_area_master;
		$sql = "SELECT * FROM `tbl_user`";
		$query = $this->db->query($sql);
		$result =$query->result_array();
		for($i=0; $i < sizeof($result); $i++){
			$user_id = $result[$i]['user_id'];
			$sql = "SELECT a.*, b.user_name FROM `tbl_invoice` as a 
			inner join tbl_user as b on a.user_id = b.user_id
			WHERE a.user_id = '$user_id'";
			$query = $this->db->query($sql);
			$invoice =$query->result_array();
			$total_amount = 0;
			$payed_amount = 0;
			$balance_amount = 0;
			for($j=0; $j < sizeof($invoice); $j++){
				$total_amount += $invoice[$j]['total_amount'];
				$payed_amount += $invoice[$j]['payed_amount'];
				$balance_amount += $invoice[$j]['balance_amount'];
			}
			$result[$i]['total_amount'] = $total_amount;
			$result[$i]['payed_amount'] = $payed_amount;
			$result[$i]['balance_amount'] = $balance_amount;
			$result[$i]['invoice'] = $invoice;
		}
		return $result;
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

	// ============================ hsnno start ====================
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
		
		//set invoice number start
		$inv = $this->db->query('SELECT * FROM tbl_invoice');
		$tot_inv = $inv->result_array(); 
		$inv_count = (sizeof($tot_inv)+1);
		$inv_four_digit = str_pad( $inv_count , 4, "0", STR_PAD_LEFT );
		$tat_inv_no = 'IN'.$inv_four_digit.'/'.date('y').'-'.(date('y')+1);
		//set invoice number end
		$customer_id = $data['user_unique_id'];
		$billing_date = $data['billing_date'];
		$billing_due_date = $data['billing_due_date'];
		$billing_status = $data['billing_status'];
		$invoice_data = $data['invoice_data'];
		$billed_date = $data['billed_date'];
		//adsress
		$address_log = $data['address_log']; 
		$address = $data['address']; 
		$state = $data['state']; 
		$state_code = $data['state_code']; 
		$contact_person = $data['billing_contact_person']; 
		$phone_number = $data['billing_phone_number']; 
		//calculation dada
		$main_total = $data['main_total'];
		$sgst_value = $data['sgst_value'];
		$gst_value = $data['gst_value'];
		$order_total = $data['order_total'];

		//po and pcd
		$po_pcd_ref = $data['po_pcd_ref'];
		$po_pcd_date = $data['po_pcd_date'];
		$dc_ref = $data['dc_ref'];
		$dc_date = $data['dc_date'];


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
		if( $address_log == 'true' ){
			$billing_address = $user_details[0]['address'];
			$billing_state = $user_details[0]['state'];
			$billing_state_code = $user_details[0]['state_code'];
			$billing_contact_person = $user_details[0]['contactperson'];
			$billing_phone_number = $user_details[0]['phonenumber'];
		}
		if( $address_log == 'false' ){
			
			$billing_address = $address ;
			$billing_state = $state;
			$billing_state_code = $state_code;
			$billing_contact_person = $contact_person;
			$billing_phone_number = $phone_number;
		}

		// print_r($tat_inv_no);
		// exit();


		//crete invoice number
		$month_name = date('M');
		$date = date('d');
		$invoice_number = 'thirdaxis'.time();
		
		// main invoice data insert 
		$sql = "INSERT INTO tbl_invoice(  `invoice_no`, `user_id`, `billing_date`, `billing_due_date`, `billing_address`, `billing_state`, `billing_state_code`, `billing_status`, `sub_total`, `gst_percentage`, `sgst_percentage`, `gst_value`, `sgst_value`, `total_amount`,`balance_amount`, `billing_contact_person`, `billing_phone_number`, `billed_date`, `tat_inv_no`, `po_pcd_ref`, `po_pcd_date`, `dc_ref`, `dc_date`, `address_log` )
		        VALUES('".$invoice_number."', '".$customer_id."' , '".$billing_date."' , '".$billing_due_date."' ,  '".$billing_address."' , '".$billing_state."' ,'".$billing_state_code."' , '".$billing_status."' , '".$main_total."' , '".$gst."', '".$sgst."' , '".$gst_value."', '".$sgst_value."' , '".$order_total."', '".$order_total."', '".$billing_contact_person."', '".$billing_phone_number."', '".$billed_date."', '".$tat_inv_no."', '".$po_pcd_ref."', '".$po_pcd_date."', '".$dc_ref."', '".$dc_date."', '".$address_log."' ) ";
		$query =  $this->db->query($sql); 
		$last_id = $this->db->insert_id();
		
		for ($i=0; $i < sizeof($invoice_data) ; $i++) { 
			$hsnno = $data['invoice_data'][$i]['hsnno'];
			$price = $data['invoice_data'][$i]['price']; 
			$discount = $data['invoice_data'][$i]['discount'];
			$description = $data['invoice_data'][$i]['description'];
			$quantity = $data['invoice_data'][$i]['quantity'];

            $subtotal_value =  (($quantity * $price)); 
            $item_subtotal =  number_format((float)$subtotal_value, 2, '.', '');    

			// sub invoice item data insert 
			$sql = "INSERT INTO tbl_invoice_items( `invoice_id`, `description`, `hsnno`, `quantity`, `price`, `discount`, `item_sub_total`, `item_total` )
		        VALUES('".$last_id."', '".$description."' , '".$hsnno."' , '".$quantity."' , '".$price."'  , '".$discount."' , '".$item_subtotal."'  , '".$item_subtotal."' ) ";
			$query =  $this->db->query($sql); 

		}

 		$result["status"] = "success";
		$result["msg"] = "Invoice Stored Sucessfully";
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

	public function getinvoicedetailsforeditt($data)  
	{  
		// print_r($data);
		$invoice_id = $data['orderno'];
		$company_sql = "SELECT * FROM tbl_company_info";			
		$company_query = $this->db->query($company_sql);
		$result['company'] = $company_query->result_array();	
		$sql="SELECT a.*,c.* from tbl_invoice as a  
		inner join tbl_user as c on a.user_id = c.user_id where a.invoice_id ='".$invoice_id."'  ";
		$query = $this->db->query($sql);
		$result['invoice'] =$query->result_array(); 
		$item_sql="SELECT b.* from tbl_invoice as a 
		inner join tbl_invoice_items as b on a.invoice_id=b.invoice_id where a.invoice_id ='".$invoice_id."' and b.flag=1  ";
		$item_query = $this->db->query($item_sql); 
		$result['items'] = $item_query->result_array(); 
		return $result;
	} 

	public function editInvoiceDataa($data)
	{ 
		 
		$invoice_id = $data['invoice_id'];
		$customer_id = $data['user_unique_id'];
		$billing_date = $data['billing_date'];
		$billing_due_date = $data['billing_due_date'];
		$billing_status = $data['billing_status'];
		$invoice_data = $data['invoice_data'];
		$billed_date = $data['billed_date'];
		//adsress
		$address_log = $data['address_log']; 
		$address = $data['address']; 
		$state = $data['state']; 
		$state_code = $data['state_code']; 
		$contact_person = $data['billing_contact_person']; 
		$phone_number = $data['billing_phone_number']; 
		//calculation dada
		$main_total = $data['main_total'];
		$sgst_value = $data['sgst_value'];
		$gst_value = $data['gst_value'];
		$order_total = $data['order_total'];

		//po and pcd
		$po_pcd_ref = $data['po_pcd_ref'];
		$po_pcd_date = $data['po_pcd_date'];
		$dc_ref = $data['dc_ref'];
		$dc_date = $data['dc_date'];

		//removed data
		if(!empty($data['removed_data']) ){
			$removed_data = $data['removed_data'];
			for($j=0;$j < sizeof($removed_data); $j++){
				$sql = "UPDATE `tbl_invoice_items` SET  `flag`=0 WHERE invoice_items_id = '".$data['removed_data'][$j]."'  ";
	      	$query =  $this->db->query($sql);
			}
		}

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
		if( $address_log == 'true' ){
			$billing_address = $user_details[0]['address'];
			$billing_state = $user_details[0]['state'];
			$billing_state_code = $user_details[0]['state_code'];
			$billing_contact_person = $user_details[0]['contactperson'];
			$billing_phone_number = $user_details[0]['phonenumber'];
		}
		if( $address_log == 'false' ){
			
			$billing_address = $address ;
			$billing_state = $state;
			$billing_state_code = $state_code;
			$billing_contact_person = $contact_person;
			$billing_phone_number = $phone_number;
		}
		 
		
		// main invoice data insert 

		 $sql = "UPDATE `tbl_invoice` SET  `user_id`='".$customer_id."',
		 `billing_date`='".$billing_date."',
		 `billing_due_date`='".$billing_due_date."',
		 `billing_address`='".$billing_address."',
		 `billing_state`='".$billing_state."',
		 `billing_state_code`='".$billing_state_code."',
		 `billing_status`='".$billing_status."',
		 `sub_total`='".$main_total."',
		 `gst_percentage`='".$gst."',
		 `sgst_percentage`='".$sgst."',
		 `gst_value`='".$gst_value."',
		 `sgst_value`='".$sgst_value."',
		 `total_amount`='".$order_total."',
		 `balance_amount`='".$order_total."',
		 `billing_contact_person`='".$billing_contact_person."',
		 `billing_phone_number`='".$billing_phone_number."',
		 `billed_date`='".$billed_date."', 
		 `po_pcd_ref`='".$po_pcd_ref."',
		 `po_pcd_date`='".$po_pcd_date."',
		 `dc_ref`='".$dc_ref."',
		 `dc_date`='".$dc_date."',
		 `address_log`='".$address_log."' WHERE invoice_id = '".$invoice_id."'";


		$query =  $this->db->query($sql);  

		// print_r($invoice_data);
		// exit();
		
		for ($i=0; $i < sizeof($invoice_data) ; $i++) { 
			$hsnno = $data['invoice_data'][$i]['hsnno'];
			$price = $data['invoice_data'][$i]['price']; 
			$discount = $data['invoice_data'][$i]['discount'];
			$description = $data['invoice_data'][$i]['description'];
			$quantity = $data['invoice_data'][$i]['quantity'];
			$invoice_items_id = $data['invoice_data'][$i]['invoice_items_id'];


		// print_r($invoice_items_id);
			
            $subtotal_value =  (($quantity * $price)); 
            $item_subtotal =  number_format((float)$subtotal_value, 2, '.', '');    

          if($invoice_items_id == 0){
				$sql = "INSERT INTO tbl_invoice_items( `invoice_id`, `description`, `hsnno`, `quantity`, `price`, `discount`, `item_sub_total`, `item_total` )
			        VALUES('".$invoice_id."', '".$description."' , '".$hsnno."' , '".$quantity."' , '".$price."'  , '".$discount."' , '".$item_subtotal."'  , '".$item_subtotal."' ) ";
				$query =  $this->db->query($sql); 
          }

          else{ 

          	$sql = "UPDATE `tbl_invoice_items` SET  `description`='".$description."',
          	`hsnno`='".$hsnno."',
          	`quantity`='".$quantity."',
          	`price`='".$price."',
          	`discount`='".$discount."',
          	`item_sub_total`='".$item_subtotal."',
          	`item_total`='".$item_subtotal."'  WHERE invoice_items_id = '".$invoice_items_id."'";
          	$query =  $this->db->query($sql);
          }
			

		}


		// exit();

 		$result["status"] = "success";
		$result["msg"] = "Invoice Stored Sucessfully";
		return $result; 
	} 


	public function CustomerInvoiceListFilterr($data)
	{
		$where = " a.flag = 1 ";
		$from_date = 	$data['from_date'];	
		$to_date = 	$data['to_date'];	

		if (!empty($data['user_unique_id'])) {
			$user_id = 	$data['user_unique_id'];	
			$where = $where." AND a.user_id = '$user_id' ";	
		}
		if ( !empty($from_date) && empty($to_date )  ) {
			$where = $where." AND a.billing_date >= '$from_date' ";	
		}
		if ( empty($from_date) && !empty($to_date )  ) {
			$where = $where." AND a.billing_date <= '$to_date' ";	
		}
		if ( !empty($from_date) && !empty($to_date )  ) {
			$where = $where." AND a.billing_date BETWEEN '$from_date' AND '$to_date'  ";	
		}
		$sql="SELECT a.*,c.* from tbl_invoice as a inner join tbl_user as c on a.user_id = c.user_id WHERE".$where;
		// print_r($sql);
		// exit();
		$query = $this->db->query($sql);
		$data =$query->result(); 
		return $data;
	}
	public function getCustomerPaymentListt(){
		$sql = "SELECT * FROM `tbl_user`";
		$query = $this->db->query($sql);
		$result =$query->result_array();
		for($i=0; $i < sizeof($result); $i++){
			$user_id = $result[$i]['user_id'];
			$sql = "SELECT a.*, b.user_name FROM `tbl_invoice` as a 
			inner join tbl_user as b on a.user_id = b.user_id
			WHERE a.user_id = '$user_id'";
			$query = $this->db->query($sql);
			$invoice =$query->result_array();
			$total_amount = 0;
			$payed_amount = 0;
			$balance_amount = 0;
			for($j=0; $j < sizeof($invoice); $j++){
				$total_amount += $invoice[$j]['total_amount'];
				$payed_amount += $invoice[$j]['payed_amount'];
				$balance_amount += $invoice[$j]['balance_amount'];
			}
			$result[$i]['total_amount'] = $total_amount;
			$result[$i]['payed_amount'] = $payed_amount;
			$result[$i]['balance_amount'] = $balance_amount;
			$result[$i]['invoice'] = $invoice;
		}
		return $result;
	}

	public function getCurCustomerDetailss($data){
		$sql = "SELECT * FROM `tbl_user` WHERE user_id ='".$data['user_id']."'";
		$query = $this->db->query($sql);
		$result =$query->result_array();
		$sql = "SELECT * FROM `tbl_invoice` WHERE user_id ='".$data['user_id']."'";
		$query = $this->db->query($sql);
		$result[0]['invoice'] =$query->result_array();
		return $result;
	}

	public function updateInvoicePaymentt($data){
		$amount = $data["amount"];
		$amount_type = $data["amount_type"];
		$invoice_note = $data["invoice_note"];
		$user_id = $data["user_id"];
		//user details
		$userDetails = $this->getCurCustomerDetailss($data);
		$user = $userDetails[0]; 
		$invoice = $userDetails[0]['invoice'];

		$sql = "INSERT INTO `tbl_payment_history`( `user_id`, `amount`, `amount_type`, `invoice_note`) 
		VALUES ('$user_id','$amount','$amount_type','$invoice_note')";
		$query = $this->db->query($sql);

		for($i=0; $i < sizeof($invoice); $i++ ){
			$invoice_amount = $userDetails[0]['invoice'][$i]['total_amount'];
			$payed_amount = $userDetails[0]['invoice'][$i]['payed_amount'];
			$balance_amount = $userDetails[0]['invoice'][$i]['balance_amount'];
			$invoice_id = $userDetails[0]['invoice'][$i]['invoice_id'];
			$payment_status = $userDetails[0]['invoice'][$i]['payment_status'];
			if($amount != 0  && $payment_status != 'paid'){
				if(number_format((float)$balance_amount, 2, '.', '') <= number_format((float)$amount, 2, '.', '') ){
					$balance = 0;
					$payed = $balance_amount + $payed_amount; 
					$amount = $amount - $balance_amount;
					$payment_status = "paid";
				} 
				else{
					$balance =  $balance_amount - $amount;
					$payed = $amount + $payed_amount; 
					$amount = 0;
					$payment_status = "partially";
				}
				// print_r($payment_status);
				// exit();
				$sql = "UPDATE `tbl_invoice` SET payed_amount='$payed',balance_amount='$balance',payment_status = '$payment_status' WHERE invoice_id = '".$invoice_id."'  ";
				$query = $this->db->query($sql);
			}
		} 

		$result["result"] = "success";
		return $result;	
	}

	public function getCustomerInvoicePaymentListt($data)  
	{  
		$payment_status = $data["payment_status"];  
		$sql="SELECT a.*,c.* from tbl_invoice as a  inner join tbl_user as c on a.user_id = c.user_id WHERE a.payment_status = '$payment_status'";
		$query = $this->db->query($sql);
		$result =$query->result_array(); 
		return $result;
	} 

 
	
 	

	 



}

