<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <?php require("component/head.php"); ?>
    <style type="text/css">
    #largeviewModal .modal-md {
    /*width: 950px !important;*/
        max-width: 950px !important;
    }
    .modal-md {
        width: 950px !important;
    }
    /*    .modal-md-cust {
    max-width: 800px !important;
    } */
    .select2-container {
    width: 260px !important;
    }
    .modal {
    overflow-x: hidden !important;
    overflow-y: auto !important;
    }
    .selectize-dropdown {
    display: none;
    }
    .cust_subscribe_input
    {
    display: inline-block;
    width: 25%;
    text-align: center;
    margin-left: -4px !important;
    margin-right: -4px;
    }
    .pluseminusbtn
    {
    display: inline-block;
    width: 10%;
    text-align: center;
    background-color: #8080800f;
    cursor: pointer;
    }
    .cust_sub_lable
    {
    padding-top: 7px !important;
    vertical-align: middle;
    font-size: 1.1rem;
    }
    .subscription_biweekly_days_popup
    {
    width: 20%;
    display: inline-block !important;
    }.display_biweekly_popup_content
    {
    padding: 5px 8px;
    border: 1px solid;
    border-radius: 7px;
    /* border-top-left-radius: 12px;
    border-bottom-right-radius: 12px; */
    display: inline-block;
    margin-left: 9px;
    margin-bottom: 1rem;
    width: 90%;
    text-align: center;
    cursor: pointer;
    font-size: 12px;
    }
    .visually-hidden-lable-biweekly {
    position: absolute;
    left: -100vw;
    }
    .visually-hidden-lable-monthly {
    position: absolute;
    left: -100vw;
    }
    .subscription_monthly_days_popup
    {
    width: 15%;
    display: inline-block !important;
    }
    .display_monthly_popup_content
    {
    padding: 6px 0px;
    border: 1px solid;
    border-radius: 7px;
    display: inline-block;
    margin-bottom: 1rem;
    width: 88%;
    text-align: center;
    cursor: pointer;
    font-size: 12px;
    }
    .weekselected_flg
    {
    color: #fff;
    background: #2a1d42;
    padding: 9px;;
    border-radius: 16px;
    border-bottom-left-radius: unset;
    border-top-right-radius: unset;
    border: none !important;
    }
    .weekly_prod_class_name
    {
    padding: 10px;
    border-bottom: 1px solid #80808014;
    }
    .bi-weekly_prod_class_name
    {
    padding: 10px;
    border-bottom: 1px solid #80808014;
    }
    .monthly_prod_class_name
    {
    padding: 10px;
    border-bottom: 1px solid #80808014;
    }
    .removeproducts
    {
    cursor: pointer;
    color: #eb1858;
    }
    .address_lable
    {
        vertical-align: middle;
        margin-left: 20px;
        cursor: pointer;
    }
    .error_custom
    {
        color: red;
    }
    </style>
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
                                                <h4 class="page-title">Create Orders</h4>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="card-body pt-0 mt-0">
                                        
                                        <div class="row">
                                            <div class="col-4">

                                                <div class="form-group mb-0 pb-0" >
                                                    <label for="fname" class="text-left control-label col-form-label" >Select Customer</label>
                                                    <select name="user_id" id="user_unique_id" placeholder="Customer List">
                                                        <option value=''>--- Select Customer ---</option>
                                                        <?php
                                                        foreach($userdetails as $value)
                                                        {
                                                        echo "<option value=".$value['user_id'].">".$value['user_name']."</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                    <p class="error user_id"></p>
                                                </div>

                                                <div class="form-group row display_address_info mb-0" >
                                                </div>


                                                <div class="form-group mb-0 pb-0" >
                                                    <label for="fname" class="text-left control-label col-form-label" >Delivery Date</label>
                                                    <input type="text" id="basic-datepicker" class="form-control delivery_date" name="delivery_date" placeholder="Delivery Date">
                                                    <p class="error delivery_date_form"></p>
                                                </div>
                                                <div class="form-group mb-0 row">
                                                    <div class="col-sm-12">
                                                        <label for="fname" class="text-left control-label col-form-label">Product Type</label>
                                                        <select id="product_type" name="product_type" class="form-control">
                                                            <option value=''>--- Select Product Type ---</option>
                                                            <option value='Avaliableproduct'>Avaliable Product</option>
                                                            <option value='Requestproduct'>Requested Product</option>
                                                        </select>
                                                        <p class="error product_type"></p>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group mb-0 Avaliableproductshow" style="display: none;">
                                                            <label for="fname" class="text-left control-label col-form-label">Select Product</label>
                                                            <select name="product_code" id="product_code" placeholder="Avaliable Product">
                                                                <option value=''>--- Select Product ---</option>
                                                                <!-- <option value="Keto">Keto</option> -->
                                                                <!-- <option value="test">test</option> -->
                                                                <?php
                                                                foreach($products as $value)
                                                                {
                                                                echo "<option value=".$value['prod_code'].">".$value['prod_value']."</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                            <p class="error product_code"></p>
                                                        </div>
                                                        <div class="form-group mb-0 Requestproductshow" style="display: none;">
                                                            <label for="fname" class=" text-left control-label col-form-label">Product Name</label>
                                                            <input class="form-control" name="product_code_req" id="product_code_req" placeholder="Enter Product Name">
                                                            <input type="hidden" class="form-control" name="product_id" id="product_id" placeholder="Enter Product Name">
                                                            <input type="hidden" class="form-control" name="produ_imgurl" id="produ_imgurl" placeholder="Enter Product Name">
                                                            <input type="hidden" class="form-control" name="original_amt" id="original_amt" placeholder="Enter Product Name">
                                                            <input type="hidden" class="form-control" name="prod_name" id="prod_name" placeholder="Enter Product Name">
                                                            <p class="error product_code_req"></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="row form-group mb-0 productdetails_show" style="display: none;" >
                                                            <div class="form-group mb-0 col-sm-6">
                                                                <label for="fname" class="text-left control-label col-form-label">Unit </label>
                                                                <!-- input type="text" class="form-control" name="unit_id" id="unit_id" placeholder="eg Grams, liter .."> -->

                                                                <select class="form-control" name="unit_id" id="unit_id"> 
                                                                    <option value="">Select</option>
                                                                    <option value="Grams">Grams</option>
                                                                    <option value="Kilogram">Kilogram</option>
                                                                    <option value="Liter">Liter</option>
                                                                    <option value="Box">Box</option>
                                                                    <option value="Piece">Piece</option>
                                                                    <option value="Bunch">Bunch</option>
                                                                    <option value="Pack">Pack</option>
                                                                </select>
                                                                <p class="error unit_id"></p>
                                                            </div>
                                                            <div class="form-group mb-0 col-sm-6">
                                                                <label for="fname" class="text-left control-label col-form-label">Product weight<span id="labeliderqty"> </span> </label>
                                                                <input class="form-control numbersOnly" name="product_weight" id="product_weight" placeholder="100 ,1 ">
                                                                <p class="error product_weight"></p>
                                                            </div>
                                                            <div class="form-group mb-0  col-sm-6">
                                                                <label for="fname" class="text-left control-label col-form-label">Product Quantity</label>
                                                                <input class="form-control numbersOnly" name="product_quantity" id="product_quantity" placeholder="Product Quantity">
                                                                <p class="error product_quantity"></p>
                                                            </div>
                                                            <div class="form-group mb-0  col-sm-6">
                                                                <label for="fname" class="text-left control-label col-form-label">Product Price <span id="labelider"> </span> </label>
                                                                <input class="form-control numbersOnly" name="product_price" id="product_price" placeholder="Enter Product Price">
                                                                <p class="error product_price"></p>
                                                            </div>
                                                            <div class="form-group col-sm-6">
                                                                <label for="fname" class="text-left control-label col-form-label">Total Price</label>
                                                                <input class="form-control numbersOnly" readonly="" name="product_total_price" id="product_total_price" placeholder="Product Total Price">
                                                                <p class="error product_total_price"></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="border-top">
                                                            <div class="card-body" style="float:right;">
                                                                <!-- <button type="button" class="btn btn-secondary" id="hideaddproductsbtnn">Close</button> -->
                                                                <button type="button" class="btn btn-primary" id="additemsbtnn">Add Product</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <!-- <div class="col-sm-12 mb-3">
                                                    <p class="error error_show_text"></p>
                                                    <button type="button" class="float-right btn btn-primary" id="btnsubmitsubscriptionform">Update subscription</button>
                                                </div> -->
                                            </div>
                                            <div class="col-8">
                                                <h5>Product Details</h5>
                                                <table class="table table-bordered table-centered mb-0 w-100">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th style="width: 15%">Product Image</th>
                                                            <th style="width: 25%">Product Details</th>
                                                            <th style="width: 15%">Quantity</th>
                                                            <th style="width: 15%">Price ( AED )</th>
                                                            <th style="width: 15%">Total ( AED )</th>
                                                            <th style="width: 15%">Remove</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="rows-list">
                                                        <tr >
                                                            <td class="order_prod_img"> 
                                                            </td >
                                                            <td class="order_prod_name">
                                                            </td>
                                                            <td class="order_prod_qty p-0 m-0">
                                                            </td>
                                                            <td class="order_prod_price p-0 m-0">
                                                            </td>
                                                            <td class="order_prod_total p-0 m-0">
                                                                
                                                            </td>
                                                            <td class="order_prod_remove p-0 m-0">
                                                                
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot class="appendproductfooter" style="display: none;">
                                                    <tr>
                                                        <td scope="row" colspan="3" style="border:none" class="text-right"></td>
                                                        <th scope="row" class="text-right" style="background: #f3f7f9;">Item Sub Total </th>
                                                        <td style="background: #f3f7f9;" colspan="2"><div class="col-sm-12 font-weight-bold">
                                                            <input class="form-control" id="order_sub_total" name="order_sub_total" readonly style="border:none;background:#f3f7f9;" placeholder="Enter Brand Name">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" colspan="3" style="border:none" class="text-right"></td>
                                                    <th scope="row" class="text-right" style="background: #f3f7f9;">Item Discount </th>
                                                    <td style="background: #f3f7f9;" colspan="2"><div class="col-sm-12 font-weight-bold">
                                                        <input class="form-control numbersOnly" id="order_discount" name="order_discount" >
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td scope="row" colspan="3" style="border:none" class="text-right"></td>
                                                <th scope="row" class="text-right" style="background: #f3f7f9;">Item Total </th>
                                                <td style="background: #f3f7f9;" colspan="2"><div class="col-sm-12 font-weight-bold">
                                                    <input class="form-control" id="order_total" name="order_total" readonly style="border:none;background:#f3f7f9;" placeholder="Enter Brand Name">
                                                </div>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    <div class="col-sm-12">
                                        <div class="border-top">
                                            <div class="card-body" style="float:right; display: inline-flex;">
                                                <p class="error common_error_fn mr-4" ></p>
                                                <button type="button" class="btn btn-primary" id="submit_fynl_order">Submit Order</button>
                                            </div>
                                        </div>
                                    </div>

                                    

                                </div>
                            </div>
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
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="mb-2">
                                                        <h4 class="card-title">Address Details</h4>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 Address_list_append_loop">

                                                </div>
                                            </div>
                                            <div class="border-top">
                                                <div class="card-body" style="float:right;">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-secondary" id="Submit_address">Submit</button>
                                                </div>
                                            </div>
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
                <script src="<?php echo base_url();?>custom/create_orders.js"></script>
                <script type="text/javascript">
                function myFunction(argument)
                {
                alert(argument);
                }
                
                $('#product_code').selectize();
                $('#user_unique_id').selectize();
                </script>
                <style>
                .image-display
                {
                display: inline-block;
                margin-right: 25px;
                }
                .image-delete-icon
                {
                margin-top: 20px;
                text-align: center;
                }
                .image-delete-icon>i
                {
                font-size: 16px;
                }
                ul.pro-img-overlay-1
                {
                text-decoration: none;
                display: inline-block;
                text-transform: uppercase;
                color: #fff;
                background-color: transparent;
                filter: alpha(opacity=0);
                -webkit-transition: all .2s ease-in-out;
                -o-transition: all .2s ease-in-out;
                transition: all .2s ease-in-out;
                padding: 0;
                margin: auto;
                position: absolute;
                top: 50%;
                left: 0;
                right: 0;
                transform: translateY(-50%) translateZ(0);
                -webkit-transform: translateY(-50%) translateZ(0);
                -ms-transform: translateY(-50%) translateZ(0);
                }
                .pro-im
                {
                width: 13%;
                overflow: hidden;
                position: relative;
                cursor: default;
                }
                .pro-img-overlay
                {
                width: 100px;
                height: 100%;
                position: absolute;
                overflow: hidden;
                top: 0;
                left: 0;
                opacity: 0;
                background-color: rgba(0, 0, 0, 0.7);
                -webkit-transition: all .4s ease-in-out;
                -o-transition: all .4s ease-in-out;
                transition: all .4s ease-in-out;
                }
                .pro-im:hover .pro-img-overlay
                {
                opacity: 1;
                filter: alpha(opacity=100);
                -webkit-transform: translateZ(0);
                -ms-transform: translateZ(0);
                transform: translateZ(0);
                text-align:center;
                }
                a.btn.default.btn-outline.image-popup-vertical-fit.el-link
                {
                border-color: #fff;
                color: #fff;
                padding: 12px 15px 10px;
                }
                li.el-item
                {
                list-style: none;
                display: inline-block;
                margin: 0 3px;
                }
                .displaybillimagesview
                {
                display: flex;
                }
                </style>
            </body>
        </html>