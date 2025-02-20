$(document).ready(function() {

    var CustomerListJSON, user_id, mode;
    $.when(getCustomerList()).done(function() {
        dispCustomerList(CustomerListJSON);
    });

    function getCustomerList() {
        return $.ajax({
            url: base_URL + '/AdminController/getCustomerList',
            type: 'POST',
            success: function(data) {
                //console.log(data);
                CustomerListJSON = $.parseJSON(data);

            },
            error: function() {
                console.log("Error");
                //alert('something bad happened'); 
            }
        });
    }


    function dispCustomerList(JSON) {
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
                    "mDataProp": "user_name"
                },
                {
                    "mDataProp": "address"
                },
                {
                    "mDataProp": "gst"
                },
                {
                    "mDataProp": "phonenumber"
                },
                {
                    "mDataProp": "contactperson"
                },
                {
                    "mDataProp": function(data, type, full, meta) {
                        
                            return data.state+' / '+ data.state_code;
                        }
                },
                {
                    "mDataProp": "total_amount"
                },
                {
                    "mDataProp": "payed_amount"
                },
                {
                    "mDataProp": "balance_amount"
                },

                {
                    "mDataProp": function(data, type, full, meta) {
                        
                            return '<a id="' + meta.row + '" class="btn BtnEdit" style="padding:0px;" role="button" data-toggle="tooltip" data-placement="top" title="Click to edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;' +
                                '<a id="' + meta.row + '" class="btn BtnDelete" style="padding:0px;" role="button" data-toggle="tooltip" data-placement="top" title="Click to delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>';
                    }
                },
            ]
        });
    }

    $('#New_Category').click(function() {
        mode = "new";
        $('#largeModal').modal('show');
    });

    $(document).on('click', '.BtnEdit', function() {
        mode = "update";
        var r_index = $(this).attr('id');
        user_id = CustomerListJSON[r_index].user_id;
        $('#largeModal').modal('show');
        $('#user_name').val(CustomerListJSON[r_index].user_name);
        $('#address').val(CustomerListJSON[r_index].address);
        $('#gst').val(CustomerListJSON[r_index].gst);
        $('#phonenumber').val(CustomerListJSON[r_index].phonenumber);
        $('#contactperson').val(CustomerListJSON[r_index].contactperson);
        $('#state').val(CustomerListJSON[r_index].state);
        $('#state_code').val(CustomerListJSON[r_index].state_code);
    });

    $(document).on('click', '.BtnDelete', function() {
        mode = "delete";
        var r_index = $(this).attr('id');
        user_id = CustomerListJSON[r_index].user_id;
        $.confirm({
            icon: 'icon-close',
            title: 'Info',
            content: 'Are you Sure Do you want to Delete this Data',
            type: 'blue',
            buttons: {
                Yes: function() {
                    request = $.ajax({
                        type: "POST",
                        url: base_URL + 'AdminController/DeleteCustomerList',
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
        user_id = CustomerListJSON[r_index].user_id;
        var flag = 0;

        $.confirm({
            icon: 'icon-close',
            title: 'Info',
            content: 'Are you Sure Do you want to Deactivate this Data',
            type: 'blue',
            buttons: {
                Yes: function() {
                	RestoreCustomerList(user_id,flag);
                },
                No: function() {},
            }
        });

    });


    $(document).on('click', '.BtnRestore', function() {
        mode = "restore";
        var r_index = $(this).attr('id');
        user_id = CustomerListJSON[r_index].user_id;
        var flag = 1;

        $.confirm({
            icon: 'icon-close',
            title: 'Info',
            content: 'Are you Sure Do you want to Activate this Data',
            type: 'blue',
            buttons: {
                Yes: function() {
                	RestoreCustomerList(user_id,flag);
                },
                No: function() {},
            }
        });

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


    $('#CustomerList_Button').click(function() {
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
                saveCustomerList();
            } else {
                updateCustomerList();
            }

        }
    });

    function saveCustomerList() {
        var form = $('#CustomerList_Form')[0];
        var data = new FormData(form);
        request = $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: base_URL + 'AdminController/insertCustomerList',
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
        $.when(getCustomerList()).done(function() {
            var table = $('#Main_Category').DataTable();
            table.destroy();
            dispCustomerList(CustomerListJSON);
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