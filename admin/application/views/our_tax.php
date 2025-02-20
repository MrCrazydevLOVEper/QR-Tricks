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
                                            <h4 class="page-title">Tax Details</h4>
                                        </div>                                        
                                    </div>
                                </div>
                                <!-- end page title -->
                                <div class="card-body">
                                    <form class="form-horizontal" name="Formdata_details" id="Formdata_details">
                                        <div class="card-body row">
                                            <div class="col-5">
                                                <div class="form-group row">
                                                    <label for="fname" class="col-sm-3 text-left control-label col-form-label">GST</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="gst" name="gst" placeholder="gst">
                                                    </div>
                                                    <p class="error gst"></p>
                                                </div>  
                                                
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group row">
                                                    <label for="fname" class="col-sm-4 text-left control-label col-form-label">SGST</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="sgst" name="sgst" placeholder="sgst %">
                                                    </div>
                                                    <p class="error sgst"></p>
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
                        <script src="<?php echo base_url();?>custom/our_tax.js"></script>
                    </body>
                </html>