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
	public function CustomerList()
	{ 
			$this->load->view('customer_list'); ; 
	}
	public function getCustomerList()
	{
		header('Access-Control-Allow-Origin: *');
		$success=$this->AdminModel->getCustomerListt();
		echo json_encode($success);
	}
	public function insertCustomerList()
	{
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();
		$success=$this->AdminModel->insertCustomerListt($data);
		echo json_encode($success);
	}
	public function updateCustomerList()
	{
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();
		$success=$this->AdminModel->updateCustomerListt($data);
		echo json_encode($success);
	}
	public function RestoreCustomerList()
	{
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();
		$success=$this->AdminModel->RestoreCustomerListt($data);
		echo json_encode($success);
	}
	public function DeleteCustomerList()
	{
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();
		$success=$this->AdminModel->DeleteCustomerListt($data);
		echo json_encode($success);
	}

	// ================= our info start ==================== 

	public function OurInfo()
	{
		$this->load->view('our_info');		 
	}
	public function getourinfodetails()
	{
		header('Access-Control-Allow-Origin: *');
		$success=$this->AdminModel->getourinfodetailss();
		echo json_encode($success);
	}
	public function updateourinfovalues()
	{
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();
		$success=$this->AdminModel->updateourinfovaluess($data);
		echo json_encode($success);
	}

	// ================= our info end ==================== 
	// ================= tax start ====================

	public function OurTax()
	{
		$this->load->view('our_tax');		 
	}
	public function getourtaxdetails()
	{
		header('Access-Control-Allow-Origin: *');
		$success=$this->AdminModel->getourtaxdetailss();
		echo json_encode($success);
	}
	public function updateourtaxvalues()
	{
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();
		$success=$this->AdminModel->updateourtaxvaluess($data);
		echo json_encode($success);
	}

	// ================= tax end ====================

	// ================= customer invoice start ==================== 

	public function CustomerInvoiceList()
	{	
			header('Access-Control-Allow-Origin: *'); 
			$data["userdetails"] = $this->AdminModel->getuserdetailss();  
			$this->load->view('customer_invoice_list',$data);
	}
	public function getCustomerInvoiceList()
	{
		header('Access-Control-Allow-Origin: *');
		$success=$this->AdminModel->getCustomerInvoiceListt();
		echo json_encode($success);
	}


	public function CustomerInvoice()
	{	
			header('Access-Control-Allow-Origin: *'); 
			$data["userdetails"] = $this->AdminModel->getuserdetailss();  
			$data["hsnno"] = $this->AdminModel->getHsnnoo(); 
			$this->load->view('customer_invoice',$data);
	}

	public function getuseraddressdetails()
	{
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();
		$success=$this->AdminModel->getuseraddressdetails($data);
		echo json_encode($success);
	}

	//
	public function gettax()
	{
		header('Access-Control-Allow-Origin: *');
		$success=$this->AdminModel->gettaxx();
		echo json_encode($success);
	}

	public function createInvoice()
	{
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();
		$success=$this->AdminModel->createInvoicee($data);
		echo json_encode($success);
	}

	// ================= customer invoice end  ==================== 
	// ================= HSN NO Start  ==================== 

	public function Hsnno()
	{ 
			$this->load->view('hsnno'); ; 
	}
	public function getHsnno()
	{
		header('Access-Control-Allow-Origin: *');
		$success=$this->AdminModel->getHsnnoo();
		echo json_encode($success);
	}
	public function insertHsnno()
	{
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();
		$success=$this->AdminModel->insertHsnnoo($data);
		echo json_encode($success);
	}
	public function updateHsnno()
	{
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();
		$success=$this->AdminModel->updateHsnnoo($data);
		echo json_encode($success);
	}
	public function RestoreHsnno()
	{
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();
		$success=$this->AdminModel->RestoreHsnnoo($data);
		echo json_encode($success);
	}
	public function DeleteHsnno()
	{
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();
		$success=$this->AdminModel->DeleteHsnnoo($data);
		echo json_encode($success);
	}

	// ================= HSN NO end  ==================== 






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
				
				if($success)
				{
					$this->session->set_userdata('username', $data['name']);
					redirect(base_url() . 'AdminController/homeView',$data);
				}
				else
				{
					$data = array(
						'title' => 'Error',
						'heading' => 'Wrong Details',
						'message' => 'OOPS Something wrong'
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
	
	public function logout()  
	{  
		$this->session->unset_userdata('username');  
		$this->session->unset_userdata('user_id');  
		redirect(base_url());  
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

	public function MainCategory()
	{	
		if(!isset($_SERVER['HTTP_REFERER'])){
			echo "you directly access the url";
		}
		else
		{
			header('Access-Control-Allow-Origin: *');
			$data["result"] =$this->AdminModel->selectMainSubDepartment();
			$this->load->view('MainCategory',$data);
		}
	}
	public function main_category()
	{
		header('Access-Control-Allow-Origin: *');
		$success=$this->AdminModel->Select_Main_Category();
		echo json_encode($success);
	}
	public function insertMainCategoryData()
	{
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();
		$success=$this->AdminModel->insertMainCategoryDataa($data);
		echo json_encode($success);
	}
	public function updateMainCategoryData()
	{
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();
		$success=$this->AdminModel->updateMainCategoryDataa($data);
		echo json_encode($success);
	}
	public function DeleteMainCategoryData()
	{
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();
		$success=$this->AdminModel->DeleteMainCategoryDataa($data);
		echo json_encode($success);
	}
	public function RestoreSMainCategoryData()
	{
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();
		$success=$this->AdminModel->RestoreSMainCategoryDataa($data);
		echo json_encode($success);
	}
	public function SubCategoryView()
	{
		if(!isset($_SERVER['HTTP_REFERER'])){
			echo "you directly access the url";
		}
		else
		{
			header('Access-Control-Allow-Origin: *');
			$data["result"] =$this->AdminModel->selectMainSubDepartment();	
			$this->load->view('SubCategoryView',$data);
		}
	}
	public function sub_category()
	{
		header('Access-Control-Allow-Origin: *');
		$success=$this->AdminModel->Select_Sub_Category();
		echo json_encode($success);
	}
	
	public function insertSubCategoryData()
	{

		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();
        if(!empty($_FILES['scImage_url']['name']))
        {
            $config['upload_path'] = 'uploads/subcategoryimages/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] = $_FILES['scImage_url']['name'];
            $config['max_width']            = 1000;
			$config['max_height']           = 1000;
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            if($this->upload->do_upload('scImage_url'))
            {
                $uploadData = $this->upload->data();
                $photo = $uploadData['file_name'];
                $data["scImage_url"]=base_url().'uploads/subcategoryimages/'.$photo;
		        $success=$this->AdminModel->insertSubCategoryDataa($data);
            }
            else
            {
            	$output["success"] = "Image_error";
            }
        }
        else
        {
        	$output["success"] = "Image_empty";
        }
		echo json_encode($success);
	}

	public function updateSubCategoryData()
	{
        header('Access-Control-Allow-Origin: *');
        $data = $this->input->post();
        if(!empty($_FILES['scImage_url']['name']))
        {
            $config['upload_path'] = 'uploads/subcategoryimages/';
            $config['allowed_types']  = 'jpg|jpeg|png|gif';
            $config['file_name'] 	  = $_FILES['scImage_url']['name'];
            $config['max_width']      = 1000;
			$config['max_height']     = 1000;
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            if($this->upload->do_upload('scImage_url')){
                $uploadData = $this->upload->data();
                $photo = $uploadData['file_name'];
                $data["scImage_url"]=base_url().'uploads/subcategoryimages/'.$photo;
		        unset($data["imageoneinserted"]);
		        $success=$this->AdminModel->updateSubCategoryDataa($data);
            }
            else
            {
            	$success["status"] = "Image_error";
            }
        }
        else
        {
        	if($data["imageoneinserted"]!='')
        	{
        		$data["scImage_url"]=$data["imageoneinserted"];
		        unset($data["imageoneinserted"]);
		        $success=$this->AdminModel->updateSubCategoryDataa($data);
        	}
        	else
        	{
        		$success["status"] = "Image_empty";
        	}
        }

		echo json_encode($success);
	}
	public function RestoreSubCategoryData()
	{
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();
		$success=$this->AdminModel->RestoreSubCategoryDataa($data);
		echo json_encode($success);
	}
	public function DeleteSubCategoryData()
	{
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();
		$success=$this->AdminModel->DeleteSubCategoryDataa($data);
		echo json_encode($success);
	}
	
	public function MainDepartment()
	{	
		if(!isset($_SERVER['HTTP_REFERER'])){
			echo "you directly access the url";
		}
		else
		{
			header('Access-Control-Allow-Origin: *');
			$this->load->view('MainDepartment');
		}
	}
	public function main_department()
	{
		header('Access-Control-Allow-Origin: *');
		$success=$this->AdminModel->Select_Main_Department();
		echo json_encode($success);
	}
	public function insertMainDepartmentData()
	{
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();
		$success=$this->AdminModel->insertMainDepartmentDataa($data);
		echo json_encode($success);
	}
	public function updateMainDepartmentData()
	{
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();
		$success=$this->AdminModel->updateMainDepartmentDataa($data);
		echo json_encode($success);
	}
	public function RestoreMainDepartmentData()
	{
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();
		$success=$this->AdminModel->RestoreMainDepartmentDataa($data);
		echo json_encode($success);
	}
	public function DeleteMainDepartmentData()
	{
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();
		$success=$this->AdminModel->DeleteMainDepartmentDataa($data);
		echo json_encode($success);
	}
	public function SubDepartment()
	{	
		if(!isset($_SERVER['HTTP_REFERER'])){
			echo "you directly access the url";
		}
		else
		{
			header('Access-Control-Allow-Origin: *');
			$data["result"] =$this->AdminModel->selectMainDepartmentt();	
			$this->load->view('SubDepartment',$data);
		}
	}
	public function SubDepartmentView()
	{
		header('Access-Control-Allow-Origin: *');
		$success =$this->AdminModel->Select_Sub_Department();	
		echo json_encode($success);
	}
	public function insertSubDepartmentData()
	{
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();
		$success=$this->AdminModel->insertSubDepartmentDataa($data);
		echo json_encode($success);
	}
	public function updateSubDepartmentData()
	{
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();
		$success=$this->AdminModel->updateSubDepartmentDataa($data);
		echo json_encode($success);
	}
	public function DeleteSubDepartmentData()
	{
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();
		$success=$this->AdminModel->DeleteSubDepartmentDataa($data);
		echo json_encode($success);
	}	
	public function RestoreSubDepartmentData()
	{
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();
		$success=$this->AdminModel->RestoreSubDepartmentDataa($data);
		echo json_encode($success);
	}
	public function getSubDepartment()
	{
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();
		$success=$this->AdminModel->getSubDepartmentDataa($data);
		echo json_encode($success);
	}
	public function getMainCategory()
	{
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();
		$success=$this->AdminModel->getMainCategoryDataa($data);
		echo json_encode($success);
	}
	public function getSubCategory()
	{
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();
		$success=$this->AdminModel->getSubCategoryDataa($data);
		echo json_encode($success);
	}
	
	public function ProductsView()
	{	
		if(!isset($_SERVER['HTTP_REFERER'])){
			echo "you directly access the url";
		}
		else
		{
			$data["result"] =$this->AdminModel->selectMainSubDepartment();		
			$data["DietType"] =$this->AdminModel->getdiettypee();		
			$data["unit_type"] =$this->AdminModel->getunittype();		
			$this->load->view('Products',$data);
		}
	}
	public function selectProducts()
	{
		header('Access-Control-Allow-Origin: *');
		$success=$this->AdminModel->selectProductss();
		echo json_encode($success);
	}
	public function insertProductsData()
	{
		header('Access-Control-Allow-Origin: *');
			$data = $this->input->post();
			$foldername_cust=''.$data["md_code"].''.$data["sd_code"].''.$data["mc_code"].'';
			$pathurll = 'uploads/Products/'.$foldername_cust.'_img';

			if (!is_dir($pathurll)) 
			{
				$old = umask(0);
				mkdir($pathurll, 0777);
				umask($old);
			    // mkdir($pathurll, 0777, true);
			}

			$config['upload_path']          = $pathurll.'/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 2048;
			//$this->load->library('upload');
			$this->upload->initialize($config);	
			if($this->upload->do_upload('produ_imgurl'))
			{
				unset($data["produ_imgurl"]);
				
				$data["produ_imgurl"] = base_url().$pathurll.'/'.$this->upload->data('file_name');			
				$data["prod_id"]="null";

				$success=$this->AdminModel->insertProductss($data);
				echo json_encode($success);
				
			}
			else
			{
					$result["result"]=$this->upload->display_errors();
					echo json_encode($result);
			}	
	}
	public function updateProductsData()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			if (empty($_FILES['produ_imgurl']['name'])) {
				header('Access-Control-Allow-Origin: *');
				$data = $this->input->post();
				$success=$this->AdminModel->updateProductDataa($data);	
				if($success)
				{
					$res["result"] = "success";
					echo json_encode($res);
				}
				else
				{
					$res["result"] = "fail";
					echo json_encode($res);		
				}		
			}
			else
			{
				header('Access-Control-Allow-Origin: *');
				$data = $this->input->post();	
				$foldername_cust=''.$data["md_code"].''.$data["sd_code"].''.$data["mc_code"].'';
				$pathurll = 'uploads/Products/'.$foldername_cust.'_img';

				if (!is_dir($pathurll)) 
				{
					$old = umask(0);
					mkdir($pathurll, 0777);
					umask($old);
				    // mkdir($pathurll, 0777, true);
				}

				// print_r($pathurll);

				$config['upload_path']          = './'.$pathurll.'/';
				$config['allowed_types']        = '*';
				$config['max_size']             = 2048;
				//$this->load->library('upload');
				// print_r($config['upload_path']);

				$this->upload->initialize($config);	
				if($this->upload->do_upload('produ_imgurl'))
				{
					unset($data["produ_imgurl"]);
					
					$data["produ_imgurl"] = base_url().$pathurll.'/'.$this->upload->data('file_name');	

				// $config['upload_path']          = './uploads/Products/';
				// $config['allowed_types']        = 'gif|jpg|png|jpeg';
				// $config['max_size']             = 2048;
				// //$this->load->library('upload');
				// $this->upload->initialize($config);	
				// if($this->upload->do_upload('produ_imgurl'))
				// {
				// 	unset($data["produ_imgurl"]);
				// 	$data["produ_imgurl"] = base_url().'uploads/Products/'.$this->upload->data('file_name');			
					$success=$this->AdminModel->updateProductDataa($data);	
					if($success["result"] =="success")
					{
						$result["result"]="success";
						echo json_encode($result);	
					}	
					else
					{
						$result["result"]="fail";
						echo json_encode($result);				
					}	
				}
				else
				{
						$result["result"]=$this->upload->display_errors();
						echo json_encode($result);
				}
			}
		}
		else
		{
				$result["result"]="fail";
				echo json_encode($result);
		}
	}

	  


	public function viewrecepit()
	{	
	    header('Access-Control-Allow-Origin: *');
	    $data = $this->input->post();
		$succesers=$this->AdminModel->getorderedproductt($data);
	    $success = $succesers["order_details"];


	    $this->load->library('Pdf');
	    // $document = new Dompdf();
	     $output = '';
	      $output .= '<body>
       <div id="printDataDetails" style="font-size: 12px !important;">

        <div style="display: table; width: 100%; ">
            <div style="display: table-row; ">
                <div style="display: table-cell; width: 30%; text-align: left; border-bottom: 2px solid #C8C8C8;">
                    <img src="./assets/img/logo png.png" width="150px" style="margin: 0; padding: 0">
                </div>

                <div style="display: table-cell; width: 50%; text-align: right;margin-right: 20px; border-bottom: 2px solid #C8C8C8;">
                    <h2 style="margin-top:30px;margin-right: 20px;font-size: 16px !important; margin-bottom:5px!important;"> Order Invoice </h2>
                    <h4 style="margin-top:0px;margin-right: 20px;font-size: 13px !important;margin-bottom:8px!important;"> Quality Yalla Basket Foodstuff Trading LLC </h4>
                </div>
            </div>
        </div>
        <br>

        <div style="display: table;width: 100% !important;">
            <div style="display: table-row; width: 100% !important;">

                <div style="display:table-cell;text-align: left; width: 30%; padding: 0 5px;  float: left;">

                    <strong> <p style="font-size:14px!important;margin-bottom:8px!important;" >Shipment Details</p> </strong>

                    <div style="display: table; width: 100%; ">
                        <div style="display: table-row; ">
                            <div style="display: table-cell; width: 70%; text-align: left;margin-right: 20px; ">
                                <h4 style="margin: 3px !important; padding: 0px !important;font-weight: unset !important"> '.$success[0]["address_info"][0]["username"].', </h4>
                            </div>
                        </div>
                        <div style="display: table-row; ">

                            <div style="display: table-cell; width: 70%; text-align: left;margin-right: 20px;">
                                <h4 style="margin: 4px !important; padding: 0px !important;font-weight: unset !important"> '.$success[0]["address_info"][0]["flat_no"].', '.$success[0]["address_info"][0]["building_name"].', '.$success[0]["address_info"][0]["landmark"].', '.$success[0]["address_info"][0]["area"].', '.$success[0]["address_info"][0]["city"].' </h4>
                            </div>
                        </div>
                        <div style="display: table-row; ">

                            <div style="display: table-cell; width: 70%; text-align: left;margin-right: 20px;">
                                <h4 style="margin: 3px !important; padding: 0px !important;font-weight: unset !important"> Mobile No : '.$success[0]["address_info"][0]["mobile_no"].'</h4>
                            </div>
                        </div>
                    </div>

                </div>
                <div style="display:table-cell;text-align: left; width: 38%; padding: 0 5px;  float: left;">

                    <strong>   <p>&nbsp;</p> </strong>

                    <div style="display: table; width: 100%; ">
                        <div style="display: table-row; ">
                            <div style="display: table-cell; width: 35%; text-align: left; ">
                                <h4 style="margin: 8px !important; padding: 0px !important;font-weight: unset !important;margin-bottom:2px!important;">Order Number</h4>
                            </div>

                            <div style="display: table-cell; width: 70%; text-align: left;margin-right: 20px; ">
                                <h4 style="margin: 8px !important; padding: 0px !important;font-weight: unset !important;margin-bottom:2px!important;">: '.$success[0]["orderno"].' </h4>
                            </div>
                        </div>
                        <div style="display: table-row; ">
                            <div style="display: table-cell; width: 35%; text-align: left; ">
                                <h4 style="margin: 8px !important; padding: 0px !important;font-weight: unset !important;margin-bottom:2px!important;">Order Date</h4>
                            </div>

                            <div style="display: table-cell; width: 70%; text-align: left;margin-right: 20px;">
                                <h4 style="margin: 8px !important; padding: 0px !important;font-weight: unset !important;margin-bottom:2px!important;">: '.$success[0]["ordered_date_date"].' </h4>
                            </div>
                        </div>
						<div style="display: table-row; ">
                            <div style="display: table-cell; width: 35%; text-align: left; ">
                                <h4 style="margin: 8px !important; padding: 0px !important;font-weight: unset !important;margin-bottom:2px!important;">Delivery Date</h4>
                            </div>

                            <div style="display: table-cell; width: 70%; text-align: left;margin-right: 20px;">
                                <h4 style="margin: 8px !important; padding: 0px !important;font-weight: unset !important;margin-bottom:2px!important;">: '.$success[0]["delivery_date_date"].' </h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="display:table-cell;text-align: left; width: 25%; padding: 0 5px;  float: left;">

                    <strong>  <p>&nbsp;</p>  </strong>


                    <div style="display: table; width: 100%; ">
                        <div style="display: table-row; ">
                            <div style="display: table-cell; width: 50%; text-align: left; ">
                                <h4 style="margin: 8px !important; padding: 0px !important;font-weight: unset !important;margin-bottom:2px!important;">Payment Mode</h4>
                            </div>

                            <div style="display: table-cell; width: 50%; text-align: left;margin-right: 20px; ">
                                <h4 style="margin: 8px !important; padding: 0px !important;font-weight: unset !important;margin-bottom:2px!important;">: '.$success[0]["payment_type"].' </h4>
                            </div>
                        </div>
                        <div style="display: table-row; ">
                            <div style="display: table-cell; width: 50%; text-align: left; ">
                                <h4 style="margin: 8px !important; padding: 0px !important;font-weight: unset !important;margin-bottom:2px!important;">Total Price</h4>
                            </div>

                            <div style="display: table-cell; width: 50%; text-align: left;margin-right: 20px;">
                                <h4 style="margin: 8px !important; padding: 0px !important;font-weight: unset !important;margin-bottom:2px!important;">: AED '.$success[0]["total_price"].' </h4>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <br>
        <br>
        <div style="display: table;width: 100% !important;">
            <div style="display: table-row; width: 100% !important;background-color: #F8F8F8 !important">

                <div style="display:table-cell;text-align: left; width: 38%; padding: 0 5px;  float: left;background-color: #eff4fa !important">

                    <strong> <p> &nbsp;  &nbsp;  &nbsp; Description</p> </strong>
                </div>
                <div style="display:table-cell;text-align: left; width: 10%; padding: 0 5px;  float: left;background-color: #eff4fa !important">

                    <strong> <p>Price (AED)</p> </strong>
                </div>
                <div style="display:table-cell;text-align: left; width: 10%; padding: 0 5px;  float: left;background-color: #eff4fa !important">

                    <strong> <p>Total Qty</p> </strong>
                </div>
                <div style="display:table-cell;text-align: left; width: 15%; padding: 0 5px;  float: left;background-color: #eff4fa !important">

                    <strong> <p>Total Price (AED)</p> </strong>
                </div>

            </div>';

		foreach($success[0]["produc_info"] as $key=>$value1)
		{
			if($value1["product_type"]=='AP')
			{
				// print_r($value1);
	        	$output .= '<div style="display: table-row; width: 100% !important;">

	                <div style="display:table-cell;text-align: left; width: 38%; padding: 0 5px;  float: left;">

	                     <p style="margin-bottom:2px!important;">&nbsp; &nbsp; '.$value1["scName"].'- '.$value1["prod_name"].' ('.$value1["prod_quantity"].' '.$value1["unit"].') </p>
	                </div>
	                <div style="display:table-cell;text-align: left; width: 10%; padding: 0 5px;  float: left;">

	                     <p style="margin-bottom:2px!important;"> &nbsp; &nbsp; '.$value1["price_pt"].'</p> 
	                </div>
	                <div style="display:table-cell;text-align: left; width: 10%; padding: 0 5px;  float: left;">

	                     <p style="margin-bottom:2px!important;"> &nbsp; &nbsp; '.$value1["quantity"].' </p> 
	                </div>
	                <div style="display:table-cell;text-align: left; width: 15%; padding: 0 5px;  float: left;">

	                     <p style="margin-bottom:2px!important;"> &nbsp; &nbsp; '.$value1["prod_total_price"].'</p> 
	                </div>

	            </div>';
			}
			else if($value1["product_type"]=='NAP')
			{
	        	$output .= '<div style="display: table-row; width: 100% !important;">

	                <div style="display:table-cell;text-align: left; width: 38%; padding: 0 5px;  float: left;">

	                     <p style="margin-bottom:2px!important;">&nbsp; &nbsp;  '.$value1["prod_name"].' ('.$value1["prod_quantity"].' ) </p>
	                </div>
	                <div style="display:table-cell;text-align: left; width: 10%; padding: 0 5px;  float: left;">

	                     <p style="margin-bottom:2px!important;"> &nbsp; &nbsp; '.$value1["price_pt"].' </p> 
	                </div>
	                <div style="display:table-cell;text-align: left; width: 10%; padding: 0 5px;  float: left;">

	                     <p style="margin-bottom:2px!important;"> &nbsp; &nbsp; '.$value1["quantity"].' </p> 
	                </div>
	                <div style="display:table-cell;text-align: left; width: 15%; padding: 0 5px;  float: left;">

	                     <p style="margin-bottom:2px!important;"> &nbsp; &nbsp; '.$value1["prod_total_price"].' </p> 
	                </div>

	            </div>';
			}
			else if($value1["product_type"]=='slot_prod')
			{
	        	$output .= '<div style="display: table-row; width: 100% !important;">

	                <div style="display:table-cell;text-align: left; width: 38%; padding: 0 5px;  float: left;">
	                     <p style="margin:0px !important;margin-top:10px !important; padding:0px !important">&nbsp; &nbsp;  '.$value1["slot_prod_detail_print1"].' </p>
	                     <p style="margin:0px !important;margin-top:5px !important; padding:0px !important">&nbsp; &nbsp;  '.$value1["slot_prod_detail_print2"].' </p>
	                     <p style="margin:0px !important;margin-top:5px !important; padding:0px !important;margin-bottom:2px!important;">&nbsp; &nbsp;  '.$value1["slot_prod_detail_print3"].' </p>
	                </div>
	                <div style="display:table-cell;text-align: left; width: 10%; padding: 0 5px;  float: left;">

	                     <p style="margin:0px !important;margin-top:10px !important; padding:0px !important">&nbsp; &nbsp; </p>
	                     <p style="margin:0px !important;margin-top:5px !important; padding:0px !important"> &nbsp; &nbsp; '.$value1["price_pt"].' each  </p>
	                     <p style="margin:0px !important;margin-top:5px !important; padding:0px !important;margin-bottom:2px!important;">&nbsp; &nbsp; </p>
	                </div>

	                <div style="display:table-cell;text-align: left; width: 10%; padding: 0 5px;  float: left;">
	                     <p style="margin:0px !important;margin-top:10px !important; padding:0px !important">&nbsp; &nbsp; </p>
	                     <p style="margin:0px !important;margin-top:5px !important; padding:0px !important"> &nbsp; &nbsp; 1</p>
	                     <p style="margin:0px !important;margin-top:5px !important; padding:0px !important;margin-bottom:2px!important;">&nbsp; &nbsp; </p>
	                </div>
	                <div style="display:table-cell;text-align: left; width: 15%; padding: 0 5px;  float: left;">
	                     <p style="margin:0px !important;margin-top:10px !important; padding:0px !important">&nbsp; &nbsp; </p>
	                     <p style="margin:0px !important;margin-top:5px !important; padding:0px !important"> &nbsp; &nbsp; '.$value1["prod_total_price"].'</p>
	                     <p style="margin:0px !important;margin-top:5px !important; padding:0px !important;margin-bottom:2px!important;">&nbsp; &nbsp; </p>
	                </div>

	            </div>';
			}
		}

        $output .= '</div>

        <br>
        <br>
        <div style="display: table;width: 100% !important;">';
	    if($success[0]["orderbag_total"]!=null && $success[0]["orderbag_total"]!="0" && $success[0]["orderbag_total"]!="")
	    {

         $output .= '<div style="display: table-row; width: 100% !important;">

                <div style="display:table-cell;text-align: left; width: 38%; padding: 0 5px;  float: left;">

                    <strong> <p style="margin-bottom:2px!important;"> &nbsp;  &nbsp;  &nbsp; </p> </strong>
                </div>
                <div style="display:table-cell;text-align: left; width: 15%; padding: 0 5px;  float: left;">

                    <strong> <p style="margin-bottom:2px!important;"> &nbsp;  &nbsp;  &nbsp; </p> </strong>
                </div>
                <div style="display:table-cell;text-align: right; width: 15%; padding: 0 5px;  float: left;background-color: #eff4fa !important">

                    <strong> <p style="margin-bottom:2px!important;"> Item total </p> </strong>
                </div>
                <div style="display:table-cell;text-align: left; width: 15%; padding: 0 5px;  float: left;background-color: #eff4fa !important">

                     <p style="margin-bottom:2px!important;">: &nbsp; AED &nbsp; '.$success[0]["orderbag_total"].'</p>
                </div>

            </div>';
        }

	    if($success[0]["discount_price"]!=null && $success[0]["discount_price"]!="0" && $success[0]["discount_price"]!="")
	    {

         $output .= '<div style="display: table-row; width: 100% !important;">

                <div style="display:table-cell;text-align: left; width: 38%; padding: 0 5px;  float: left;">

                    <strong> <p style="margin-bottom:2px!important;"> &nbsp;  &nbsp;  &nbsp; </p> </strong>
                </div>
                <div style="display:table-cell;text-align: left; width: 15%; padding: 0 5px;  float: left;">

                    <strong> <p style="margin-bottom:2px!important;"> &nbsp;  &nbsp;  &nbsp; </p> </strong>
                </div>
                <div style="display:table-cell;text-align: right; width: 15%; padding: 0 5px;  float: left;background-color: #eff4fa !important">

                    <strong> <p style="margin-bottom:2px!important;"> Item Discount </p> </strong>
                </div>
                <div style="display:table-cell;text-align: left; width: 15%; padding: 0 5px;  float: left;background-color: #eff4fa !important">

                     <p style="margin-bottom:2px!important;">: &nbsp; AED &nbsp; '.$success[0]["discount_price"].'</p>
                </div>

            </div>';
        }

        if($success[0]["yalla_money"]=='yes')
	    {

         $output .= '<div style="display: table-row; width: 100% !important;">

                <div style="display:table-cell;text-align: left; width: 38%; padding: 0 5px;  float: left;">

                    <strong> <p style="margin-bottom:2px!important;"> &nbsp;  &nbsp;  &nbsp; </p> </strong>
                </div>
                <div style="display:table-cell;text-align: left; width: 15%; padding: 0 5px;  float: left;">

                    <strong> <p style="margin-bottom:2px!important;"> &nbsp;  &nbsp;  &nbsp; </p> </strong>
                </div>
                <div style="display:table-cell;text-align: right; width: 15%; padding: 0 5px;  float: left;background-color: #eff4fa !important">

                    <strong> <p style="margin-bottom:2px!important;"> Yalla Money </p> </strong>
                </div>
                <div style="display:table-cell;text-align: left; width: 15%; padding: 0 5px;  float: left;background-color: #eff4fa !important">

                     <p style="margin-bottom:2px!important;">: &nbsp; AED &nbsp; '.$success[0]["yalla_money_amount"].'</p>
                </div>

            </div>';
        }

	    if($success[0]["promocode_price"]!=null && $success[0]["promocode_price"]!="0" && $success[0]["promocode_price"]!="")
	    {

         $output .= '<div style="display: table-row; width: 100% !important;">

                <div style="display:table-cell;text-align: left; width: 38%; padding: 0 5px;  float: left;">

                    <strong> <p style="margin-bottom:2px!important;"> &nbsp;  &nbsp;  &nbsp; </p> </strong>
                </div>
                <div style="display:table-cell;text-align: left; width: 15%; padding: 0 5px;  float: left;">

                    <strong> <p style="margin-bottom:2px!important;"> &nbsp;  &nbsp;  &nbsp; </p> </strong>
                </div>
                <div style="display:table-cell;text-align: right; width: 15%; padding: 0 5px;  float: left;background-color: #eff4fa !important">

                    <strong> <p style="margin-bottom:2px!important;"> Coupon Discount </p> </strong>
                </div>
                <div style="display:table-cell;text-align: left; width: 15%; padding: 0 5px;  float: left;background-color: #eff4fa !important">

                     <p style="margin-bottom:2px!important;">: &nbsp; AED &nbsp; '.$success[0]["promocode_price"].'</p>
                </div>

            </div>';
        }

        $output .= '<div style="display: table-row; width: 100% !important;">

                <div style="display:table-cell;text-align: left; width: 38%; padding: 0 5px;  float: left;">

                    <strong> <p> &nbsp;  &nbsp;  &nbsp; </p> </strong>
                </div>
                <div style="display:table-cell;text-align: left; width: 15%; padding: 0 5px;  float: left;">

                    <strong> <p> &nbsp;  &nbsp;  &nbsp; </p> </strong>
                </div>
                <div style="display:table-cell;text-align: right; width: 15%; padding: 0 5px;  float: left;background-color: #eff4fa !important">

                    <strong> <p> Total Bill Value </p> </strong>
                </div>
                <div style="display:table-cell;text-align: left; width: 15%; padding: 0 5px;  float: left;background-color: #eff4fa !important">

                     <p >: &nbsp; AED &nbsp; '.$success[0]["total_price"].'</p>
                </div>

            </div>';



        $output .= '</div>



    </div>
</div>
</body>';

        $this->dompdf->loadHtml($output);        
//        $document->setPaper('A4', 'landscape');        
        $this->dompdf->set_paper("A4", "portrait");
        $this->dompdf->render(); 
        $outputResult = $this->dompdf->output();
        // file_put_contents('uploads/'.$Receiptt_no.'file.pdf', $outputResult);


        $targetFolder = "./uploads/invoice/";
        file_put_contents($targetFolder.$success[0]["orderno"].".pdf", $outputResult);

        $base_url = "https://yallabasket.com:3000/webcrmpanel/uploads/invoice/".$success[0]["orderno"].".pdf";

		$result["result"] = "success";
		$result["url"] =  $base_url;
		echo json_encode($result);

		// $this->load->view('pdfDownload');
	}

	public function viewrecepit1()
	{	
	    header('Access-Control-Allow-Origin: *');
	    $data = $this->input->post();
		$succesers=$this->AdminModel->getpdf($data);
	    $invoice = $succesers['invoice'][0];
	    $items = $succesers['items'];
	    $company = $succesers['company'][0];

	    // print_r($invoice);

	 //    foreach($items as $key=>$value)
		// {
		// 	echo $value;
		// 	print_r($items);
		// }

		// exit(); 


	    $this->load->library('Pdf');
	    // $document = new Dompdf();
	     $output = '';
	      $output .= '
	        <body style="margin:3px;">
    <div id="printDataDetails" style="font-size: 12px !important;border: 3px solid #282222;">
        <div style="display: table; width: 100%; ">
            <div style="display: table-row; ">
                <div style="display: table-cell; width: 100%; text-align: center; border-bottom: 2px solid #282222;">
                    <h2 style="margin: 0px">INVOICE</h2>
                </div>
            </div>
        </div>
        <div style="display: table; width: 100%; ">
            <div style="display: table-row; ">
                <div style="display: table-cell; width: 15%; text-align: left; border-bottom: 2px solid #282222;">
                    <img src="./assets/img/icon.jpg" style="margin:2px 0px; padding: 0;width: 38px;">
                </div>
                <div style="display: table-cell; width: 70%; text-align: center;margin-right: 20px; border-bottom: 2px solid #282222;">
                    <h5 style="margin:0px;font-size: 22px;font-weight: bold;">THIRD AXIS TECHNOLOGY</h5>
                    <p style="margin:0px;font-size: 16px;">3D-Scanning / 3D-Design / 3D-Printing</p>
                    <p style="margin:0px;font-size: 16px;">No.31, Andal Nagar Etn, Masakkalipalayam, Behind BSNL Office, Coimbatore-15.</p>
                </div>
                <div style="display: table-cell; width: 15%;  border-bottom: 2px solid #282222;">
                </div>
            </div>
        </div>
        <div style="display: table; width: 100%; ">
            <div style="display: table-row; ">
                <div style="display: table-cell; width: 50%; text-align: left; border-bottom: 2px solid #282222;border-right: 2px solid #282222;">
                    <p style="margin:5px 0px;">Website: www.thirdaxistechnology.com</p>
                    <p style="margin:5px 0px;">Ph.No: '.$company["phonenumber"].'</p>
                </div>
                <div style="display: table-cell; width: 50%; text-align: right;margin-right: 20px; border-bottom: 2px solid #282222;">
                    <p style="margin:5px 0px;">'.$company["email"].'</p>
                    <p style="margin:5px 0px;"> info@thirdaxistechnology.com</p>
                </div>
            </div>
        </div>
        <div style="display: table; width: 100%; ">
            <div style="display: table-row; ">
                <div style="display: table-cell; width: 33.33%; text-align: left;margin-right: 20px; border-bottom: 2px solid #282222;border-right: 2px solid #282222;">
                    <p style="margin: 2px 0px;">GST NO: '.$company["gst"].'</p>
                </div>
                <div style="display: table-cell; width: 33.34%; text-align: center;margin-right: 20px; border-bottom: 2px solid #282222;border-right: 2px solid #282222;">
                    <p style="margin: 2px 0px;">STATE CODE: 33</p>
                </div>
                <div style="display: table-cell; width: 33.33%; text-align: right;margin-right: 20px; border-bottom: 2px solid #282222;">
                    <p style="margin: 2px 0px;">PAN NO: '.$company["pan"].'</p>
                </div>
            </div>
        </div>
        <div style="display: table; width: 100%; ">
            <div style="display: table-row; ">
                <div style="display: table-cell; width: 50%; text-align: left; border-bottom: 2px solid #282222;border-right: 2px solid #282222;">
                    <p style="margin:5px 0px;font-size: 18px;">TAT/INV.NO : IN0306/21-22</p>
                    <p style="margin:2px 0px;">Transportation Mode: N.A</p>
                </div>
                <div style="display: table-cell; width: 50%; text-align: right;margin-right: 20px; border-bottom: 2px solid #282222;">
                    <p style="margin:5px 0px;font-size: 18px;">Date: 04.09.2021</p>
                    <p style="margin:2px 0px;"> Vehicle No: N.A</p>
                </div>
            </div>
        </div>
        <div style="display: table; width: 100%; ">
            <div style="display: table-row; ">
                <div style="display: table-cell; width: 50%; text-align: left; border-bottom: 2px solid #282222;border-right: 2px solid #282222;">
                    <p style="margin:0px;">PO/P.C.D/ DC REF : 10321223011497 / 13.08.2021</p>
                </div>
                <div style="display: table-cell; width: 50%; text-align: right;margin-right: 20px; border-bottom: 2px solid #282222;">
                    <p style="margin:0px;">Cust. D.C.REF / NO : 1322702952 / 13.08.2021</p>
                </div>
            </div>
        </div>
        <div style="display: table; width: 100%; ">
            <div style="display: table-row; ">
                <div style="display: table-cell; width: 50%; text-align: center; border-bottom: 2px solid #282222;border-right: 2px solid #282222;background-color: #fcd4b4;">
                    <p style="margin:0px;">Details of Consignee / Billed To</p>
                </div>
                <div style="display: table-cell; width: 50%; text-align: center;margin-right: 20px; border-bottom: 2px solid #282222;background-color: #fcd4b4;">
                    <p style="margin:0px;">Details of Consignee / Shipped To</p>
                </div>
            </div>
        </div>
        <div style="display: table; width: 100%; ">
            <div style="display: table-row; ">
                <div style="display: table-cell; width: 20%; text-align: center; border-bottom: 2px solid #282222;border-right: 2px solid #282222;background-color: #d9d9d9;">
                    <p style="margin:0px;">Name :</p>
                </div>
                <div style="display: table-cell; width: 30%; text-align: right;margin-right: 20px;border-right: 2px solid #282222; border-bottom: 2px solid #282222;">
                    <p style="margin:0px;text-align: left;padding-left: 5px;">'.$invoice["user_name"].'</p>
                </div>
                <div style="display: table-cell; width: 20%; text-align: center; border-bottom: 2px solid #282222;border-right: 2px solid #282222;background-color: #d9d9d9;">
                    <p style="margin:0px;">Name :</p>
                </div>
                <div style="display: table-cell; width: 30%; text-align: right;margin-right: 20px; border-bottom: 2px solid #282222;">
                    <p style="margin:0px;text-align: left;padding-left: 5px;">'.$invoice["user_name"].'</p>
                </div>
            </div>
        </div>
        <div style="display: table; width: 100%; ">
            <div style="display: table-row; ">
                <div style="display: table-cell; width: 20%; text-align: center; border-bottom: 2px solid #282222;border-right: 2px solid #282222;background-color: #d9d9d9;">
                    <p style="margin:0px;">Address :</p>
                </div>
                <div style="display: table-cell; width: 30%; text-align: right;margin-right: 20px;border-right: 2px solid #282222; border-bottom: 2px solid #282222;">
                    <p style="margin:0px;text-align: left;padding-left: 5px;">'.$invoice["address"].'</p>
                </div>
                <div style="display: table-cell; width: 20%; text-align: center; border-bottom: 2px solid #282222;border-right: 2px solid #282222;background-color: #d9d9d9;">
                    <p style="margin:0px;">Address :</p>
                </div>
                <div style="display: table-cell; width: 30%; text-align: right;margin-right: 20px; border-bottom: 2px solid #282222;">
                    <p style="margin:0px;text-align: left;padding-left: 5px;">'.$invoice["address"].'</p>
                </div>
            </div>
        </div>
        <div style="display: table; width: 100%; ">
            <div style="display: table-row; ">
                <div style="display: table-cell; width: 20%; text-align: center; border-bottom: 2px solid #282222;border-right: 2px solid #282222;background-color: #d9d9d9;">
                    <p style="margin:0px;">GSTIN NO :</p>
                </div>
                <div style="display: table-cell; width: 30%; text-align: right;margin-right: 20px;border-right: 2px solid #282222; border-bottom: 2px solid #282222;">
                    <p style="margin:0px;text-align: left;padding-left: 5px;">'.$invoice["gst"].'</p>
                </div>
                <div style="display: table-cell; width: 20%; text-align: center; border-bottom: 2px solid #282222;border-right: 2px solid #282222;background-color: #d9d9d9;">
                    <p style="margin:0px;">GSTIN NO :</p>
                </div>
                <div style="display: table-cell; width: 30%; text-align: right;margin-right: 20px; border-bottom: 2px solid #282222;">
                    <p style="margin:0px;text-align: left;padding-left: 5px;">'.$invoice["gst"].'</p>
                </div>
            </div>
        </div>
        <div style="display: table; width: 100%; ">
            <div style="display: table-row; ">
                <div style="display: table-cell; width: 20%; text-align: center; border-bottom: 2px solid #282222;border-right: 2px solid #282222;background-color: #d9d9d9;">
                    <p style="margin:0px;">State & Code:</p>
                </div>
                <div style="display: table-cell; width: 15%; text-align: right;margin-right: 20px;border-right: 2px solid #282222; border-bottom: 2px solid #282222;">
                    <p style="margin:0px;text-align: left;padding-left: 5px;">'.$invoice["state"].'</p>
                </div>
                <div style="display: table-cell; width: 15%; text-align: right;margin-right: 20px;border-right: 2px solid #282222; border-bottom: 2px solid #282222;">
                    <p style="margin:0px;text-align: left;padding-left: 5px;">'.$invoice["state_code"].'</p>
                </div>
                <div style="display: table-cell; width: 20%; text-align: center; border-bottom: 2px solid #282222;border-right: 2px solid #282222;background-color: #d9d9d9;">
                    <p style="margin:0px;">State & Code:</p>
                </div>
                <div style="display: table-cell; width: 15%; text-align: right;margin-right: 20px;border-right: 2px solid #282222; border-bottom: 2px solid #282222;">
                    <p style="margin:0px;text-align: left;padding-left: 5px;">'.$invoice["state"].'</p>
                </div>
                <div style="display: table-cell; width: 15%; text-align: right;margin-right: 20px; border-bottom: 2px solid #282222;">
                    <p style="margin:0px;text-align: left;padding-left: 5px;">'.$invoice["state_code"].'</p>
                </div>
            </div>
        </div>
        <div style="display: table; width: 100%; ">
            <div style="display: table-row; ">
                <div style="display: table-cell; width: 20%; text-align: center; border-bottom: 2px solid #282222;border-right: 2px solid #282222;background-color: #d9d9d9;">
                    <p style="margin:0px;">Contact Person & Ph.No</p>
                </div>
                <div style="display: table-cell; width: 15%; text-align: right;margin-right: 20px;border-right: 2px solid #282222; border-bottom: 2px solid #282222;">
                    <p style="margin:0px;text-align: left;padding-left: 5px;">'.$invoice["contactperson"].'</p>
                </div>
                <div style="display: table-cell; width: 15%; text-align: right;margin-right: 20px;border-right: 2px solid #282222; border-bottom: 2px solid #282222;">
                    <p style="margin:0px;text-align: left;padding-left: 5px;">'.$invoice["phonenumber"].'</p>
                </div>
                <div style="display: table-cell; width: 20%; text-align: center; border-bottom: 2px solid #282222;border-right: 2px solid #282222;background-color: #d9d9d9;">
                    <p style="margin:0px;">Contact Person & Ph.No</p>
                </div>
                <div style="display: table-cell; width: 15%; text-align: right;margin-right: 20px;border-right: 2px solid #282222; border-bottom: 2px solid #282222;">
                    <p style="margin:0px;text-align: left;padding-left: 5px;">'.$invoice["contactperson"].'</p>
                </div>
                <div style="display: table-cell; width: 15%; text-align: right;margin-right: 20px; border-bottom: 2px solid #282222;">
                    <p style="margin:0px;text-align: left;padding-left: 5px;">'.$invoice["phonenumber"].'</p>
                </div>
            </div>
        </div>
        <div style="display: table; width: 100%; ">
            <div style="display: table-row; ">
                <div style="display: table-cell; width: 100%; text-align: left; border-bottom: 2px solid #282222;">
                    <p style="margin:0px;">Dear Sir,</p>
                    <p style="margin:0px;">Please Receive the Following Goods and at the receipt in good condition return the duplicate duly signed.</p>
                </div>
            </div>
        </div>
        <div style="display: table; width: 100%; ">
            <div style="display: table-row; ">
                <div style="display: table-cell; width: 10%; text-align: center; border-bottom: 2px solid #282222;border-right: 2px solid #282222;background-color: #fcd4b4;">
                    <p style="margin:0px;">SI.NO</p>
                </div>
                <div style="display: table-cell; width: 15%; text-align: center;margin-right: 20px;border-right: 2px solid #282222; border-bottom: 2px solid #282222;background-color: #fcd4b4;">
                    <p style="margin:0px; padding: 6px 0px;">W.O.N / HSNNO</p>
                </div>
                <div style="display: table-cell; width: 30%; text-align: center;margin-right: 20px;border-right: 2px solid #282222; border-bottom: 2px solid #282222;background-color: #fcd4b4;">
                    <p style="margin:0px; padding: 6px 0px;">DESCRIPTION</p>
                </div>
                <div style="display: table-cell; width: 10%; text-align: center; border-bottom: 2px solid #282222;border-right: 2px solid #282222;background-color: #fcd4b4;">
                    <p style="margin:0px; padding: 6px 0px;">QTY</p>
                </div>
                <div style="display: table-cell; width: 20%; text-align: center;margin-right: 20px;border-right: 2px solid #282222; border-bottom: 2px solid #282222;background-color: #fcd4b4;">
                    <p style="margin:0px; padding: 6px 0px;">UNIT PRICE</p>
                </div>
                <div style="display: table-cell; width: 15%; text-align: center;margin-right: 20px; border-bottom: 2px solid #282222;background-color: #fcd4b4;">
                    <p style="margin:0px; padding: 6px 0px;">AMOUNT</p>
                </div>
            </div>
        </div>';

        foreach($items as $key=>$value)
		{

        $output .= '<div style="display: table; width: 100%; ">
            <div style="display: table-row; ">
                <div style="display: table-cell; width: 10%; text-align: center; border-bottom: 2px solid #282222;border-right: 2px solid #282222;">
                    <p style="margin:3px 0px;">'.$key.'</p>
                </div>
                <div style="display: table-cell; width: 15%; text-align: center;margin-right: 20px;border-right: 2px solid #282222; border-bottom: 2px solid #282222;">
                    <p style="margin:3px 0px; ">'.$value["hsnno"].'</p>
                </div>
                <div style="display: table-cell; width: 30%; text-align: center;margin-right: 20px;border-right: 2px solid #282222; border-bottom: 2px solid #282222;">
                    <p style="margin:3px 0px;text-align: left;padding-left: 5px;">'.$value["description"].'</p>
                </div>
                <div style="display: table-cell; width: 10%; text-align: center; border-bottom: 2px solid #282222;border-right: 2px solid #282222;">
                    <p style="margin:3px 0px;">'.$value["quantity"].'</p>
                </div>
                <div style="display: table-cell; width: 20%; text-align: center;margin-right: 20px;border-right: 2px solid #282222; border-bottom: 2px solid #282222;">
                    <p style="margin:3px 0px; ">'.$value["item_total"].'</p>
                </div>
                <div style="display: table-cell; width: 15%; text-align: right;margin-right: 20px; border-bottom: 2px solid #282222;">
                    <p style="margin:3px 0px;">'.$value["item_sub_total"].'</p>
                </div>
            </div>
        </div>';

    	}


        $output .= '<div style="display: table; width: 100%; ">
            <div style="display: table-row; ">
                <div style="display: table-cell; width: 65%; text-align: left; border-right: 2px solid #282222;">
                    <p style="margin:5px 0px;font-weight: bold;font-size: 15px;">Bank Details :</p>
                    <p style="margin:5px 0px;">NAME : THIRD AXIS TECHNOLOGY</p>
                </div>
                <div style="display: table-cell; width: 20%; text-align: left; border-bottom: 2px solid #282222;border-right: 2px solid #282222;">
                    <p style="margin:5px 0px;font-size: 18px;font-weight: bold;">TOTAL</p>
                </div>
                <div style="display: table-cell; width: 15%; text-align: right; border-bottom: 2px solid #282222;">
                    <p style="margin:5px 0px;font-size: 18px;font-weight: bold;">'.$invoice["total_amount"].'</p>
                </div>
            </div>
        </div>
        <div style="display: table; width: 100%; ">
            <div style="display: table-row; ">
                <div style="display: table-cell; width: 65%; text-align: left;  border-right: 2px solid #282222;">
                    <p style="margin:5px 0px;">BANK AC/NO & NAME: 38283824570 & SBI BANK</p>
                </div>
                <div style="display: table-cell; width: 20%;  border-bottom: 2px solid #282222;border-right: 2px solid #282222;">
                    <p style="margin:5px 0px;">CGST @ <span style="float: right;">9.00%</span> </p>
                </div>
                <div style="display: table-cell; width: 15%; text-align: right; border-bottom: 2px solid #282222;">
                    <p style="margin:5px 0px;font-size: 18px;font-weight: bold;">270</p>
                </div>
            </div>
        </div>
        <div style="display: table; width: 100%; ">
            <div style="display: table-row; ">
                <div style="display: table-cell; width: 65%; text-align: left; border-bottom: 2px solid #282222;border-right: 2px solid #282222;">
                    <p style="margin:5px 0px;">IFSC CODE: SBIN0003302</p>
                </div>
                <div style="display: table-cell; width: 20%; border-bottom: 2px solid #282222;border-right: 2px solid #282222;">
                    <p style="margin:5px 0px;">SGST @ <span style="float: right;">9.00%</span></p>
                </div>
                <div style="display: table-cell; width: 15%; text-align: right; border-bottom: 2px solid #282222;">
                    <p style="margin:5px 0px;font-size: 18px;font-weight: bold;">270</p>
                </div>
            </div>
        </div>
        <div style="display: table; width: 100%; ">
            <div style="display: table-row; ">
                <div style="display: table-cell; width: 65%; text-align: left; border-right: 2px solid #282222;">
                    <p style="margin:5px 0px;font-weight: bold;">GRAND TOTAL IN WORDS:</p>
                </div>
                <div style="display: table-cell; width: 20%; text-align: center; border-bottom: 2px solid #282222;border-right: 2px solid #282222;">
                    <p style="margin:5px 0px;">Round Off </p>
                </div>
                <div style="display: table-cell; width: 15%; text-align: left; border-bottom: 2px solid #282222;">
                    <p style="margin:5px 0px;"></p>
                </div>
            </div>
        </div>
        <div style="display: table; width: 100%; ">
            <div style="display: table-row; ">
                <div style="display: table-cell; width: 65%; text-align: left;  border-right: 2px solid #282222;border-bottom: 2px solid #282222;">
                    <p style="margin:4px 0px;">THREE THOUSAND FIVE HUNDRED AND FOURTY /-</p>
                </div>
                <div style="display: table-cell; width: 20%; text-align: center; border-bottom: 2px solid #282222;border-right: 2px solid #282222;background-color: #e6b8b7;">
                    <p style="margin:4px 0px;font-weight: bold;">GRAND TOTAL :</p>
                </div>
                <div style="display: table-cell; width: 15%; text-align: right; border-bottom: 2px solid #282222;">
                    <p style="margin:4px 0px;font-weight: bold;font-size: 18px;">3540</p>
                </div>
            </div>
        </div>
        <div style="display: table; width: 100%; ">
            <div style="display: table-row; ">
                <div style="display: table-cell; width: 33.33%; text-align: center;margin-right: 20px; border-bottom: 2px solid #282222;border-right: 2px solid #282222;">
                    <p style="margin:3px 0px;">Terms & Conditions</p>
                </div>
                <div style="display: table-cell; width: 33.34%; text-align: center;margin-right: 20px; border-bottom: 2px solid #282222;border-right: 2px solid #282222;">
                    <p style="margin:3px 0px;">Received goods in good condition</p>
                </div>
                <div style="display: table-cell; width: 33.33%; text-align: center;margin-right: 20px; border-bottom: 2px solid #282222;">
                    <p style="margin:3px 0px;"> Certified the goods are True & Correct </p>
                </div>
            </div>
        </div>
        <div style="display: table; width: 100%; height: 110px; ">
            <div style="display: table-row; ">
                <div style="display: table-cell; width: 33.33%; text-align: left;margin-right: 20px; border-bottom: 2px solid #282222;border-right: 2px solid #282222;">
                    <p style="margin:0px;">a. PAYMENT terms:50% Advance payment against PO, Remain at the receipt of delivery</p>
                </div>
                <div style="display: table-cell; width: 33.34%; text-align: center;margin-right: 20px; border-bottom: 2px solid #282222;border-right: 2px solid #282222; ">
                    <br><br><br><br><br><br><br>
                    <p style="margin:2px;">Receiver Seal & Sign</p>
                </div>
                <div style="display: table-cell; width: 33.33%;margin-right: 20px; border-bottom: 2px solid #282222; ">
                    <p style="margin:0px;text-align: left;">for THIRD AXIS TECHNOLOGY </p>
                    <p style="margin:0px; text-align: right;margin: 84px 10px 0px 0px;"> Authorized Signatory</p>
                </div>
            </div>
        </div>
        <div style="display: table; width: 100%; ">
            <div style="display: table-row; ">
                <div style="display: table-cell; width: 100%; text-align: center;margin-right: 20px;   ">
                    <p style="margin:3px 0px;">BRANCH OFFICE : Site No.48, SF NO.281/4B1, Sri Sabari Nagar, Naduppalayam, Peedampalli, Cbe-16, INDIA</p>
                </div>
            </div>
        </div>
    </div>
</body>';

        $this->dompdf->loadHtml($output);        
//        $document->setPaper('A4', 'landscape');        
        $this->dompdf->set_paper("A4", "portrait");
        $this->dompdf->render(); 
        $outputResult = $this->dompdf->output();
        // file_put_contents('uploads/'.$Receiptt_no.'file.pdf', $outputResult);


        $targetFolder = "./uploads/invoice/";
        file_put_contents($targetFolder.time().".pdf", $outputResult);

        $base_url = "http://localhost/project/billing/uploads/invoice/".time().".pdf";

		$result["result"] = "success";
		$result["url"] =  $base_url;
		echo json_encode($result);

		// $this->load->view('pdfDownload');
	}

	 




	 

 

	 
	
}


