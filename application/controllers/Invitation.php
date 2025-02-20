<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invitation extends CI_Controller { 
    
    public function __construct() {
        parent:: __construct();
		require_once(APPPATH . 'third_party/paytm/PaytmChecksum.php');
        $this->load->helper('url');
		$this->load->model('InvitationModel');
    } 

	

	public function index()
	{
		$this->load->view('index');
	}  

	public function weddingInvitation()
	{
		$this->load->view('wedding_invitation');
	}  

	public function businessCards()
	{
		$this->load->view('business_cards');
	} 	

	public function weddingForm()
	{
		$this->load->view('wedding_form');
	} 

	public function businessCardForm()
	{
		$this->load->view('business_card_form');
	} 

	public function qrcodeGenerator()
    { 
		 $data = 'https://www.appteq.com';
		 $url = 'https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=' . urlencode($data);
		 echo '<img src="' . $url . '" alt="QR Code">'; 
    }

	public function download_qr_code() {
		$data = $this->input->get("v"); 
        $url = 'https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=' . urlencode($data);
        header('Content-Type: image/png');
        header('Content-Disposition: attachment; filename="qrcode.png"');
        readfile($url);
    }

	public function createInvitation(){
		$data = $this->input->post();  
		$data["form_id"] = $data["form_id"];
		if(!empty($_FILES['file']['name']))
        {
			$this->load->helper('string');
			$filename = random_string('alnum', 4).time().random_string('alnum', 4);
            $config['upload_path'] = 'uploads/logo/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] = $filename;
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            if($this->upload->do_upload('file'))
            {
                $uploadData = $this->upload->data();
                $photo = $uploadData['file_name'];
                $data["file"]= 'uploads/logo/'.$photo;
				$data["form_id"] = 2;
            }
            else
            {
            	$response["success"] = "fail"; 
            	$response["msg"] = "Enter valid image"; 
				echo json_encode($response);
				exit;
            }
        } 
		$response = $this->InvitationModel->createInvitation($data);
		echo json_encode($response);
	}

	public function invitationInformation(){
		$count = count($this->uri->segments);
		$info = $this->uri->segments[$count];
		$formdata = explode("-",$info);
		if(count($formdata) == 4){
			$form_id = $formdata[1];
			$user_id = $formdata[2];
			$id = $formdata[3];	
			$response = $this->InvitationModel->imageGenerate($form_id, $user_id, $id);
			if($response["status"] == "success"){
				$this->load->view('image_generator', $response);
			}
			else{
				echo "Error";
			}
		}
		else{
			echo "Error";
		}
	}

	public function downloadImage()
	{	
		$this->load->view('image_generator');
	} 

	public function userRegistration(){ 
		$data = $this->input->post(); 
		$response = $this->InvitationModel->userRegistration($data);
		echo json_encode($response);
	}
	public function validateOTP(){
		$data = $this->input->post(); 
		$request["otp"] = implode("",$data["otp"]);
		$request["token"] = $data["token"];
		$response = $this->InvitationModel->validateOTPp($request);
		echo json_encode($response);
	}
	public function userLogin(){ 
		$data = $this->input->post(); 
		$response = $this->InvitationModel->userLoginn($data);
		echo json_encode($response);
	} 
	public function vendorRegistration(){ 
		$data = $this->input->post(); 
		$response = $this->InvitationModel->vendorRegistrationn($data);
		echo json_encode($response);
	}
	public function getUserInfo(){ 
		$data = $this->input->post(); 
		$response = $this->InvitationModel->getUserInfo($data);
		echo json_encode($response);
	}

	public function getAllInvitation(){
        $token = $this->input->post('token');
		$response = $this->InvitationModel->getAllInvitationn($token);
		echo json_encode($response);
	} 
	public function savedList() {
        $data = $this->input->post();
        $response = $this->InvitationModel->savedListt($data);
        echo json_encode($response);
    }
	public function getSavedCards() {
        $data = $this->input->post();
        $response = $this->InvitationModel->getSavedCardss($data);
        echo json_encode($response);
    }
	public function getMyCards() {
        $data = $this->input->post();
        $response = $this->InvitationModel->getMyCardss($data);
        echo json_encode($response);
    }
	public function historyReport() { 
		$this->InvitationModel->historyReportt($_GET); 
    }
	public function getGift()  
	{   
        $response = $this->InvitationModel->getGiftt();
        echo json_encode($response); 
	} 	
    

	public function paytmRequest() {
        // Initialize Paytm parameters
        $paytmParams = array();
        $paytmParams["body"] = array(
            "requestType"   => "Payment",
            "mid"           => "jmFgiR45778616058536",
            "websiteName"   => "WEBSTAGING",
            "orderId"       => "ORDERID_89",
            "callbackUrl"   => "http://localhost/projects/invitation-maker/Invitation/paymentResponse",
            "txnAmount"     => array(
                "value"     => "1.00",
                "currency"  => "INR",
            ),
            "userInfo"      => array(
                "custId"    => "CUST_001",
            ),
        );

        // Generate checksum
        $checksum = \paytm\paytmchecksum\PaytmChecksum::generateSignature(
            json_encode($paytmParams["body"], JSON_UNESCAPED_SLASHES),
            "ThLTzl2w3E1rx@Jg"
        );

        // Set the signature in the head
        $paytmParams["head"] = array(
            "signature" => $checksum
        );

        // Convert parameters to JSON format
        $post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

        // Paytm API URL for Staging
        $url = "https://securegw-stage.paytm.in/theia/api/v1/initiateTransaction?mid=jmFgiR45778616058536&orderId=ORDERID_89";

        // Initialize cURL
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));

        // Execute cURL request
        $response = curl_exec($ch);

        // Check for cURL errors
        if (curl_errno($ch)) {
            echo 'Curl error: ' . curl_error($ch);
        } else {
            // Output the response
            print_r($response);
        }

        // Close cURL
        curl_close($ch);
    }
	
	public function paymentResponse() {
		// Load Paytm Library
		// Paytm sends the response via POST, capture the response
		$paytmParams = $_POST;
	
		// Debugging output - Log the entire response from Paytm
		log_message('error', 'Received Paytm Params: ' . print_r($paytmParams, true));
	
		// Paytm Merchant Key
		$paytmMerchantKey = "ThLTzl2w3E1rx@Jg";  // Make sure this is your correct merchant key
	
		// Retrieve the received checksum
		$paytmChecksum = isset($paytmParams["CHECKSUMHASH"]) ? $paytmParams["CHECKSUMHASH"] : "";
	
		// Verify checksum
		$isValidChecksum = PaytmChecksum::verifySignature($paytmParams, $paytmMerchantKey, $paytmChecksum);
	
		// Debugging output for checksum verification
		log_message('error', 'Checksum from Paytm: ' . $paytmChecksum);
		log_message('error', 'Checksum verification result: ' . ($isValidChecksum ? 'Valid' : 'Invalid'));
	
		if ($isValidChecksum) {
			// Successful verification
			if (isset($paytmParams['STATUS']) && $paytmParams['STATUS'] == 'TXN_SUCCESS') {
				// Handle successful transaction
				$order_id = $paytmParams['ORDERID'];
				$transaction_id = $paytmParams['TXNID'];
				$amount = $paytmParams['TXNAMOUNT'];
	
				// Example code to update order status in your database
				$data = array(
					'order_status' => 'Completed',
					'transaction_id' => $transaction_id,
					'payment_status' => 'Success',
					'paid_amount' => $amount
				);
	
				$this->db->where('order_id', $order_id);
				$this->db->update('orders', $data);
	
				$this->session->set_flashdata('success', 'Payment successful! Your order ID is: ' . $order_id);
				redirect('payment/success');
			} else {
				// Handle failed transaction
				$order_id = isset($paytmParams['ORDERID']) ? $paytmParams['ORDERID'] : 'Unknown Order ID';
				$data = array(
					'order_status' => 'Failed',
					'payment_status' => 'Failure'
				);
	
				$this->db->where('order_id', $order_id);
				$this->db->update('orders', $data);
	
				$this->session->set_flashdata('error', 'Payment failed! Please try again.');
				redirect('payment/failure');
			}
		} 
		else {
			// Log checksum mismatch
			log_message('error', 'Checksum mismatch for order ID: ' . (isset($paytmParams['ORDERID']) ? $paytmParams['ORDERID'] : 'N/A'));
			$this->session->set_flashdata('error', 'Checksum mismatch. Payment failed!');
			redirect('payment/failure');
		}
	}
	
	
	
	
}