<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<?php require("component/head.php"); ?>

<style type="text/css">
    .viewmorectyl-warn
    {
    padding: 13px;
    border: 1px solid;
    border-radius: 21px;
    padding-top: 3px;
    padding-bottom: 2px;
    }
    .viewmorectyl-prim
    {
    padding: 13px;
    border: 1px solid;
    border-radius: 21px;
    padding-top: 3px;
    padding-bottom: 2px;
    }
    .viewmorectyl-succ
    {
    padding: 13px;
    border: 1px solid;
    border-radius: 21px;
    padding-top: 3px;
    padding-bottom: 2px;
    }
    .viewmorectyl-dang
    {
    padding: 13px;
    border: 1px solid;
    border-radius: 21px;
    padding-top: 3px;
    padding-bottom: 2px;
    }
    .viewmorectyl-info
    {
    padding: 13px;
    border: 1px solid;
    border-radius: 21px;
    padding-top: 3px;
    padding-bottom: 2px;
    }
    .viewmorectyl-dark
    {
    padding: 13px;
    border: 1px solid;
    border-radius: 21px;
    padding-top: 3px;
    padding-bottom: 2px;
    }


    .card-box {
        background-color: #fff;
        padding: 1.5rem;
        box-shadow: 0 .75rem 6rem rgba(56,65,74,.03);
        margin-bottom: 24px;
        border-radius: 1.25rem;
    }

</style>

<body class="fix-sidebar">
<div id="wrapper">
	<?php require("component/menu.php"); ?>
	 <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <form class="form-inline">
                                            <div class="form-group">
                                                <div class="input-group input-group-sm">
                                                   
                                                </div>
                                            </div>
                                            
                                        </form>
                                    </div>
                                    <h4 class="page-title text-center mb-3 mt-4">Page Insight Details</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            
                            <?php
                                for($i=0; $i < count($insight); $i++){
                                    $page = "Page";
                                    if($insight[$i]["page"] == "businesscards") $page = "Business Cards" ;
                                    else if($insight[$i]["page"] == "mybusinesscards") $page = "My Business Cards" ;
                                    else if($insight[$i]["page"] == "myinvitationcards") $page = "My Invitation Cards" ;
                                    else if($insight[$i]["page"] == "savedbusinesscards") $page = "Saved Business Cards" ;
                                    else if($insight[$i]["page"] == "savedinvitationcards") $page = "Saved Invitation Cards" ;
                                    else if($insight[$i]["page"] == "weddinginvitations") $page = "Wedding Invitations" ;
                            ?>

                            <div class="col-md-6 col-xl-4">
                                <div class="widget-rounded-circle card-box border">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="avatar-lg rounded-circle border">
                                                <i class="fa fa-bar-chart font-22 avatar-title text-info"></i>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="text-right">
                                                <h3 class="text-dark mt-1"><span data-plugin="counterup"> <?= $insight[$i]["page_count"] ?> </span></h3>
                                                <h5 class="text-dark mb-1 text-truncate"><?= $page ?></h5> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                               }
                            ?>
                            



                            <!--<div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card-box">
                                    <a href="<?php echo base_url();?>AdminController/CustomerInvoicePaymentList/paid">
                                      <div class="row">
                                            <div class="col-4">
                                                <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                                    <i class="fa fa-money font-22 avatar-title text-info"></i>
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <div class="text-right">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $count_result["paid"]; ?></span></h3>
                                                    <p class="text-muted mb-1 text-truncate">Paid Invoice</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div> 

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card-box">
                                    <a href="<?php echo base_url();?>AdminController/CustomerInvoicePaymentList/partially">
                                      <div class="row">
                                            <div class="col-4">
                                                <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                                    <i class="fa fa-money font-22 avatar-title text-primary"></i>
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <div class="text-right">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $count_result["partially"]; ?></span></h3>
                                                    <p class="text-muted mb-1 text-truncate">Partially Paid Invoice</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                             <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card-box">
                                    <a href="<?php echo base_url();?>AdminController/CustomerInvoicePaymentList/unpaid">
                                      <div class="row">
                                            <div class="col-4">
                                                <div class="avatar-lg rounded-circle bg-soft-secondary border-secondary border">
                                                    <i class="fa fa-money font-22 avatar-title text-secondary"></i>
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <div class="text-right">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $count_result["unpaid"]; ?></span></h3>
                                                    <p class="text-muted mb-1 text-truncate">Unpaid Invoice</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div> -->


                             


                        </div>
                        <!-- end row-->

                        
                        
                    </div> <!-- container -->

                </div> <!-- content -->
                <!-- end Footer -->

            </div>
<div id="page-wrapper">

<?php require("component/footer.php"); ?>
<script src="<?php echo base_url();?>custom/Main_Category1.js"></script>
</body>
</html>