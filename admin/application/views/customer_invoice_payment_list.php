
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
                                                <h4 class="page-title text-capitalize">Invoice List Type</h4>

                                                <a href="<?php echo base_url() ?>AdminController/CustomerInvoicePaymentList/paid"> 
                                                    <button class="btn btn-success"> Paid List </button>   
                                                </a>
                                                <a href="<?php echo base_url() ?>AdminController/CustomerInvoicePaymentList/partially"> 
                                                    <button class="btn btn-warning"> Partially Paid List </button>   
                                                </a>
                                                <a href="<?php echo base_url() ?>AdminController/CustomerInvoicePaymentList/unpaid"> 
                                                    <button class="btn btn-danger"> Unpaid List </button>   
                                                </a>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12">
                                            
                                            <div class="page-title-box">
                                                <h4 class="page-title text-capitalize"> <?php echo $type ?> Invoice List</h4>
                                                <input id="payment_status" type="hidden" value="<?php echo $type ?>">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="card-body">    
 


                                        <table id="Main_Category" class="table dt-responsive w-100">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Invoice No</th> 
                                                    <th>Name</th> 
                                                    <th>Total</th>
                                                    <th>Payed Amount</th> 
                                                    <th>Balance Amount</th>   
                                                    <th>Status</th> 
                                                </tr>
                                                </thead>
                                            <tbody></tbody>
                                        </table>
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
                    <script src="<?php echo base_url();?>custom/customer_invoice_payment_list.js"></script>

                    <script type="text/javascript">
                function myFunction(argument)
                {
                alert(argument);
                }
                 
                $('#user_unique_id').selectize();
                </script>
                </body>
            </html>