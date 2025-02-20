
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
                                                <h4 class="page-title">Users</h4>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="card-body">                                        
                                        <table id="Main_Category" class="table dt-responsive w-100">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Invitation Name</th>   
                                                    <th>Invitation Type</th> 
                                                    <th>Invitation Image</th>
                                                    <th>User Price</th>
                                                    <th>Vendor Price</th> 
                                                    <th>Action</th>
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
                                <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-md" role="document">
                                        <div class="modal-content modal-col-green card">
                                            <div class="modal-body body" style="background-color:white;">
                                                <div class="card">
                                                    <form class="form-horizontal" name="CustomerList_Form" id="Hsnno_Form">
                                                        <div class="card-body">
                                                            <h4 class="card-title">Update Price Details</h4> 

                                                            <div class="form-group row">
                                                                <label for="fname" class="col-sm-3 text-left control-label col-form-label">User Price</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" id="inv_user_price" name="inv_user_price" placeholder="User Price">
                                                                </div>
                                                                <p class="error inv_user_price"></p>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="fname" class="col-sm-3 text-left control-label col-form-label">Vendor Price</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" id="inv_vendor_price" name="inv_vendor_price" placeholder="Vendor Price">
                                                                </div>
                                                                <p class="error inv_vendor_price"></p>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="fname" class="col-sm-3 text-left control-label col-form-label">Invitation Image</label>
                                                                <div class="col-sm-9">
                                                                    <input type="file" class="form-control" id="inv_img" name="inv_img">
                                                                </div>
                                                                <p class="error inv_img"></p>
                                                            </div>

 
                                                        </div>
                                                    <div class="border-top">
                                                        <div class="card-body" style="float:right;">
                                                            <button type="button" class="btn btn-primary" id="Hsnno_Button">Submit</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End of Model -->
                        </div>
                    </div>
                </div>
                <div id="page-wrapper">
                    <?php require("component/footer.php"); ?>
                    <script src="<?php echo base_url();?>custom/invitation.js"></script>
                </body>
            </html>