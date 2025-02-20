$(document).ready(function() {

    var CustomerDetailsJSON, user_id, mode;
    $.when(getCurCustomerDetails()).done(function() {
        dispCustomerList(CustomerDetailsJSON);
    }); 

    // getCurCustomerDetails();

    function getCurCustomerDetails() { 
        user_id = window.location.pathname.split("/").pop(); 
        return $.ajax({
            url: base_URL + '/AdminController/getCurCustomerDetails',
            type: 'POST',
            data: {"user_id":user_id},
            success: function(data) { 
                CustomerDetailsJSON = $.parseJSON(data);
            },
            error: function() {
                console.log("Error"); 
            }
        });
    }

    $(document).on('keypress blur', '.numbersOnly', function() {
        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });

    function dispCustomerList(JSON) {
         $('.company').html("<span>Customer Name : </span>"+JSON[0]['user_name']);
         $('.number').html("<span>Phone Number : </span>"+JSON[0]['phonenumber']);
         $('.contactperson').html("<span>Contact Person : </span>"+JSON[0]['contactperson']);
         $('.gst').html("<span>GST NO : </span>"+JSON[0]['gst']);
         $('.address').html("<span>Address : </span>"+JSON[0]['address']);
         var text = '';
         var overall_total_amount = 0;
         var overall_balance_amount = 0;
         var overall_payed_amount = 0;
         $('#all_invoice_details').html('');
         for(var i = 0; i < JSON[0]['invoice'].length; i++)
         {
            overall_total_amount += parseFloat(JSON[0]['invoice'][i]['total_amount']);
            overall_balance_amount += parseFloat(JSON[0]['invoice'][i]['balance_amount']) ;
            overall_payed_amount += parseFloat(JSON[0]['invoice'][i]['payed_amount']);
            text += '<div class="col-md-3">'+
                        '<div class="invoice_details">'+
                            '<p class="invoice_id"><span>Invoice No : </span>'+JSON[0]['invoice'][i]['tat_inv_no']+'</p>'+
                            '<p class="total_amount"><span>Total Amount :</span>'+JSON[0]['invoice'][i]['total_amount']+'</p>'+
                            '<p class="payed_amount"><span>Payed Amount :</span>'+JSON[0]['invoice'][i]['payed_amount']+'</p>'+
                            '<p class="balance_amount"><span>Balance Amount :</span>'+JSON[0]['invoice'][i]['balance_amount']+'</p>'+
                            '<p class="invoice_status"><span>Invoice Status :</span>'+JSON[0]['invoice'][i]['payment_status']+'</p>'+
                        '</div>'+
                    '</div>';
         }
         $('#all_invoice_details').append(text);
         $('.overall_total_amount').html("<span>Overall Total Amount : </span>"+overall_total_amount.toFixed(2));
         $('.overall_balance_amount').html("<span>Overall Balance Amount : </span>"+overall_balance_amount.toFixed(2));
         $('.overall_payed_amount').html("<span>Overall Payed Amount : </span>"+overall_payed_amount.toFixed(2));

         if(overall_balance_amount == 0){
            $('#Formdata_details_holder').hide();
         }
         else{
            $('#Formdata_details_holder').show();
         }
    }

    $('#New_Category').click(function() {
        mode = "new";
        $('#largeModal').modal('show');
    });

    $(document).on('click', '.BtnEdit', function() {
        mode = "update";
        var r_index = $(this).attr('id');
        user_id = CustomerDetailsJSON[r_index].user_id;
        $('#largeModal').modal('show');
        $('#user_name').val(CustomerDetailsJSON[r_index].user_name);
        $('#address').val(CustomerDetailsJSON[r_index].address);
        $('#gst').val(CustomerDetailsJSON[r_index].gst);
        $('#phonenumber').val(CustomerDetailsJSON[r_index].phonenumber);
        $('#contactperson').val(CustomerDetailsJSON[r_index].contactperson);
        $('#state').val(CustomerDetailsJSON[r_index].state);
        $('#state_code').val(CustomerDetailsJSON[r_index].state_code);
    });

    


    function RestoreCustomerList(user_id,flag)
    {
        var user_id = user_id;
        var flag = flag;
        request = $.ajax({
            type: "POST",
            url: base_URL + 'AdminController/RestoreCustomerList',
            data: {
                "user_id": user_id,"flag":flag
            },
        });
        request.done(function(response) {
            var js = $.parseJSON(response);
            var status = js.result
            if (status == "success") {
                $.confirm({
                    icon: 'icon-close',
                    title: 'Info',
                    content: 'Updated Succesfully',
                    type: 'green',
                    buttons: {
                        Ok: function() {},
                    }
                });
                refreshDetails();
            } else {
                $.toast({
                    heading: 'Error',
                    text: 'Sorry Something went worng please try again',
                    showHideTransition: 'fade',
                    icon: 'error'
                });
            }
        });
    }


    $('#invoice_payement_btn').click(function() {
        $('.error').hide(); 
        if ($('#amount').val() == "") {
            $('.amount').html("* Please Fill Amount");
            $('.amount').show();
        } 
        else if ($('#amount_type').val() == "") {
            $('.amount_type').html("* Please Fill Amount Type ");
            $('.amount_type').show();
        } 
        else 
        { 
            updatePayment(); 
        }
    });

    function updatePayment() {
        var form = $('#Formdata_details')[0];
        var data = new FormData(form);
        data.append("user_id",user_id);
        request = $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: base_URL + 'AdminController/updateInvoicePayment',
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
        });
        request.done(function(response) {
            var js = $.parseJSON(response);
            var status = js.result;
            console.log(status);
            if (status == "success") {
                $.confirm({
                    icon: 'icon-close',
                    title: 'Info',
                    content: 'Inserted Sucessfully',
                    type: 'green',
                    buttons: {
                        Ok: function() {},
                    }
                });
                $('#largeModal').modal('hide');
                refreshDetails();
            } else {

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

    function refreshDetails() {
        $.when(getCurCustomerDetails()).done(function() {
            var table = $('#Main_Category').DataTable();
            table.destroy();
            dispCustomerList(CustomerDetailsJSON);
        });
    }

    function updateCustomerList() {
        var form = $('#CustomerList_Form')[0];
        var data = new FormData(form);
        data.append("user_id", user_id);
        request = $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: base_URL + 'AdminController/updateCustomerList',
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
        });
        request.done(function(response) {
            var js = $.parseJSON(response);
            var status = js.result;
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
                $('#largeModal').modal('hide');
                refreshDetails();
            } else {
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

    $('#largeModal').on('show.bs.modal', function() {
        $(".no").hide();
        $('#hide').attr('checked', false);
        $('#show').attr('checked', false);
        $(this).find('form').trigger('reset');
    });


    $(document)
        .ajaxStart(function() {
            $(".loading").show();
        })
        .ajaxStop(function() {
            $(".loading").hide();
        });

});