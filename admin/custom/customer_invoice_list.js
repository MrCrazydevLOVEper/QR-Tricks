$(document).ready(function() {

    var CustomerInvoiceListJSON, user_id, mode;
    $.when(getCustomerInvoiceList()).done(function() {
        dispCustomerInvoiceList(CustomerInvoiceListJSON);
    });

    function getCustomerInvoiceList() {
        return $.ajax({
            url: base_URL + '/AdminController/getCustomerInvoiceList',
            type: 'POST',
            success: function(data) {
                //console.log(data);
                CustomerInvoiceListJSON = $.parseJSON(data);

            },
            error: function() {
                console.log("Error");
                //alert('something bad happened'); 
            }
        });
    }

    $('#searchbtn_fltr').click(function() {
        $('.error').hide(); 
        var error_status = 1;

        if ( $('#user_unique_id').val() == "" && $('#basic-datepicker').val() == "" && $('#basic-datepicker2').val() == "" ) {
            $('.error_status').html("* Please Fill any value");
            $('.error_status').show();
        } 
        else 
        {
            CustomerInvoiceListFilter();
        }
    });


    function CustomerInvoiceListFilter(){
        var user_unique_id = $('#user_unique_id').val();
        var from_date = $('#basic-datepicker').val();
        var to_date = $('#basic-datepicker2').val();
        request = $.ajax({
            type: "POST",
            url: base_URL + 'AdminController/CustomerInvoiceListFilter',
            data: {
                "user_unique_id": user_unique_id,"from_date":from_date,"to_date":to_date
            },
        });
        request.done(function(data) {  
                CustomerInvoiceListJSON = $.parseJSON(data);
                var table = $('#Main_Category').DataTable();
                table.destroy();
                dispCustomerInvoiceList(CustomerInvoiceListJSON);
        });
    }


    function dispCustomerInvoiceList(JSON) {
        //$('#success_alert').show(1000);
        //console.log(dataJSON);
        var i =1;
        $('#Main_Category').dataTable({
            "aaSorting": [],
            "aaData": JSON,
            responsive: true,
            
            "aoColumns": [

					{
                    "mDataProp": function(data, type, full, meta) {
                            return i++;
                    }
                },
                {
                    "mDataProp": "tat_inv_no"
                },
                {
                    "mDataProp": "user_name"
                },
                {
                    "mDataProp": "total_amount"
                },
                {
                    // "mDataProp": "billing_status"
                    "mDataProp": function(data, type, full, meta) {
                        if(data.payment_status == 'partially'){
                            return '<span class="text text-warning">Partially Paid</span>' ; 
                        }

                        if(data.payment_status == 'paid'){
                            return '<span class="text text-success">Fully Paid</span>' ; 
                        }

                        if(data.payment_status == 'unpaid'){
                            return '<span class="text text-danger">Not Paid</span>' ; 
                        }
                        
                    }
                },
                {
                    "mDataProp": "billing_date"
                }, 
                {
                    "mDataProp": "billing_due_date"
                }, 
                {
                    "mDataProp": function(data, type, full, meta) {
                            return '<a id="' + meta.row + '" class="btn viewrecepit" style="padding:0px;" role="button" data-toggle="tooltip" data-placement="top" title="Click to edit"><i class="fa fa-print" aria-hidden="true"></i>&nbsp;  Print Invoice</a>&nbsp;&nbsp;';

                    }
                },

                {
                    "mDataProp": function(data, type, full, meta) {
                        
                            return '<a   class="btn" style="padding:0px;" role="button" data-toggle="tooltip" data-placement="top" href="'+base_URL+'AdminController/EditInvoice/'+data.invoice_id+'" title="Click to edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;' +
                                '<a id="' + meta.row + '" class="btn BtnDelete" style="padding:0px;" role="button" data-toggle="tooltip" data-placement="top" title="Click to delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>';
                    }
                },
            ]
        });
    }


    $(document).on('click','.viewrecepit',function()
    {
            var r_index = $(this).attr('id');
            order_id = CustomerInvoiceListJSON[r_index].invoice_id;
            return $.ajax({
            url: base_URL+'AdminController/viewrecepit1',
            type:'POST',
            data: {"order_id":order_id},
            success:function(data)
            {
            var js = $.parseJSON(data);
            //console.log(js);
            var status = js.result;
            if (status == "success") 
            {
                var strWindowFeatures = "location=yes,height=800,width=1200,scrollbars=yes,status=yes";
                var URL =  js.url;
                var win = window.open(URL, "_blank", strWindowFeatures); 
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

            },      
            error: function() {
                console.log("Error");  
            }
        }) ;

    });


    $('#New_Category').click(function() {
        mode = "new";
        $('#largeModal').modal('show');
    });

    $(document).on('click', '.BtnEdit', function() {
        mode = "update";
        var r_index = $(this).attr('id');
        user_id = CustomerInvoiceListJSON[r_index].user_id;
        $('#largeModal').modal('show');
        $('#user_name').val(CustomerInvoiceListJSON[r_index].user_name);
        $('#address').val(CustomerInvoiceListJSON[r_index].address);
        $('#gst').val(CustomerInvoiceListJSON[r_index].gst);
        $('#phonenumber').val(CustomerInvoiceListJSON[r_index].phonenumber);
        $('#contactperson').val(CustomerInvoiceListJSON[r_index].contactperson);
        $('#state').val(CustomerInvoiceListJSON[r_index].state);
        $('#state_code').val(CustomerInvoiceListJSON[r_index].state_code);
    });

    $(document).on('click', '.BtnDelete', function() {
        mode = "delete";
        var r_index = $(this).attr('id');
        user_id = CustomerInvoiceListJSON[r_index].user_id;
        $.confirm({
            icon: 'icon-close',
            title: 'Info',
            content: 'Are you Sure Do you want to Delete this Data',
            type: 'blue',
            buttons: {
                Yes: function() {
                    request = $.ajax({
                        type: "POST",
                        url: base_URL + 'AdminController/DeleteCustomerInvoiceList',
                        data: {
                            "user_id": user_id
                        },
                    });
                    request.done(function(response) {
                        var js = $.parseJSON(response);
                        var status = js.result
                        if (status == "success") {
                            $.confirm({
                                icon: 'icon-close',
                                title: 'Info',
                                content: 'Deleted Succesfully',
                                type: 'green',
                                buttons: {
                                    Ok: function() {},
                                }
                            });
                            refreshDetails();
                        } else {
                            $.confirm({
                                icon: 'icon-close',
                                title: 'Info',
                                content: 'Are you Sure Do you want to Delete this Data',
                                type: 'blue',
                                buttons: {
                                    No: function() {},
                                }
                            });
                        }

                    });
                },
                No: function() {},
            }
        });

    });

    $(document).on('click', '.Btnhidden', function() {
        mode = "restore";
        var r_index = $(this).attr('id');
        user_id = CustomerInvoiceListJSON[r_index].user_id;
        var flag = 0;

        $.confirm({
            icon: 'icon-close',
            title: 'Info',
            content: 'Are you Sure Do you want to Deactivate this Data',
            type: 'blue',
            buttons: {
                Yes: function() {
                	RestoreCustomerInvoiceList(user_id,flag);
                },
                No: function() {},
            }
        });

    });


    $(document).on('click', '.BtnRestore', function() {
        mode = "restore";
        var r_index = $(this).attr('id');
        user_id = CustomerInvoiceListJSON[r_index].user_id;
        var flag = 1;

        $.confirm({
            icon: 'icon-close',
            title: 'Info',
            content: 'Are you Sure Do you want to Activate this Data',
            type: 'blue',
            buttons: {
                Yes: function() {
                	RestoreCustomerInvoiceList(user_id,flag);
                },
                No: function() {},
            }
        });

    });


    function RestoreCustomerInvoiceList(user_id,flag)
    {
    	var user_id = user_id;
    	var flag = flag;
        request = $.ajax({
            type: "POST",
            url: base_URL + 'AdminController/RestoreCustomerInvoiceList',
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


    $('#CustomerInvoiceList_Button').click(function() {
        $('.error').hide();
        //console.log($('#url').val()); 
        if ($('#user_name').val() == "") {
            $('.user_name').html("* Please Fill Name");
            $('.user_name').show();
        } 
        else if ($('#gst').val() == "") {
            $('.gst').html("* Please Fill GST ");
            $('.gst').show();
        }
        else if ($('#phonenumber').val() == "") {
            $('.phonenumber').html("* Please Fill Phone number");
            $('.phonenumber').show();
        }
        else if ($('#contactperson').val() == "") {
            $('.contactperson').html("* Please Fill Contact person");
            $('.contactperson').show();
        }
        else if ($('#state').val() == "") {
            $('.state').html("* Please Fill State");
            $('.state').show();
        }
        else if ($('#state').val() == "") {
            $('.state').html("* Please Fill Sstate");
            $('.state').show();
        }
        else if ($('#area_name').val() == "") {
            $('.area_name').html("* Please Fill ");
            $('.area_name').show();
        }
        else 
        {
            if (mode == "new") {
                saveCustomerInvoiceList();
            } else {
                updateCustomerInvoiceList();
            }

        }
    });

    function saveCustomerInvoiceList() {
        var form = $('#CustomerInvoiceList_Form')[0];
        var data = new FormData(form);
        request = $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: base_URL + 'AdminController/insertCustomerInvoiceList',
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
        $.when(getCustomerInvoiceList()).done(function() {
            var table = $('#Main_Category').DataTable();
            table.destroy();
            dispCustomerInvoiceList(CustomerInvoiceListJSON);
        });
    }

    function updateCustomerInvoiceList() {
        var form = $('#CustomerInvoiceList_Form')[0];
        var data = new FormData(form);
        data.append("user_id", user_id);
        request = $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: base_URL + 'AdminController/updateCustomerInvoiceList',
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