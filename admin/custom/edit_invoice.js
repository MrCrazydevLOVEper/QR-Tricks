$(document).ready(function() {

    var ourinfoJSON,Addressjson,state_code_id, getCustomerListJSON,taxlistJSON,company_info_id,mode,gst_percentage,sgst_percentage, main_total, gst_value, sgst_value,address_log;
    var invoice_data = [];
    var invoice = [];
    var categoryDropDown  = '';
    var removed_data = [];
    var t = $("tbody#rows-list tr:first-child").html();
    gettax();

    $(document).on('keypress blur', '.numbersOnly', function() {
        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });

    //common function
    $.when(getinvoicedetailsforedit()).done(function()
    {   
            // console.log(orderJSON['invoice'][0]);
            invoice_data=orderJSON['items'];
            // appendproducts();

            invoice = orderJSON['invoice'][0];
            getuserinfo(invoice['user_id']);
            address_log = invoice['address_log'];  

            //adress
            $('#address').val(invoice['billing_address']);
            $('#state').val(invoice['billing_state']);
            $('#state_code').val(invoice['billing_state_code']);
            $('#billing_contact_person').val(invoice['billing_contact_person']);
            $('#billing_phone_number').val(invoice['billing_phone_number']);

            //billing data
            $('#basic-datepicker').val(invoice['billing_date']);
            $('#basic-datepicker2').val(invoice['billing_due_date']);
            $('#billing_status').val(invoice['billing_status']);
            $('#basic-datepicker5').val(invoice['billed_date']);
            $('#po_pcd_ref').val(invoice['po_pcd_ref']);
            $('#basic-datepicker3').val(invoice['po_pcd_date']);
            $('#dc_ref').val(invoice['dc_ref']);
            $('#basic-datepicker4').val(invoice['dc_date']);


    });


    function getuserinfo(id)
    {
        return $.ajax({
            url: base_URL+'AdminController/getCustomerList',
            type:'POST',
            success:function(data)
            {
                getCustomerListJSON = $.parseJSON(data); 
                var $select = $(document.getElementById('user_unique_id')).selectize(getCustomerListJSON);
                var selectize = $select[0].selectize;
                selectize.setValue(id);   
            },      
            error: function() {
                console.log("Error"); 
            }
        }) ;
    }

    function getinvoicedetailsforedit()
    {
        var lastSegment = $('#get_invoice_id').val();
        return $.ajax({
            url: base_URL+'AdminController/getinvoicedetailsforedit',
            type:'POST',
            data: {
                "orderno":lastSegment,
            },
            success:function(data){
                orderJSON = $.parseJSON(data);
            },      
            error: function() {
                console.log("Error"); 
            }
        }) ;
    } 

 

    var date = new Date('2011', '01', '02');
    var newdate = new Date(date);
    newdate.setDate(newdate.getDate() - 90);
    var nd = new Date(newdate);

    // console.log()

    $(document).on('change', "#basic-datepicker", function() 
    { 
        var billing_date = $(this).val();

        var date = new Date(billing_date);
        var newdate = new Date(date);
        newdate.setDate(newdate.getDate() + 30);
        var nd = new Date(newdate);

        // var billing_due_date =  billing_date ;

        var formattedDate = new Date(nd);
        var d = (formattedDate.getDate() < 10 ? '0' : '') + formattedDate.getDate();
        var m = ((formattedDate.getMonth() + 1) < 10 ? '0' : '') +  formattedDate.getMonth();
        var month = parseInt(m) + 1;
        var y = formattedDate.getFullYear();

        $("#basic-datepicker2").val( y + "-" + month + "-" + d); 

        // console.log(nd);

         
    });


    function gettax(){
        return $.ajax({
            url: base_URL+'AdminController/gettax',
            type:'POST',
            success:function(data)
            { 
                taxlistJSON = $.parseJSON(data);  
                gst_percentage = taxlistJSON[0]['gst'];
                sgst_percentage = taxlistJSON[0]['sgst'];   

            },      
            error: function() {
                console.log("Error"); 
            }
        }) ;
    }


    $.when(getourinfodetails()).done(function()
    {
        company_info_id = ourinfoJSON[0]["company_info_id"]; 
    });
    
    function getourinfodetails()
    {
        return $.ajax({
            url: base_URL+'AdminController/getourinfodetails',
            type:'POST',
            success:function(data)
            {
                ourinfoJSON = $.parseJSON(data);    
            },      
            error: function() {
                console.log("Error"); 
            }
        }) ;
    }

    $(document).on('change', "#user_unique_id", function() 
        { 
            var user_unique_id = $(this).val();

            if (user_unique_id!='') 
            {
                return $.ajax({
                    url: base_URL+'AdminController/getuseraddressdetails',
                    type:'POST',
                    data: {"user_unique_id":user_unique_id},
                    success:function(data){
                        Addressjson = $.parseJSON(data);  
                        state_code_id = Addressjson[0]['state_code'];
                         appendproducts();
                        yb_user_address=[]; 
                        if (Addressjson.length>0) 
                        { 
                            yb_user_address.push(Addressjson[0]); 
                        }                            
                        append_address_function(); 
                    },      
                    error: function() {
                        console.log("Error");  
                    }
                }) ;
            }
        });

    $(document).on('change', "#state_code", function() 
    { 
         appendproducts();
    });



    function append_address_function() 
        {
            $('.display_address_info').html('');
            if (Addressjson.length>0) 
            {                
                if(address_log == 'true'){
                    $('.display_address_info').append('<label for="fname" class="col-12 text-left control-label col-form-label" >Customer Address</label><br>'+
                    '<div class="col-12 ml-3"> <p class="p-0 m-0"><b>'+yb_user_address[0]["address"]+'</b></p></div>'+
                    '<div class="col-12" style="margin-top: 15px;"> '+
                    '<a class="BtnEdit" style="padding:0px; color:#5600ff" role="button" > <input type="checkbox" style="height: 20px;width: 23px" id="check_id" name="billing_ckeck" checked>'+
                    ' <span style="font-size:18px;">Same us Billing Address</span>  </a></div>');
                    $('.user_unique_id_address').hide(); 
                     $('.address-holder').hide();
                }
                if(address_log == 'false'){
                    $('.display_address_info').append('<label for="fname" class="col-12 text-left control-label col-form-label" >Customer Address</label><br>'+
                    '<div class="col-12 ml-3"> <p class="p-0 m-0"><b>'+yb_user_address[0]["address"]+'</b></p></div>'+
                    '<div class="col-12" style="margin-top: 15px;"> '+
                    '<a class="BtnEdit" style="padding:0px; color:#5600ff" role="button" > <input type="checkbox" style="height: 20px;width: 23px" id="check_id" name="billing_ckeck">'+
                    ' <span style="font-size:18px;">Same us Billing Address</span>  </a></div>');
                    $('.user_unique_id_address').hide();
                     $('.address-holder').show();
                }
            }                                  
            else
            {
                $('.display_address_info').append('<p class="error_custom user_unique_id_address">* Please Add the address to continue next</p>');
                $('.user_unique_id_address').show();
            } 
        }

     

    $(document).on('click', ".BtnEdit", function() 
        {
            appendproducts();

            if ($('#check_id').is(":checked") == true) {
                $('.address-holder').hide();
            }
            else{
                $('.address-holder').show();
            }
             // $('.address-holder').show();
             // $('.display_address_info').hide();
        });

    // $(document).on('click', ".get-primary-address", function() 
    //     {
    //          $('.address-holder').hide();
    //          $('#address').val('');
    //          $('.display_address_info').show();
    //     });
    
    $('#additembtn').click(function(){
        $('.error').hide();

        if($('#hsnno').val()=="")
        {
            $('.hsnno').html("Please fill hsnno");
            $('.hsnno').show();
        }
        else if($('#price').val()=="")
        {
            $('.price').html("Please fill price");
            $('.price').show();
        }
        else if($('#quantity').val()=="")
        {
            $('.quantity').html("Please fill quantity");
            $('.quantity').show();
        } 
        else if($('#discount').val()=="")
        {
            $('.discount').html("Please fill discount");
            $('.discount').show();
        }
        else if($('#description').val()=="")
        {
            $('.description').html("Please fill description");
            $('.description').show();
        }       

        else
        {   
            var prod_add_array = 
            [
                {
                     "hsnno" : ""+$('#hsnno').val()+"",
                     "price" : ""+$('#price').val()+"",
                     "discount" : ""+$('#discount').val()+"",
                     "description" : ""+$('#description').val()+"", 
                     "invoice_items_id" : ""+$('#invoice_items_id').val()+"", 
                     "quantity" : ""+$('#quantity').val()+""
                }
            ]; 
            invoice_data.push(prod_add_array[0]);     
            appendproducts();
            $('#hsnno').val('');     
            $('#price').val('');        
            $('#discount').val('');     
            $('#description').val('');     
            $('#quantity').val('');    
        }       
    });

    function appendproducts(){
        $('tbody#rows-list').html('');
        $('.appendproductfooter').show();  

        main_total = 0;
        // console.log(invoice_data.length);
        for (var i = 0; i < invoice_data.length; i++) 
        { 

            var description = invoice_data[i]['description'];

            var hsnno = invoice_data[i]['hsnno'];
            var price = parseFloat(invoice_data[i]['price']).toFixed(2); 
            var quantity = parseInt(invoice_data[i]['quantity']);
            var discount = parseFloat(invoice_data[i]['discount']).toFixed(2); 

            $("tbody#rows-list").append("<tr>" + t + "</tr>");  
            var subtotal_value =  (quantity * price);
            main_total = main_total+subtotal_value;
            // console.log(   parseFloat(price + tax_value).toFixed(2) );  

            $('.description_data').last().append('<div class="col-sm-12">'+
           '<input class="form-control item_description" name="description_val[]" readonly style="border:none" value="'+description+'">'+
           '</div>');

           $('.hsnno_data').last().append('<div class="col-sm-12">'+
           '<input class="form-control item_hsnno" name="hsnno_val[]" readonly style="border:none" value="'+hsnno+'">'+
           '</div>'); 

           $('.price_data').last().append('<div class="col-sm-12">'+
           '<input class="form-control item_price" name="price_val[]" readonly style="border:none" value="'+price+'">'+
           '</div>'); 

            $('.quantity_data').last().append('<div class="col-sm-12">'+
           '<input class="form-control item_quantity" name="quantity_val[]" readonly style="border:none" value="'+quantity+'">'+
           '</div>'); 

            $('.discount_data').last().append('<div class="col-sm-12">'+
           '<input class="form-control item_discount" name="discount_val[]" readonly style="border:none" value="'+discount+'">'+
           '</div>');

            $('.subtotal_value_data').last().append('<div class="col-sm-12">'+
           '<input class="form-control item_subtotal_value" name="subtotal_val[]" readonly style="border:none" value="'+parseFloat(subtotal_value).toFixed(2)+'">'+
           '</div>'); 

            $('.item_remove_data').last().append('<div class="col-sm-12">'+
            '<span class="removeproducts" onclick=\'remove_products("'+i+'");\'><i class="fa fa-times-circle-o" aria-hidden="true"></i> remove</span> <br>'+
            '<span class="edit_products" onclick=\'edit_products("'+i+'");\'><i class="fa fa-edit" aria-hidden="true"></i> edit</span>'+
            '</div>'); 

            
        } 

            // set gst and sget value 
            gst_value = main_total * (parseFloat(gst_percentage).toFixed(2) / 100); 
            sgst_value = 0.00;


            // console.log(state_code_id);


            if($('#check_id').is(":checked") == true && state_code_id == 33 ){ 
                sgst_value = main_total * (parseFloat(sgst_percentage).toFixed(2) / 100);
            }

            if($('#check_id').is(":checked") == false && $('#state_code').val() == 33){ 
                sgst_value = main_total * (parseFloat(sgst_percentage).toFixed(2) / 100);
            }

            //set value in footer
            var final_total = main_total + sgst_value + gst_value; 

            $('#main_total').val(parseFloat(main_total).toFixed(2));
            $('#gst_value').val(parseFloat(gst_value).toFixed(2));
            $('#sgst_value').val(parseFloat(sgst_value).toFixed(2));
            $('#order_total').val(parseFloat(final_total).toFixed(2));
        
        


    }

    edit_products  = function(selected_index)
    {
        var invoice_item = invoice_data[selected_index];
        $('#hsnno').val(invoice_item['hsnno']);
        $('#price').val(invoice_item['price']);
        $('#quantity').val(invoice_item['quantity']);
        $('#invoice_items_id').val(invoice_item['invoice_items_id']);
        $('#discount').val(invoice_item['discount']);
        $('#description').val(invoice_item['description']); 
        for (var i = 0; i < invoice_data.length; i++) 
        {
            if (""+i+""==""+selected_index+"") 
            {
                invoice_data. splice(i, 1);
            }
        }
        var invoice_data_re = invoice_data.filter(function(){return true;});
        invoice_data=[];
        invoice_data=invoice_data_re; 
        appendproducts();
    }

    remove_products  = function(selected_index)
    {
        var invoice_item1 = invoice_data[selected_index];
        var id = invoice_item1['invoice_items_id'];
        removed_data.push(id);
        for (var i = 0; i < invoice_data.length; i++) 
        {
            if (""+i+""==""+selected_index+"") 
            {
                invoice_data. splice(i, 1);
            }
        }
        var invoice_data_re = invoice_data.filter(function(){return true;});
        invoice_data=[];
        invoice_data=invoice_data_re; 
        appendproducts();
    }

      $(document).on('click', "#submit_fynl_order", function() 
        {
            $('.error').hide();
            if($('#user_unique_id').val()=='')
            {
                $('.user_unique_id').html('* Select User to assign order')
                $('.user_unique_id').show();
            }

            else if($('#check_id').is(":checked") == false && $('#address').val()=='')
            {
                $('.address').html('* Select Please fill address')
                $('.address').show();
            }
            else if($('#check_id').is(":checked") == false && $('#state').val()=='')
            {
                $('.state').html('* Select Please fill state')
                $('.state').show();
            }
            else if($('#check_id').is(":checked") == false && $('#state_code').val()=='')
            {
                $('.state_code').html('* Select Please fill state code')
                $('.state_code').show();
            }

             else if($('#check_id').is(":checked") == false && $('#billing_contact_person').val()=='')
            {
                $('.billing_contact_person').html('* fill  billing contact person')
                $('.billing_contact_person').show();
            }
            else if($('#check_id').is(":checked") == false && $('#billing_phone_number').val()=='')
            {
                $('.billing_phone_number').html('* fill billing contact person number')
                $('.billing_phone_number').show();
            }
            else if($('#basic-datepicker').val()=='')
            {
                $('.delivery_date_form').html('* Select From  Date')
                $('.delivery_date_form').show();
            }
            else if($('#basic-datepicker2').val()=='')
            {
                $('.delivery_date_to').html('* Select To  Date')
                $('.delivery_date_to').show();
            }
            else if($('#billing_status').val()=='')
            {
                $('.billing_status').html('* Select  billing status')
                $('.billing_status').show();
            }

            else if($('#po_pcd_ref').val()=='')
            {
                $('.po_pcd_ref').html('* fill PO/P.C.D/ DC REF')
                $('.po_pcd_ref').show();
            }
            else if($('#po_pcd_date').val()=='')
            {
                $('.po_pcd_date').html('* fill PO/P.C.D/ DC REF Date')
                $('.po_pcd_date').show();
            }
            else if($('#dc_ref').val()=='')
            {
                $('.dc_ref').html('* fill Cust. D.C.REF / NO ')
                $('.dc_ref').show();
            }
            else if($('#po_pcd_date').val()=='')
            {
                $('.po_pcd_date').html('* fill Cust. D.C.REF / NO Date ')
                $('.po_pcd_date').show();
            } 

            else if(invoice_data.length == 0)
            {
                alert('Please add items information');
            } 

            else
            {
                return $.ajax({
                    url: base_URL+'AdminController/EditInvoiceData',
                    type:'POST',
                    data: {
                            "invoice_data":invoice_data,  
                            "user_unique_id":$('#user_unique_id').val(), 
                            "billing_date":$('#basic-datepicker').val(), 
                            "billing_due_date":$('#basic-datepicker2').val(), 
                            "billing_status":$('#billing_status').val(), 
                            "address":$('#address').val(),
                            "state":$('#state').val(),
                            "state_code":$('#state_code').val(),
                            "main_total":$('#main_total').val(),
                            "sgst_value":$('#sgst_value').val(),
                            "gst_value":$('#gst_value').val(),
                            "order_total":$('#order_total').val(),
                            "address_log":$('#check_id').is(":checked"),
                            "billing_contact_person":$('#billing_contact_person').val(),
                            "billing_phone_number":$('#billing_phone_number').val(),
                            "billed_date":$('#basic-datepicker5').val(),
                            "po_pcd_ref":$('#po_pcd_ref').val(),
                            "po_pcd_date":$('#basic-datepicker3').val(),
                            "dc_ref":$('#dc_ref').val(),
                            "dc_date":$('#basic-datepicker4').val(), 
                            "invoice_id":$('#get_invoice_id').val(), 
                            "removed_data":removed_data, 
                          },
                    success:function(data)
                    {       
                        var js = $.parseJSON(data);
                        var status = js.status;
                        var message = js.msg;

                        if (status == "success") {
                            $.confirm({
                                icon: 'icon-close',
                                title: 'Info',
                                content: ''+message+'',
                                type: 'green',
                                buttons: {
                                    Ok: function() {
                                        location.reload();
                                    },
                                }
                            });
                        } 
                        else if (status == "fail") {

                            $.confirm({
                                icon: 'icon-close',
                                title: 'Info',
                                content: ''+message+'',
                                type: 'red',
                                buttons: {
                                    Ok: function() {},
                                }
                            });
                        } 

                    },      
                    error: function() {
                        console.log("Error"); 
                        //alert('something bad happened'); 
                    }
                }) ;
            }
        });


    
    function updateourinfovalue()
    {       
        var form = $('#Formdata_details')[0];
        var data = new FormData(form);
        data.append("company_info_id", company_info_id);
        request = $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: base_URL+'AdminController/updateourinfovalues',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
        }); 
        request.done(function (response){
            var js = $.parseJSON(response);
            var status = js.result
            if (status == "success") {
                $.confirm({
                    icon: 'icon-close',
                    title: 'Info',
                    content: 'Updated Sucessfully',
                    type: 'green',
                        buttons: {
                            Ok: function() {},
                        }
                });
            }
            else
            {
                $.confirm({
                    icon: 'icon-close',
                    title: 'Info',
                    content: 'Sorry Something went worng',
                    type: 'red',
                        buttons: {
                            Ok: function() {},
                        }
                });
            }       
        });     
    }


  $(document)
  .ajaxStart(function () {
    $(".loading").show();
  })
  .ajaxStop(function () {
    $(".loading").hide();
  });

});
