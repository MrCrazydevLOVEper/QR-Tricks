
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <?php require("component/head.php"); ?>
    <body class="fix-sidebar">
        <div id="wrapper">
            <div class="loading" id="loadder" ></div>
            <?php require("component/menu.php"); ?>
            <div class="content-page">
                <!-- <div class="spinner-border avatar-lg text-primary m-2" role="status"></div> -->
                <div class="content">
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        
                        <!-- end page title -->
                        <div class="row">
                            
                            <div class="col-12">
                                <div class="card">
                                    
                                    <div class="row">
                                        
                                        <div class="col-12">
                                            
                                            <div class="page-title-box">
                                               
                                                <h4 class="page-title">Invoice Payment Update</h4>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="card-body">   

                                        <div class="row">
                                            <div class="col-md-4">
                                                <h3>Customer Details</h3>
                                                <div class="customer_information">
                                                    <p class="company">   </p>
                                                    <p class="number">   </p>
                                                    <p class="contactperson">   </p>
                                                    <p class="gst">   </p>
                                                    <p class="address">   </p>
                                                    <p class="overall_total_amount"></p>
                                                    <p class="overall_payed_amount"></p>
                                                    <p class="overall_balance_amount"></p>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div id="Formdata_details_holder">
                                                <h3>Add Payment</h3>                                                    
                                                   <form class="form-horizontal" name="Formdata_details" id="Formdata_details">
                                                        <div class="card-body row">
                                                            <div class="col-12">
                                                                <div class="form-group row">
                                                                    <label for="fname" class="col-sm-3 text-left control-label col-form-label">Amount</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control numbersOnly" id="amount" name="amount" placeholder="Amount">
                                                                    </div>
                                                                    <p class="error amount"></p>
                                                                </div> 
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group row">
                                                                    <label for="fname" class="col-sm-3 text-left control-label col-form-label">Amount Type</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control" id="amount_type" name="amount_type" placeholder="Amount Type">
                                                                    </div>
                                                                    <p class="error amount_type"></p>
                                                                </div> 
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group row">
                                                                    <label for="invoice_note" class="col-sm-3 text-left control-label col-form-label">Invoice Note</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control" id="invoice_note" name="invoice_note" placeholder="Invoice Note">
                                                                    </div>
                                                                    <p class="error invoice_note"></p>
                                                                </div> 
                                                            </div>
                                                        </div> 
                                                      
                                                        <div class="border-top">
                                                            <div class="card-body" style="float:right;">
                                                                <button type="button" class="btn btn-primary" id="invoice_payement_btn">Submit</button>
                                                                <a href="<?php echo base_url();?>AdminController/CustomerPaymentList">
                                                                    <button type="button" class="btn btn-secondary" >Close</button>
                                                                </a>
                                                            </div>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <h3 class="mt-3">Invoice Details</h3>
                                                <div class="row" id="all_invoice_details"></div>
                                            </div> 


                                        </div>                                     
                                        
                                    </div> <!-- end card body-->
                                    </div> <!-- end card -->
                                    </div><!-- end col-->
                                </div>
                                <!-- end row-->
                                <!-- Large Size -->
                                
                            <!--End of Model -->
                        </div>
                    </div>
                </div>
                <div id="page-wrapper">
                    <?php require("component/footer.php"); ?>
                    <script src="<?php echo base_url();?>custom/invoice_payment_update.js"></script>
                    <style type="text/css">
                        .customer_information{
                           border: 1px solid #f1f1f1;  
                            padding: 20px;
                            background-color: #00bcd4b0;
                            color: #000;
                        }
                        .customer_information p, .invoice_details p{
                            margin-bottom: 7px;
                        }
                        .customer_information p:last-child , .invoice_details p:last-child{
                            margin-bottom: 0px;
                        }
                        .customer_information .company{
                            font-size: 20px;
                            font-weight: bold;
                        }
                        .invoice_details{
                            margin-top: 10px;
                            border: 1px solid #f1f1f1;  
                            padding: 10px;
                            background-color: #00d4b654;
                            color: #000;
                        }
                        .invoice_details p:first-child{
                            font-size: 18px;
                        }
                        .invoice_details span, .customer_information span{
                            font-weight: bold;
                        }
                    </style>
                </body>
            </html>