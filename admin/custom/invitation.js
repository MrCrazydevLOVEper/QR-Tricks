$(document).ready(function() {

    var HsnnoJSON, form_id, mode;
    $.when(getHsnno()).done(function() {
        dispHsnno(HsnnoJSON);
    });

    function getHsnno() {
        return $.ajax({
            url: base_URL + '/AdminController/getInvitation',
            type: 'POST',
            success: function(data) { 
                HsnnoJSON = $.parseJSON(data); 
            },
            error: function() {
                console.log("Error"); 
            }
        });
    }


    function dispHsnno(JSON) { 
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
                    "mDataProp": "inv_name"
                },
                {
                    "mDataProp": function(data, type, full, meta) {
                        if(data.inv_type == "wedding") return `<span class="btn btn-sm btn-warning">Wedding</span>`;
                        else return `<span class="btn btn-sm btn-info">Business</span>`;
                    }
                },    
                {
                    "mDataProp": function(data, type, full, meta) {
                        if(data.inv_img) return `<img style="width:100px;" src="${base_URL + data.inv_img}">`;
                        else return '-';
                    }
                },
                {
                    "mDataProp": "inv_user_price"
                },  
                {
                    "mDataProp": "inv_vendor_price"
                }, 
				{ 
					"mDataProp": function ( data, type, full, meta) { 
						return '<a id="'+ meta.row +'" class="btn BtnEdit" style="padding:0px;" role="button" data-toggle="tooltip" data-placement="top" title="Click to edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;'+
							   '<a id="'+ meta.row +'" class="btn BtnDelete" style="padding:0px;" role="button" data-toggle="tooltip" data-placement="top" title="Click to delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>';
						
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
        form_id = HsnnoJSON[r_index].form_id;
        $('#largeModal').modal('show');
        $('#inv_user_price').val(HsnnoJSON[r_index].inv_user_price); 
        $('#inv_vendor_price').val(HsnnoJSON[r_index].inv_vendor_price); 
    });

    $(document).on('click', '.BtnDelete', function() {
        mode = "delete";
        var r_index = $(this).attr('id');
        form_id = HsnnoJSON[r_index].form_id;
        $.confirm({
            icon: 'icon-close',
            title: 'Info',
            content: 'Are you Sure Do you want to Delete this Data',
            type: 'blue',
            buttons: {
                Yes: function() {
                    request = $.ajax({
                        type: "POST",
                        url: base_URL + 'AdminController/DeleteInvitationForm',
                        data: {
                            "form_id": form_id
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
        form_id = HsnnoJSON[r_index].form_id;
        var flag = 0;

        $.confirm({
            icon: 'icon-close',
            title: 'Info',
            content: 'Are you Sure Do you want to Deactivate this Data',
            type: 'blue',
            buttons: {
                Yes: function() {
                	RestoreHsnno(form_id,flag);
                },
                No: function() {},
            }
        });

    });


    $(document).on('click', '.BtnRestore', function() {
        mode = "restore";
        var r_index = $(this).attr('id');
        form_id = HsnnoJSON[r_index].form_id;
        var flag = 1;

        $.confirm({
            icon: 'icon-close',
            title: 'Info',
            content: 'Are you Sure Do you want to Activate this Data',
            type: 'blue',
            buttons: {
                Yes: function() {
                	RestoreHsnno(form_id,flag);
                },
                No: function() {},
            }
        });

    });


    function RestoreHsnno(form_id,flag)
    {
    	var form_id = form_id;
    	var flag = flag;
        request = $.ajax({
            type: "POST",
            url: base_URL + 'AdminController/RestoreHsnno',
            data: {
                "form_id": form_id,"flag":flag
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


    $('#Hsnno_Button').click(function() {
        $('.error').hide(); 
        if ($('#inv_user_price').val() == "") {
            $('.inv_user_price').html("* Please Fill User Price");
            $('.inv_user_price').show();
        }  
        else if ($('#inv_vendor_price').val() == "") {
            $('.inv_vendor_price').html("* Please Fill Vendor Price");
            $('.inv_vendor_price').show();
        }  
        else 
        {
            updateInvitationPrice();
        }
    });
 

    function refreshDetails() {
        $.when(getHsnno()).done(function() {
            var table = $('#Main_Category').DataTable();
            table.destroy();
            dispHsnno(HsnnoJSON);
        });
    }

    function updateInvitationPrice() {
        var form = $('#Hsnno_Form')[0];
        var data = new FormData(form);
        data.append("form_id", form_id);
        request = $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: base_URL + 'AdminController/updateInvitationPrice',
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