
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
                                                <div class="page-title-right">
                                                    <a class="btn btn-success" href="<?php echo base_url() ?>AdminController/CustomerInvoice"  ><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Add New</a>
                                                </div>
                                                <h4 class="page-title">Customer Invoice List</h4>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="card-body">    

                                    <div class="form-group row" style="width: 100%" >

                                            
                                            <div class="form-group col-3">
                                                <label>Billing From Date</label>
                                                <select name="user_unique_id" id="user_unique_id" placeholder="Customer List"> 
                                                    <option value=''>--- Select Customer ---</option>
                                                    <?php
                                                    foreach($userdetails as $value)
                                                    {
                                                    echo "<option value=".$value['user_id'].">".$value['user_name']."</option>";
                                                    }
                                                    ?>
                                                </select>
                                                <p class="error error_status"></p>
                                            </div>


                                            <div class="form-group col-2">
                                                <label>Billing From Date</label>
                                                <input type="text" id="basic-datepicker" class="form-control fromdateee" name="from_date" placeholder="From Date">
                                            </div>  
                                            <div class="form-group col-2">
                                                <label>Billing To Date</label>
                                                <input type="text" id="basic-datepicker2" class="form-control todateee" name="to_date" placeholder="To Date">
                                            </div> 

                                            <div class="form-group searchapply" style="width: 10%;margin-top: 1.8rem;text-align: center;">
                                                <button type="button" class="btn btn-primary" id="searchbtn_fltr">Search</button>
                                            </div>
                                            
                                        </div>


                                        <table id="Main_Category" class="table dt-responsive w-100">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Invoice No</th> 
                                                    <th>Name</th> 
                                                    <th>Total</th> 
                                                    <th>Status</th> 
                                                    <th>Billing Date</th> 
                                                    <th>Billing Due Date</th>  
                                                    <th>Print</th>  
                                                    <th>Edit</th>
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
                    <script src="<?php echo base_url();?>custom/customer_invoice_list.js"></script>

                    <script type="text/javascript">
                function myFunction(argument)
                {
                alert(argument);
                }
                 
                $('#user_unique_id').selectize();
                </script>
                </body>
            </html>