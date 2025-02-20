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
            <div class="content">
                <!-- Start Content-->
                <div class="container-fluid">           
                    
                    <div class="row">                        
                        <div class="col-12">
                            <div class="card">
                                <!-- start page title -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="page-title-box"> 
                                            <h4 class="page-title">Our Info</h4>
                                        </div>                                        
                                    </div>
                                </div>
                                <!-- end page title -->
                                <div class="card-body">
                                    <form class="form-horizontal" name="Formdata_details" id="Formdata_details">
                                        <div class="card-body row">
                                            <div class="col-5">
                                                <div class="form-group row">
                                                    <label for="fname" class="col-sm-3 text-left control-label col-form-label">Name</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                                    </div>
                                                    <p class="error name"></p>
                                                </div> 
                                                <div class="form-group row">
                                                    <label for="lname" class="col-sm-3 text-left control-label col-form-label">Email</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                                    </div>
                                                    <p class="error email"></p>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="lname" class="col-sm-3 text-left control-label col-form-label">Secondary Mail</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="sec_mail" name="sec_mail" placeholder="secondary mail">
                                                    </div>
                                                    <p class="error sec_mail"></p>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="lname" class="col-sm-3 text-left control-label col-form-label">GST No</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="gst" name="gst" placeholder="GST">
                                                    </div>
                                                    <p class="error gst"></p>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="lname" class="col-sm-3 text-left control-label col-form-label">Fax</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="fax" name="fax" placeholder="Fax">
                                                    </div>
                                                    <p class="error fax"></p>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="lname" class="col-sm-3 text-left control-label col-form-label">IFSC code</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="ifsc_code" name="ifsc_code" placeholder="ifsc code">
                                                    </div>
                                                    <p class="error ifsc_code"></p>
                                                </div>

                                                 <div class="form-group row">
                                                    <label for="lname" class="col-sm-3 text-left control-label col-form-label">Bank ac no</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="bank_ac_no" name="bank_ac_no" placeholder="secondary mail">
                                                    </div>
                                                    <p class="error bank_ac_no"></p>
                                                </div>
                                                
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group row">
                                                    <label for="fname" class="col-sm-4 text-left control-label col-form-label">Phone number</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="phonenumber" name="phonenumber" placeholder="Phone Number">
                                                    </div>
                                                    <p class="error phonenumber"></p>
                                                </div> 
                                                <div class="form-group row">
                                                    <label for="lname" class="col-sm-4 text-left control-label col-form-label">Secondary Number</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="sec_number" name="sec_number" placeholder="secondary number">
                                                    </div>
                                                    <p class="error sec_number"></p>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="lname" class="col-sm-4 text-left control-label col-form-label">Pan</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="pan" name="pan" placeholder="Pan">
                                                    </div>
                                                    <p class="error pan"></p>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="lname" class="col-sm-4 text-left control-label col-form-label">Website</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="website" name="website" placeholder="Website">
                                                    </div>
                                                    <p class="error website"></p>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="lname" class="col-sm-4 text-left control-label col-form-label">State Code</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="state_code" name="state_code" placeholder="State Code">
                                                    </div>
                                                    <p class="error state_code"></p>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="lname" class="col-sm-4 text-left control-label col-form-label">Bank Name</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="Bank Name">
                                                    </div>
                                                    <p class="error bank_name"></p>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="lname" class="col-sm-4 text-left control-label col-form-label">Services</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="services" name="services" placeholder="services">
                                                    </div>
                                                    <p class="error services"></p>
                                                </div>

                                            </div>

                                            <div class="col-10">
                                                <div class="form-group row">
                                                    <label for="fname" class="col-sm-2 text-left control-label col-form-label">Address</label>
                                                    <div class="col-sm-10">
                                                        <textarea  class="form-control" id="address" name="address" placeholder="Address"></textarea>
                                                    </div>
                                                    <p class="error address"></p>
                                                </div> 
                                            </div>
                                            <div class="col-10">
                                                <div class="form-group row">
                                                    <label for="fname" class="col-sm-2 text-left control-label col-form-label">Branch address</label>
                                                    <div class="col-sm-10">
                                                        <textarea  class="form-control" id="branch_address" name="branch_address" placeholder="Branch_address"></textarea>
                                                    </div>
                                                    <p class="error branch_address"></p>
                                                </div> 
                                            </div>



                                        </div>
                                        <div class="border-top">
                                            <div class="card-body" style="float:right;">
                                                <button type="button" class="btn btn-primary" id="Formdata_details_submit">Submit</button>
                                                <a href="<?php echo base_url();?>AdminController/yall_rewards">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                    </div> <!-- end card body-->
                                    </div> <!-- end card -->
                                    </div><!-- end col-->
                                </div>
                                <!-- end row-->
                                <!-- Large Size -->
                                
                            </div>
                        </div>
                    </div>
                    <div id="page-wrapper">
                        <?php require("component/footer.php"); ?>
                        <script src="<?php echo base_url();?>custom/our_info.js"></script>
                    </body>
                </html>