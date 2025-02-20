$(document).ready(function() {

    var HsnnoJSON, gift_id, mode;
    $.when(getGift()).done(function() {
        dispHsnno(HsnnoJSON);
    });

    function getGift() {
        return $.ajax({
            url: base_URL + '/AdminController/getGift',
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
                    "mDataProp": "name"
                },   
                {
                    "mDataProp": function(data, type, full, meta) {
                        if(data.image) return `<img style="width:100px;" src="${base_URL + data.image}">`;
                        else return '-';
                    }
                },
                {
                    "mDataProp": "link"
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
        gift_id = HsnnoJSON[r_index].gift_id;
        $('#largeModal').modal('show');
        $('#name').val(HsnnoJSON[r_index].name); 
        $('#link').val(HsnnoJSON[r_index].link); 
    });

    $(document).on('click', '.BtnDelete', function() {
        mode = "delete";
        var r_index = $(this).attr('id');
        gift_id = HsnnoJSON[r_index].gift_id;
        $.confirm({
            icon: 'icon-close',
            title: 'Info',
            content: 'Are you Sure Do you want to Delete this Data',
            type: 'blue',
            buttons: {
                Yes: function() {
                    request = $.ajax({
                        type: "POST",
                        url: base_URL + 'AdminController/deleteGift',
                        data: {
                            "gift_id": gift_id
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
        gift_id = HsnnoJSON[r_index].gift_id;
        var flag = 0;

        $.confirm({
            icon: 'icon-close',
            title: 'Info',
            content: 'Are you Sure Do you want to Deactivate this Data',
            type: 'blue',
            buttons: {
                Yes: function() {
                	RestoreHsnno(gift_id,flag);
                },
                No: function() {},
            }
        });

    });


    $(document).on('click', '.BtnRestore', function() {
        mode = "restore";
        var r_index = $(this).attr('id');
        gift_id = HsnnoJSON[r_index].gift_id;
        var flag = 1;

        $.confirm({
            icon: 'icon-close',
            title: 'Info',
            content: 'Are you Sure Do you want to Activate this Data',
            type: 'blue',
            buttons: {
                Yes: function() {
                	RestoreHsnno(gift_id,flag);
                },
                No: function() {},
            }
        });

    });


    function RestoreHsnno(gift_id,flag)
    {
    	var gift_id = gift_id;
    	var flag = flag;
        request = $.ajax({
            type: "POST",
            url: base_URL + 'AdminController/RestoreHsnno',
            data: {
                "gift_id": gift_id,"flag":flag
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
        if ($('#name').val() == "") {
            $('.name').html("* Please fill name");
            $('.name').show();
        }  
        else if ($('#link').val() == "") {
            $('.link').html("* Please fill link");
            $('.link').show();
        }  
        else if ( mode == "new" && $('#image').val() == "" ) {
            $('.image').html("* Please select image");
            $('.image').show();
        }  
        else 
        {
            mode == "new" ? insertGift() : updateGift();
        }
    });
 

    function refreshDetails() {
        $.when(getGift()).done(function() {
            var table = $('#Main_Category').DataTable();
            table.destroy();
            dispHsnno(HsnnoJSON);
        });
    }

    function insertGift() {
        var form = $('#Hsnno_Form')[0];
        var data = new FormData(form);
        request = $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: base_URL + 'AdminController/insertGift',
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
                    content: 'Insert Sucessfully',
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

    function updateGift() {
        var form = $('#Hsnno_Form')[0];
        var data = new FormData(form);
        data.append("gift_id", gift_id);
        request = $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: base_URL + 'AdminController/updateGift',
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