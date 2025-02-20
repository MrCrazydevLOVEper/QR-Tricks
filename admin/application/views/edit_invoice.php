<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <?php require("component/head.php"); ?>
    <style>
        .address-holder{
            display: none;
        }
        .removeproducts{
            cursor: pointer!important;
        }
        .edit_products{
            cursor: pointer;
        }
    </style>
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
                                            <div class="page-title-right">
                                                    <a class="btn btn-success" href="<?php echo base_url() ?>AdminController/CustomerInvoiceList"  ><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Invoice List</a>
                                                </div>

                                            <h4 class="page-title">Edit Customer Invoice</h4>
                                            <!-- get last segments start -->
                                            <?php
                                                // $link = $_SERVER['PHP_SELF'];
                                                // $link_array = explode('/',$link);
                                                // $page = end($link_array);
                                                
                                                $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
                                            ?>
                                                <input type="hidden" id="get_invoice_id" value="<?php   echo $uriSegments[5]; ?>" >
                                            <!-- get last segments end  -->


                                        </div>                                        
                                    </div>
                                </div>
                                <!-- end page title -->
                               <div class="card-body">
                                    <form class="form-horizontal" name="Formdata_details" id="Formdata_details">
                                        <div class="card-body row">
                                            <div class="col-4">

                                                <h3>Billing Information</h3>

                                                <div class="form-group mb-0 pb-0" >
                                                    <label for="fname" class="text-left control-label col-form-label" >Select Customer</label>
                                                    <select name="user_unique_id" id="user_unique_id" placeholder="Customer List"> 
                                                        <option value=''>--- Select Customer ---</option>
                                                        <?php
                                                        foreach($userdetails as $value)
                                                        {
                                                        echo "<option value=".$value['user_id'].">".$value['user_name']."</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                    <p class="error user_unique_id"></p>
                                                </div>

                                                <div class="form-group row display_address_info mb-0" >
                                                </div>


                                                <div class="form-group row address-holder">
                                                    <label for="fname" class="col-sm-12 text-left control-label col-form-label">Billing Address</label>
                                                    <div class="col-sm-12">
                                                        <textarea type="text" class="form-control" id="address" name="address" placeholder="Address"></textarea>
                                                    </div>
                                                    <p class="error address"></p> 
                                                </div> 
                                                <div class="form-group row address-holder"> 
                                                    <div class="col-sm-12">
                                                            <input class="form-control" name="state" id="state" placeholder="state">
                                                    </div>
                                                    <p class="error state"></p> 
                                                </div> 
                                                <div class="form-group row address-holder"> 
                                                    <div class="col-sm-12">
                                                            <input class="form-control numbersOnly" name="state_code" id="state_code" placeholder="state_code">
                                                    </div>
                                                    <p class="error state_code"></p> 
                                                </div>


                                                <div class="form-group row address-holder"> 
                                                    <div class="col-sm-12">
                                                            <input class="form-control" name="billing_contact_person" id="billing_contact_person" placeholder="Contact Person">
                                                    </div>
                                                    <p class="error billing_contact_person"></p> 
                                                </div>
                                                <div class="form-group row address-holder"> 
                                                    <div class="col-sm-12">
                                                            <input class="form-control numbersOnly" name="billing_phone_number" id="billing_phone_number" placeholder="Contact Person Number">
                                                    </div>
                                                    <p class="error billing_phone_number"></p> 
                                                </div> 

                                                

                                               
                                                
                                            </div>
                                            <div class="col-md-4"> 
                                                <h3><br></h3>

                                                <div class="form-group mb-0 pb-0 " >
                                                    <label for="fname" class="text-left control-label col-form-label" >Billing Date</label>
                                                    <input type="text" id="basic-datepicker" class="form-control delivery_date" name="delivery_from_date" placeholder="Delivery Date">
                                                    <p class="error delivery_date_form"></p>
                                                </div> 
                                                <div class="form-group mb-0 pb-0" >
                                                    <label for="fname" class="text-left control-label col-form-label" >Due Date</label>
                                                    <input type="text" id="basic-datepicker2" class="form-control delivery_date" name="delivery_due_date" placeholder="Delivery Date">
                                                    <p class="error delivery_date_to"></p>
                                                </div>

                                                 <div class="form-group mb-0  ">
                                                    <label for="fname" class="text-left control-label col-form-label">Billing Status </label>

                                                    <select class="form-control" name="billing_status" id="billing_status"> 
                                                        <option value="">Select</option>
                                                        <option value="Approved">Approved</option> 
                                                        <option value="Paid">Paid</option> 
                                                        <option value="Pending">Pending</option> 
                                                    </select>
                                                    <p class="error billing_status"></p>
                                                </div>  

                                                 <div class="form-group mb-0 pb-0" >
                                                    <label for="fname" class="text-left control-label col-form-label" >Today Date</label>
                                                    <input type="text" id="basic-datepicker5" class="form-control today-date" name="billed_date" placeholder="today date" disabled>
                                                    <p class="error billed_date"></p>
                                                </div>
                                            </div>

                                            <div class="col-md-4"> 
                                                <h3><br></h3>

                                                    

                                                <div class="form-group mb-0 pb-0 " >
                                                    <label for="fname" class="text-left control-label col-form-label" >PO/P.C.D/ DC REF</label>
                                                    <input class="form-control" name="po_pcd_ref" id="po_pcd_ref" placeholder="PO/P.C.D/ DC REF">
                                                    <p class="error po_pcd_ref"></p>
                                                </div> 

                                                <div class="form-group mb-0">
                                                    <label for="fname" class="text-left control-label col-form-label">PO/P.C.D/ DC REF Date</label>
                                                    <input type="text" id="basic-datepicker3" class="form-control" name="po_pcd_date" placeholder="PO/P.C.D/ DC REF Date">
                                                    <p class="error po_pcd_date"></p>
                                                </div> 

                                                <div class="form-group mb-0 pb-0 " >
                                                    <label for="fname" class="text-left control-label col-form-label" >Cust. D.C.REF / NO </label>
                                                    <input class="form-control" name="dc_ref" id="dc_ref" placeholder="Cust. D.C.REF / NO">
                                                    <p class="error dc_ref"></p>
                                                </div> 

                                                <div class="form-group mb-0">
                                                    <label for="fname" class="text-left control-label col-form-label">Cust. D.C.REF / NO Date</label>
                                                    <input type="text" id="basic-datepicker4" class="form-control" name="dc_date" placeholder="Cust. D.C.REF / NO Date">
                                                    <p class="error dc_date"></p>
                                                </div> 

                                            </div>

                                            <div class="col-md-12"> 
                                                <h3>Billing Items Information</h3> 


                                                <div class="row">  

                                                    <div class="col-4">
                                                    <div class="form-group mb-0 ">
                                                        <label for="fname" class="text-left control-label col-form-label">HSNNO </label>

                                                        <select class="form-control" name="hsnno" id="hsnno"> 
                                                            <option value="">Select</option> 
                                                            <?php
                                                            foreach($hsnno as $values)
                                                            {
                                                                 echo "<option value=".$values['hsnno'].">".$values['hsnno']."</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                        <p class="error hsnno"></p>
                                                    </div> 

                                                     <div class="form-group mb-0">
                                                            <label for="fname" class="text-left control-label col-form-label">Price</label>
                                                            <input class="form-control numbersOnly" name="price" id="price" placeholder="Price">
                                                            <p class="error price"></p>
                                                        </div>
                                                    </div>
                                        
                                                <div class="col-sm-4"> 

                                                    <div class="form-group mb-0  ">
                                                            <label for="fname" class="text-left control-label col-form-label">Quantity</label>
                                                            <input class="form-control numbersOnly" name="quantity" id="quantity" placeholder="Quantity">
                                                            <p class="error quantity"></p>
                                                        </div> 

                                                      <div class="form-group mb-0 ">
                                                            <label for="fname" class="text-left control-label col-form-label">Discount</label>
                                                            <input class="form-control" type="hidden" name="discount" id="invoice_items_id" value="0">
                                                            <input class="form-control numbersOnly" name="discount" id="discount" placeholder="Discount">
                                                            <p class="error discount"></p>
                                                        </div> 

                                                </div>

                                                <div class="col-sm-4"> 

                                                    <div class="form-group mb-0">
                                                        <label for="fname" class=" text-left control-label col-form-label">Description</label>
                                                        <div class="col-sm-12">
                                                            <textarea type="text" class="form-control" id="description" rows="4" name="description" placeholder="Description"></textarea>
                                                        </div>
                                                        <p class="error description"></p> 
                                                    </div>  

                                                 </div>

                                                <div class=" ">
                                                     <div class="card-body" style="float:right;">
                                                <button type="button" class="btn btn-primary" id="additembtn">Add Item</button>
                                                
                                            </div>
                                        </div>


                                           


                                            <div class="col-12">
                                                <h3>Billing Table</h3>
                                                <table class="table table-bordered table-centered mb-0 w-100">
                                                    <thead class="thead-light">
                                                        <tr> 
                                                            <th style="width: 20%">Description</th>
                                                            <th style="width: 10%">HSN No</th>
                                                            <th style="width: 10%">Price</th>
                                                            <th style="width: 10%">Quantity</th>
                                                            <th style="width: 10%">Discount</th>
                                                            <!-- <th style="width: 10%">Tax</th> -->
                                                            <th style="width: 10%">Sub Total</th>
                                                            <th style="width: 10%">Remove</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="rows-list">
                                                        <tr > 
                                                            <td class="description_data"> </td>
                                                            <td class="hsnno_data p-0 m-0"></td> 
                                                            <td class="price_data p-0 m-0"></td> 
                                                            <td class="quantity_data p-0 m-0"></td>
                                                            <td class="discount_data p-0 m-0"></td>  
                                                            <!-- <td class="tax_type_data p-0 m-0"></td>  -->
                                                            <td class="subtotal_value_data p-0 m-0"></td> 
                                                            <td class="item_remove_data p-0 m-0"></td>  

                                                        </tr>
                                                    </tbody>
                                                    <tfoot class="appendproductfooter" style="display: none;">
                                            
                                            <tr>
                                                <td scope="row" colspan="5" style="border:none" class="text-right"></td>
                                                <th scope="row" class="text-right" style="background: #f3f7f9;"> Sub Total  </th>
                                                <td style="background: #f3f7f9;" colspan="2"><div class="col-sm-12 font-weight-bold">
                                                    <input class="form-control" id="main_total" name="main_total" readonly style="border:none;background:#f3f7f9;">
                                                </div>
                                            </td>
                                            <tr>
                                                <td scope="row" colspan="5" style="border:none" class="text-right"></td>
                                                <th scope="row" class="text-right" style="background: #f3f7f9;"> SGST value  </th>
                                                <td style="background: #f3f7f9;" colspan="2"><div class="col-sm-12 font-weight-bold">
                                                    <input class="form-control" id="sgst_value" name="sgst_value" readonly style="border:none;background:#f3f7f9;">
                                                </div>
                                            </td>
                                            <tr>
                                                <td scope="row" colspan="5" style="border:none" class="text-right"></td>
                                                <th scope="row" class="text-right" style="background: #f3f7f9;"> GST value </th>
                                                <td style="background: #f3f7f9;" colspan="2"><div class="col-sm-12 font-weight-bold">
                                                    <input class="form-control" id="gst_value" name="gst_value" readonly style="border:none;background:#f3f7f9;" >
                                                </div>
                                            </td>

                                            <tr>
                                                <td scope="row" colspan="5" style="border:none" class="text-right"></td>
                                                <th scope="row" class="text-right" style="background: #f3f7f9;"> Total Amount </th>
                                                <td style="background: #f3f7f9;" colspan="2"><div class="col-sm-12 font-weight-bold">
                                                    <input class="form-control" id="order_total" name="order_total" readonly style="border:none;background:#f3f7f9;">
                                                </div>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    <div class="col-sm-12">
                                        <div class="border-top">
                                            <div class="card-body" style="float:right; display: inline-flex;">
                                                <p class="error common_error_fn mr-4" ></p>
                                                <a href="<?php echo base_url();?>AdminController/yall_rewards">
                                                    <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Close</button>
                                                </a>

                                                <button type="button" class="btn btn-primary" id="submit_fynl_order">Update</button>
                                            </div>
                                        </div>
                                    </div>

                                    

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
                        <script src="<?php echo base_url();?>custom/edit_invoice.js"></script>
                        <script type="text/javascript">
                function myFunction(argument)
                {
                alert(argument);
                }
                 
                $('#user_unique_id').selectize();
                </script>
                    </body>
                </html>