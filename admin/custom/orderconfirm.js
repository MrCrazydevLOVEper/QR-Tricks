$(document).ready(function() {
	var subdepartmentid;
	var productpriceJSON,order_id,mode,SubDepatmentJSON,filterJson;
	$.when(getOrderdetails()).done(function(){
			dispOrder(productpriceJSON);				
	});


	function getOrderdetails()
	{
		return $.ajax({
			url: base_URL+'/AdminController/getconfirmorders',
			type:'POST',
			success:function(data){
				//console.log(data);
				productpriceJSON = $.parseJSON(data);
				
			},		
			error: function() {
				console.log("Error"); 
				//alert('something bad happened'); 
			}
		}) ;
	}


	function dispOrder(JSON)
	{	
		//$('#success_alert').show(1000);
		//console.log(dataJSON);
		var i = 1;
		$('#Main_Category').dataTable( {

			"columnDefs": [
			    { "orderData": [2],    "targets": 1 },
			    { "targets": [ 2 ], "visible": false, "searchable": false }
			  ],

			"aaSorting":[],
			"aaData": JSON,
			responsive: true,
			"aoColumns": [
				// { 
				// 	"mDataProp": function ( data, type, full, meta) {
				// 		return i++;					
				// 	}
				// },
				{ 
					"mDataProp": function ( data, type, full, meta) {
						return ""+data.order_placed_datentime+"";					
					}
				},		
				{ 
					"mDataProp": function ( data, type, full, meta) 
					{

						if(data.requested_prod=='yes')
						{
							return ""+data.orderno+"<br> <span style='color:red'>( miscellaneous )</span> ";
						}
						else
						{
							return ""+data.orderno+"";
						}
											
					}
				},	


				{ 
					"mDataProp": function ( data, type, full, meta) {
						return ""+data.order_id+"";					
					}
				},
					
				{ 
					"mDataProp": function ( data, type, full, meta) {
						return ""+data.delivery_date+"";					
					}
				},	
				{ 
					"mDataProp": function ( data, type, full, meta) 
					{
						if(data.username==null)
						{
							return "<span style='color:red'>Guest</span> ("+data.ad_username+")";	
						}
						else
						{
							return ""+data.username+"";	
						}
										
					}
				},		
				{ 
					"mDataProp": function ( data, type, full, meta) 
					{

						if(data.mobile_no==null)
						{
							return "<span style='color:red'>Guest</span> ("+data.ad_mobile_no+")";	
						}
						else
						{
							return ""+data.mobile_no+"";	
						}					
					}
				},
				// {
    //                 "mDataProp": function(data, type, full, meta) {
    //                         return '<a id="' + meta.row + '" class="btn viewaddress" style="padding:0px;" role="button" data-toggle="tooltip" data-placement="top" title="Click to edit"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;  view</a>&nbsp;&nbsp;';

    //             	}
    //             },
				{
                    "mDataProp": function(data, type, full, meta) {
                            return '<a id="' + meta.row + '" class="btn viewproductss" style="padding:0px;" role="button" data-toggle="tooltip" data-placement="top" title="Click to edit"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;  view</a>&nbsp;&nbsp;';
                        }
                },		
				{ 
					"mDataProp": function ( data, type, full, meta) {
						return " AED "+data.total_price+"";					
					}
				},		
				// { 
				// 	"mDataProp": function ( data, type, full, meta) {
				// 		return ""+data.payment_type+"";					
				// 	}
				// },	
				{ 
					"mDataProp": function ( data, type, full, meta) 
					{
						if(data.order_current_status=='order_placed')
						{
							return "Order Placed";
						}
						else if(data.order_current_status=='order_inprogress')
						{
							return "In Progress";
						}		
						else if(data.order_current_status=='order_outofdelivery')
						{
							return "Out for Delivery";
						}		
						else if(data.order_current_status=='order_delivered')
						{
							return "Delivered";
						}		
						else if(data.order_current_status=='order_cancelled')
						{
							return "Cancelled";
						}
											
					}
				},	
                {
                    "mDataProp": function(data, type, full, meta) 
                    {

						if(data.order_current_status!='order_delivered' && data.order_current_status!='order_cancelled' && data.order_current_status!='order_outofdelivery' )
						{
							return '<a id="' + meta.row + '" class="btn editorderbill" style="padding:0px; color: #59A545;" role="button" data-toggle="tooltip" data-placement="top" title="Click to edit order"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;  Edit</a>&nbsp;&nbsp;';
						}
						else
						{
							return '<a id="' + meta.row + '" class="btn " style="padding:0px; color: #59A545;opacity: 0.5;cursor: not-allowed;" role="button" data-toggle="tooltip" data-placement="top" title="Click to edit order"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;  Edit</a>&nbsp;&nbsp;';
						}
                            // return '<a id="' + meta.row + '" class="btn viewrecepit" style="padding:0px;" role="button" data-toggle="tooltip" data-placement="top" title="Click to edit"><i class="fa fa-print" aria-hidden="true"></i>&nbsp;  Print Invoice</a>&nbsp;&nbsp;';

                    }
                },
				{ 
					"mDataProp": function ( data, type, full, meta) {
						return ""+data.payment_type+"";					
					}
				},
				{
                    "mDataProp": function(data, type, full, meta) {
                            return '<a id="' + meta.row + '" class="btn updatestatus" style="padding:0px;" role="button" data-toggle="tooltip" data-placement="top" title="Click to edit"><i class="fa fa-check-circle-o" aria-hidden="true"></i>&nbsp;  Update status</a>&nbsp;&nbsp;';

                    }
                },
                {
                    "mDataProp": function(data, type, full, meta) {
                            return '<a id="' + meta.row + '" class="btn viewrecepit" style="padding:0px;" role="button" data-toggle="tooltip" data-placement="top" title="Click to edit"><i class="fa fa-print" aria-hidden="true"></i>&nbsp;  Print Invoice</a>&nbsp;&nbsp;';

                    }
                }
				// { 
				// 	"mDataProp": function ( data, type, full, meta) {
				// 		if(data.flag==1)
				// 		return '<a id="'+ meta.row +'" class="btn BtnEdit" style="padding:0px;" role="button" data-toggle="tooltip" data-placement="top" title="Click to edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;'+
				// 			   '<a id="'+ meta.row +'" class="btn BtnDelete" style="padding:0px;" role="button" data-toggle="tooltip" data-placement="top" title="Click to delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>';
				// 		else
				// 		return '<a id="'+ meta.row +'" class="btn BtnEdit" style="padding:0px;" role="button" data-toggle="tooltip" data-placement="top" title="Click to edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;'+
				// 			   '<a id="'+ meta.row +'" class="btn BtnRestore" style="padding:0px;" role="button" data-toggle="tooltip" data-placement="top" title="Click to restore"><i class="fa fa-check" aria-hidden="true"></i></a>';
						
				// 	}
				// },				
			]  				
		});
	}
	
	$(document).on('click','.updatestatus',function()
	{
		var r_index = $(this).attr('id');
		var order_st_time = productpriceJSON[r_index].order_st_time;
		var order_st_date = productpriceJSON[r_index].order_st_date;
		var orderno = productpriceJSON[r_index].orderno;
		$('#order_username').val(productpriceJSON[r_index].ad_username);
		$('#order_mobileno').val(productpriceJSON[r_index].ad_mobile_no);
		$('#orderno').val(productpriceJSON[r_index].orderno);
		$('.order_st_date').html('');
		$('.order_st_code').html('');
		$('.order_st_date').append(''+order_st_date+' '+order_st_time+ '');
		$('.order_st_code').append('Order ID:   '+orderno+'');
		$('#largeModal').modal('show');

            return $.ajax({
                url: base_URL + 'AdminController/gteorderstatusdtl',
                type: 'POST',
                data: {
                    "orderno": orderno
                },
				success:function(data){
					//console.log(data);
					var statusjson = $.parseJSON(data);

					$('#placeorder_11').html('');
					$('#placeorder_12').html('');
					$('#placeorder_13').html('');
					$('#placeorder_14').html('');
					$('#placeorder_11').html('');
					$('#Orderstatus_change').html('');
					for (var i = 0; i < statusjson.length; i++) {
						
						if(statusjson[i].order_status=='order_placed')
						{
							$('#placeorder_11').html('');
							$('#placeorder_11').append('<li class="completed">'+
                                    '<h5 class="mt-0 mb-1">Order Placed</h5>'+
                                    '<p class="text-muted order_st_date"> <small class="text-muted order_st_time"> '+statusjson[i].updated_date_time+' </small> </p>'+
                                     '<p class="text-muted">'+statusjson[i].order_message+'</p> '+
                                '</li>');
							$('#Orderstatus_change').html('');
							$('#Orderstatus_change').append('<option value="">Select Order status</option>'+         
								'<option value="order_inprogress">In Progress</option>'+
								'<option value="order_outofdelivery">Out for Delivery</option>'+
								'<option value="order_delivered">Delivered </option>'+
								'<option value="order_cancelled"> Cancelled</option>');
							$('#Orderstatus_change').val('order_inprogress');
							$('#Orderstatus_change').trigger("change");
							$('#orderformsubmit_sms').show();
						}
						if(statusjson[i].order_status=='order_inprogress')
						{
							$('#placeorder_12').html('');
							$('#placeorder_12').append('<li class="completed">'+
                                    '<h5 class="mt-0 mb-1">In Progress</h5>'+
                                    '<p class="text-muted"><small class="text-muted">'+statusjson[i].updated_date_time+' </small></p>'+
                                '</li>');
							$('#Orderstatus_change').html('');
							$('#Orderstatus_change').append('<option value="">Select Order status</option>'+         
								'<option value="order_outofdelivery">Out for Delivery</option>'+
								'<option value="order_delivered">Delivered </option>'+
								'<option value="order_cancelled"> Cancelled</option>');
							$('#Orderstatus_change').val('order_outofdelivery');
							$('#Orderstatus_change').trigger("change");
							$('#orderformsubmit_sms').show();
						}
						if(statusjson[i].order_status=='order_outofdelivery')
						{
							$('#placeorder_13').html('');
							$('#placeorder_13').append('<li class="completed">'+                     
                                    '<h5 class="mt-0 mb-1">Out for Delivery</h5>'+
                                    '<p class="text-muted">'+statusjson[i].updated_date_time+' </p>'+
                                    '<p class="text-muted">'+statusjson[i].order_message+'</p>'+
                                '</li>');
							$('#Orderstatus_change').html('');
							$('#Orderstatus_change').append('<option value="">Select Order status</option>'+         
								'<option value="order_delivered">Delivered </option>'+
								'<option value="order_cancelled"> Cancelled</option>');
							$('#Orderstatus_change').val('order_delivered');
							$('#Orderstatus_change').trigger("change");
							$('#orderformsubmit_sms').show();
						}
						if(statusjson[i].order_status=='order_delivered')
						{
							$('#placeorder_14').html('');
							$('#placeorder_14').append('<li class="completed"> '+                            
                                '<h5 class="mt-0 mb-1"> Delivered </h5>'+
                                '<p class="text-muted">'+statusjson[i].updated_date_time+'  </p>'+
                                '<p class="text-muted">'+statusjson[i].order_message+'</p>'+
                            '</li>');

							$('#Orderstatus_change').html('');
							$('#Orderstatus_change').append('<option value="">Select Order status</option>'+         
								'<option value="order_delivered">Delivered </option>');
							$('#Orderstatus_change').val('order_delivered');
							$('#Orderstatus_change').trigger("change");
							$('#orderformsubmit_sms').hide();
						}
						if(statusjson[i].order_status=='order_cancelled')
						{
							$('#placeorder_11').html('');
							$('#placeorder_11').append('<li>'+
                                '<h5 class="mt-0 mb-1"> Cancelled</h5>'+
                                '<p class="text-muted">'+statusjson[i].updated_date_time+' </p>'+
                                '<p class="text-muted">'+statusjson[i].order_message+'</p>'+
                            '</li>');
							$('#Orderstatus_change').html('');
							$('#Orderstatus_change').append('<option value="">Select Order status</option>'+         
								'<option value="order_placed">Order Placed</option>'+
								'<option value="order_inprogress">In Progress</option>'+
								'<option value="order_outofdelivery">Out for Delivery</option>'+
								'<option value="order_delivered">Delivered </option>'+
								'<option value="order_cancelled"> Cancelled</option>');
							$('#orderformsubmit_sms').hide();

						}

					}


						// $('#placeorder_11').hide();
					
				},		
				error: function() {
					console.log("Error"); 
					//alert('something bad happened'); 
				}
            });


	});
	
	$(document).on('click','.editorderbill',function(){
		
		var r_index = $(this).attr('id');
		 order_id = productpriceJSON[r_index].orderno;
		 window.location.replace(''+base_URL+'/AdminController/edit_orders/'+order_id+'');
	});



	$(document).on('change','#Orderstatus_change',function()
	{
		var order_username = $('#order_username').val();
		var orderno = $('#orderno').val();
		if($(this).val()=='order_placed')
		{
			var message = 'Hello '+order_username+', thanks for placing your order '+orderno+' with Yallabasket. We are excited to serve you. We will notify the progress of your order shortly.';
			$('#order_ststus_msg').val(message);

		}
		else if($(this).val()=='order_inprogress')
		{
			var message = '';
			$('#order_ststus_msg').val(message);
		}		
		else if($(this).val()=='order_outofdelivery')
		{
			var message = 'Hello '+order_username+', your order '+orderno+' is out for delivery. Our customer happiness executive will contact you before the delivery.';
			$('#order_ststus_msg').val(message);
		}		
		else if($(this).val()=='order_delivered')
		{
			var message = 'Hello '+order_username+', your order '+orderno+' has been delivered. For any support Whatsapp us on +971566339179,+971566207179. Happy to serve you again';
			$('#order_ststus_msg').val(message);
		}		
		else if($(this).val()=='order_cancelled')
		{
			var message = 'Hello '+order_username+', your order '+orderno+' has been cancelled. We are sad for not being able to serve you. Looking forward to serve you again';
			$('#order_ststus_msg').val(message);
		}

	});

	$(document).on('click','#orderformsubmit_sms',function()
	{

        $('.error').hide();

        if ($('#Orderstatus_change').val() == "") {
            $('.Orderstatus_change').html("* Please Select the Status ");
            $('.Orderstatus_change').show();
        }
        else if ($('#order_ststus_msg').val() == "" && $('#Orderstatus_change').val()!='order_inprogress') {
            $('.order_ststus_msg').html("* Enter the Status message ");
            $('.order_ststus_msg').show();
        }
        else 
        {

			var order_status = $('#Orderstatus_change').val();
			var orderno = $('#orderno').val();
			var order_username = $('#order_username').val();
			var ad_mobile_no = $('#order_mobileno').val();
			var order_ststus_msg = $('#order_ststus_msg').val();
            return $.ajax({
                url: base_URL + 'AdminController/updateorderstatusmsg',
                type: 'POST',
                data: {
                    "order_status": order_status,
                    "orderno": orderno,
                    "emp_username": order_username,
                    "order_ststus_msg":order_ststus_msg,
                    "mobile_no":ad_mobile_no
                },
                success: function(data) {

                    var js = $.parseJSON(data);
                    var status = js.result;
                    if (status == "success") {
                        $.confirm({
                            icon: 'icon-close',
                            title: 'Info',
                            content: 'Status Updated Sucessfully',
                            type: 'green',
                            buttons: {
                                Ok: function() {
                                	$('#largeModal').modal('hide');
                                },
                            }
                        });
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

                },
                error: function() {
                    console.log("Error");
                    //alert('something bad happened'); 
                }
            });
        }

	});


	$(document).on('click','#searchbtn_fltr_ordrcnfm',function()
	{
		$('.error').hide();
		var fromdateee = 0;
		var fromtimeee = 0;
		var todateee  = 0;
		var totimeee  = 0;
		if($('.fromdateee').val()!='')
		{
			fromdateee = $('.fromdateee').val();	
		}
		if($('.fromtimeee').val()!='')
		{
			fromtimeee = $('.fromtimeee').val();	
		}
		if($('.todateee').val()!='')
		{
			todateee = $('.todateee').val();	
		}
		if($('.totimeee').val()!='')
		{
			totimeee = $('.totimeee').val();	
		}
		var orderfilter_statuschangee = $('#orderfilter_statuschangee').val();



		if($('#orderfilter_statuschangee').val()=='order_placed')
		{
            $('#nextorderstatus_change').val("In Progress");
            $('#updatebtn_fltr_ordrcnfm').show();
		}
		if($('#orderfilter_statuschangee').val()=='order_inprogress')
		{
            $('#nextorderstatus_change').val("Out for Delivery");
            $('#updatebtn_fltr_ordrcnfm').show();
		}
		if($('#orderfilter_statuschangee').val()=='order_outofdelivery')
		{
            $('#nextorderstatus_change').val("Delivered");
            $('#updatebtn_fltr_ordrcnfm').show();
		}
		if($('#orderfilter_statuschangee').val()=='order_delivered')
		{
            $('#nextorderstatus_change').val("Delivered");
            $('#updatebtn_fltr_ordrcnfm').hide();
		}
		if($('#orderfilter_statuschangee').val()=='order_cancelled')
		{
            $('#nextorderstatus_change').val("Cancelled");
			$('#updatebtn_fltr_ordrcnfm').hide();
		}


		if($('#orderfilter_statuschangee').val()=='')
		{
            $('.filter_change_error').html("* Select Order Status ");
            $('.filter_change_error').show();
		}
		else
		{
	        return $.ajax({
	            url: base_URL + 'AdminController/getorderfilterstatus',
	            type: 'POST',
	            data: {
	                "from_date":fromdateee,
					"from_time":fromtimeee,
					"todate":todateee,
					"to_time":totimeee,
					"order_status":orderfilter_statuschangee,
	            },
				success:function(data){
					//console.log(data);
					filterJson = $.parseJSON(data);
					$('#filter_result_tbl_show_div').show();
					$('#maintable_div_show').hide();
					dispOrderfiltertbl(filterJson);				
				},		
				error: function() {
					console.log("Error"); 
					//alert('something bad happened'); 
				}
	        });
        }

	});


	
	function dispOrderfiltertbl(JSON)
	{	
		//$('#success_alert').show(1000);
		//console.log(dataJSON);
		$("input[name='selectAllcheck']").prop('checked',false);
		$('#filter_result_tbl').DataTable().destroy();
		var i = 1;
		var myoddtbl = $('#filter_result_tbl').DataTable( {
			"aaSorting":[],
			"aaData": JSON,
            responsive: true,
            columnDefs: [{
                orderable: false,
                targets: 0,
            }],
            order: [
                [1, 'asc'],
            ],
            "aoColumns": [

 				{
                    "mDataProp": function (data, type, full, meta) 
                    {
                        return '<input type="checkbox" class="select-checkbox" value="'+ data.orderno +'" data-attr-name="'+data.ad_username+'" data-attr-mobileo="'+data.ad_mobile_no+'"  name="user_id" >';
                    },
                },
				{ 
					"mDataProp": function ( data, type, full, meta) {
						return ""+data.order_placed_datentime+"";					
					}
				},		
				{ 
					"mDataProp": function ( data, type, full, meta) {
						return ""+data.orderno+"";					
					}
				},		
				{ 
					"mDataProp": function ( data, type, full, meta) {
						return ""+data.delivery_date+"";					
					}
				},	
				{ 
					"mDataProp": function ( data, type, full, meta) 
					{
						if(data.username==null)
						{
							return "<span style='color:red'>Guest</span> ("+data.ad_username+")";	
						}
						else
						{
							return ""+data.username+"";	
						}
										
					}
				},		
				{ 
					"mDataProp": function ( data, type, full, meta) 
					{

						if(data.mobile_no==null)
						{
							return "<span style='color:red'>Guest</span> ("+data.ad_mobile_no+")";	
						}
						else
						{
							return ""+data.mobile_no+"";	
						}					
					}
				},

				{
                    "mDataProp": function(data, type, full, meta) {
                            return '<a id="' + meta.row + '" class="btn viewproductss_filter" style="padding:0px;" role="button" data-toggle="tooltip" data-placement="top" title="Click to edit"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;  view</a>&nbsp;&nbsp;';
                        }
                },		
				{ 
					"mDataProp": function ( data, type, full, meta) {
						return " AED "+data.total_price+"";					
					}
				},			
				{ 
					"mDataProp": function ( data, type, full, meta) 
					{
						if(data.order_current_status=='order_placed')
						{
							return "Order Placed";
						}
						else if(data.order_current_status=='order_inprogress')
						{
							return "In Progress";
						}		
						else if(data.order_current_status=='order_outofdelivery')
						{
							return "Out for Delivery";
						}		
						else if(data.order_current_status=='order_delivered')
						{
							return "Delivered";
						}		
						else if(data.order_current_status=='order_cancelled')
						{
							return "Cancelled";
						}				
					}
				},
	
			]  				
		});

	}


	$('input[name="selectAllcheck"]').click(function()
	{
        if($(this).prop("checked") == true)
        {
			$.each($("input[name='user_id']"), function(){
			    $("input[name='user_id']").prop('checked',true);
			});
        }
        else if($(this).prop("checked") == false)
        {
			$.each($("input[name='user_id']"), function(){
			    $("input[name='user_id']").prop('checked',false);
			});
        }
    });


	$(document).on('click','#updatebtn_fltr_ordrcnfm',function()
	{
		var order_status =$('#nextorderstatus_change').val();
        var status_emp = '';
		if(order_status=="Order Placed")
		{
			status_emp = "order_placed";
		}
		else if(order_status=="In Progress")
		{
			status_emp = "order_inprogress";
		}		
		else if(order_status=="Out for Delivery")
		{
			status_emp = "order_outofdelivery";
		}		
		else if(order_status=="Delivered")
		{
			status_emp = "order_delivered";
		}		
		else if(order_status=="Cancelled")
		{
			status_emp = "order_cancelled";
		}
		
		var emp_orderno = [];
		var emp_username = [];
		var emp_mobile_no = [];
		$.each($("input[name='user_id']:checked"), function(){
		    emp_orderno.push($(this).val());
		    emp_username.push($(this).attr('data-attr-name'));
		    emp_mobile_no.push($(this).attr('data-attr-mobileo'));
		});        
		var finalid =  emp_orderno.join(",");
		var finalname =  emp_username.join(",");
		var finalmobile =  emp_mobile_no.join(",");

        if(emp_orderno.length=='0')
        {
            $.confirm({
                icon: 'icon-close',
                title: 'Info',
                content: 'Please Select any order to update status',
                type: 'red',
                buttons: {
                    Ok: function() {},
                }
            });
        }
        else
        {
            return $.ajax({
                url: base_URL + 'AdminController/updateorderstatusmsg',
                type: 'POST',
                data: {
                    "orderno":finalid,
                    "emp_username":finalname,
                    "order_status": status_emp,
                    "mobile_no": finalmobile,
                },
                success: function(data) 
                {
                    var js = $.parseJSON(data);
                    var status = js.result;
                    if (status == "success") {
                        $.confirm({
                            icon: 'icon-close',
                            title: 'Info',
                            content: 'Status Updated successfully',
                            type: 'green',
                            buttons: {
                                Ok: function() {
			                        $('#largeModal').modal('hide');
			                        $("#searchbtn_fltr_ordrcnfm").trigger('click');
                                },
                            }
                        });
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
                    
                },
                error: function() {
                    console.log("Error");
                    //alert('something bad happened'); 
                }
            });
        }

	});	



	$(document).on('click','.viewaddress',function(){
		
		var r_index = $(this).attr('id');
		var address_id = productpriceJSON[r_index].address_id;
		// $('#largeModal').modal('show');

			return $.ajax({
			url: base_URL+'AdminController/getaddressdetails',
			type:'POST',
			data: {"address_id":address_id},
			success:function(data){
				$('#largeModal').modal('show');
				SubDepatmentJSON = $.parseJSON(data);
					
					$('.appendaddress').html('');
					$('.appendaddress').append("<h4>"+SubDepatmentJSON[0].address_info[0].username+"</h4> <br> <p>"+SubDepatmentJSON[0].address_info[0].flat_no+" ,"+SubDepatmentJSON[0].address_info[0].flat_no+" </p>"+
						"<p>"+SubDepatmentJSON[0].address_info[0].landmark+", "+SubDepatmentJSON[0].address_info[0].area+", "+SubDepatmentJSON[0].address_info[0].city+"</p> <p> <b> Moble no : </b>"+SubDepatmentJSON[0].address_info[0].mobile_no+"");

			},		
			error: function() {
				console.log("Error"); 
				//alert('something bad happened'); 
			}
		}) ;

	});	





	
	$(document).on('click','.viewrecepit',function()
	{

			var r_index = $(this).attr('id');
		 	order_id = productpriceJSON[r_index].order_id;
			return $.ajax({
			url: base_URL+'AdminController/viewrecepit',
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

				// window.location.href = js.url;
				// window.open(js.url, '_blank');
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
				//alert('something bad happened'); 
			}
		}) ;

	});



	$(document).on('click','.viewproductss',function(){
		
		var r_index = $(this).attr('id');
		 order_id = productpriceJSON[r_index].order_id;
		// $('#largeModal').modal('show');

			return $.ajax({
			url: base_URL+'AdminController/getorderedproduct',
			type:'POST',
			data: {"order_id":order_id},
			success:function(data){
				$('#productmodel').modal('show');
				var js = $.parseJSON(data);
				SubDepatmentJSON = js.order_details;

				// console.log(SubDepatmentJSON[0].query);
					
				if(SubDepatmentJSON[0].query=='')
				{
					$('.customer_instructionss').hide();
				}
				else
				{
					$('#order_instruction').val(SubDepatmentJSON[0].query);
					$('.customer_instructionss').show();
				}

				
				$('.appendproductdetail').html('');
				$('.appendproductinfotr').html('');
				for(var i=0;i<SubDepatmentJSON[0].produc_info.length;i++)
				{


					if(SubDepatmentJSON[0].produc_info[i].product_type=='NAP')
					{
						$('.appendproductinfotr').append('<tr>'+
							'<td >'+SubDepatmentJSON[0].produc_info[i].produ_imgurl+'</td>'+
	                        '<th  scope="row">'+SubDepatmentJSON[0].produc_info[i].prod_name+' ( '+SubDepatmentJSON[0].produc_info[i].prod_quantity+' ) </th>'+
	                        '<td >'+SubDepatmentJSON[0].produc_info[i].quantity+'</td>'+
	                        '<td > '+SubDepatmentJSON[0].produc_info[i].price_pt+' </td>'+
	                        '<td > '+SubDepatmentJSON[0].produc_info[i].prod_total_price+' </td>'+
	                    '</tr>');
					}
					else if(SubDepatmentJSON[0].produc_info[i].product_type=='AP')
					{
						$('.appendproductinfotr').append('<tr>'+
							'<td><img src="'+SubDepatmentJSON[0].produc_info[i].produ_imgurl+'" alt="product-img" height="52"></td>'+
	                        '<th scope="row">'+SubDepatmentJSON[0].produc_info[i].prod_code+' - '+SubDepatmentJSON[0].produc_info[i].prod_name+' ( '+SubDepatmentJSON[0].produc_info[i].prod_quantity+' '+SubDepatmentJSON[0].produc_info[i].unit+') </th>'+
	                        '<td>'+SubDepatmentJSON[0].produc_info[i].quantity+'</td>'+
	                        '<td>'+SubDepatmentJSON[0].produc_info[i].price_pt+'</td>'+
	                        '<td> '+SubDepatmentJSON[0].produc_info[i].prod_total_price+' </td>'+
	                    '</tr>');
					}
					else if(SubDepatmentJSON[0].produc_info[i].product_type=='slot_prod')
					{
						$('.appendproductinfotr').append('<tr>'+
							'<td class="text-center"><div  style="display: inline-flex;"> <img src="'+SubDepatmentJSON[0].produc_info[i].slot_prod1+'" alt="product-img" height="52">'+
							'<img src="'+SubDepatmentJSON[0].produc_info[i].slot_prod2+'" alt="product-img" height="52">'+
							'<img src="'+SubDepatmentJSON[0].produc_info[i].slot_prod3+'" alt="product-img" height="52"></div> '+
							'<p>'+SubDepatmentJSON[0].produc_info[i].produ_imgurl+'</p></td>'+
	                        '<th scope="row"><p>'+SubDepatmentJSON[0].produc_info[i].slot_prod_detail1+'</p>'+
	                        '<p>'+SubDepatmentJSON[0].produc_info[i].slot_prod_detail2+'</p>'+
	                        '<p>'+SubDepatmentJSON[0].produc_info[i].slot_prod_detail3+'</p> </th>'+
	                        '<td>1</td>'+
	                        '<td>'+SubDepatmentJSON[0].produc_info[i].quantity+' X '+SubDepatmentJSON[0].produc_info[i].price_pt+'</td>'+
	                        '<td> '+SubDepatmentJSON[0].produc_info[i].prod_total_price+' </td>'+
	                    '</tr>');
					}
				};

				var Order_Status = SubDepatmentJSON[0].order_current_status;

				if (Order_Status=='order_placed') 
				{
					var Order_Status_v = 'Order Placed';
				}				
				if (Order_Status=='order_inprogress') 
				{
					var Order_Status_v = 'In Progress';
				}				
				if (Order_Status=='order_outofdelivery') 
				{
					var Order_Status_v = 'Out for Delivery';
				}				
				if (Order_Status=='order_delivered') 
				{
					var Order_Status_v = 'Delivered';
				}				
				if (Order_Status=='order_cancelled') 
				{
					var Order_Status_v = 'Cancelled';
				}

				$('.appendorderinfobox').html('');
				$('.appendorderinfobox').append('  <p class="mb-2"><span class="font-weight-semibold mr-2 custom_pdf_style">Order Id </span> : #'+SubDepatmentJSON[0].orderno+'</p>'+
                '<p class="mb-2"><span class="font-weight-semibold mr-2 custom_pdf_style">Order Date  </span> : '+SubDepatmentJSON[0].ordered_date+'</p>'+
                '<p class="mb-2"><span class="font-weight-semibold mr-2 custom_pdf_style">Delivery Date  </span> : '+SubDepatmentJSON[0].delivery_date+'</p>'+
                '<p class="mb-2"><span class="font-weight-semibold mr-2 custom_pdf_style">Payment Type</span> : '+SubDepatmentJSON[0].payment_type+'</p>'+
                '<p class="mb-2"><span class="font-weight-semibold mr-2 custom_pdf_style">Order Status</span> : '+Order_Status_v+'</p>');

				$('.appendaddress').html('');
				$('.appendaddress').append("<h4>"+SubDepatmentJSON[0].address_info[0].username+",</h4>  <p>"+SubDepatmentJSON[0].address_info[0].address+" , "+SubDepatmentJSON[0].address_info[0].city+" "+
					""+SubDepatmentJSON[0].address_info[0].state+"- "+SubDepatmentJSON[0].address_info[0].pincode+"</p> <p> <b> Moble no : </b>"+SubDepatmentJSON[0].address_info[0].mobile_no+"");



				$('.appendproductfooter').html('');
			    if(SubDepatmentJSON[0].orderbag_total!=null && SubDepatmentJSON[0].orderbag_total!="0" && SubDepatmentJSON[0].orderbag_total!="")
			    {
					$('.appendproductfooter').append('<tr>'+
	                           ' <td scope="row" colspan="3" style="border:none" class="text-right"></td>'+
	                           ' <th scope="row" class="text-right" style="background: #f3f7f9;">Item total </th>'+
	                           ' <td style="background: #f3f7f9;"><div class="col-sm-12 font-weight-bold">'+
	                           '<input class="form-control order_ed_total_price_pt" name="order_ed_total_price_pt" readonly style="border:none;background:#f3f7f9;" value="'+SubDepatmentJSON[0].orderbag_total+'" placeholder="Enter Brand Name">'+
	                           '</div>'+
	                   '</tr>');
			    }
			    if(SubDepatmentJSON[0].yalla_money=='yes')
			    {
					$('.appendproductfooter').append('<tr>'+
	                           ' <td scope="row" colspan="3" style="border:none" class="text-right"></td>'+
	                           ' <th scope="row" class="text-right" style="background: #f3f7f9;">Yalla Money </th>'+
	                           ' <td style="background: #f3f7f9;"><div class="col-sm-12 font-weight-bold">'+
	                           '<input class="form-control order_ed_total_price_pt" name="order_ed_total_price_pt" readonly style="border:none;background:#f3f7f9;" value="'+SubDepatmentJSON[0].yalla_money_amount+'" placeholder="Enter Brand Name">'+
	                           '</div>'+
	                   '</tr>');
			    }
			    if(SubDepatmentJSON[0].discount_price!=null && SubDepatmentJSON[0].discount_price!="0" && SubDepatmentJSON[0].discount_price!="" && SubDepatmentJSON[0].discount_price!=0)
			    {
					$('.appendproductfooter').append('<tr>'+
	                           ' <td scope="row" colspan="3" style="border:none" class="text-right"></td>'+
	                           ' <th scope="row" class="text-right" style="background: #f3f7f9;">Item Discount </th>'+
	                           ' <td style="background: #f3f7f9;"><div class="col-sm-12 font-weight-bold">'+
	                           '<input class="form-control order_ed_total_price_pt" name="order_ed_total_price_pt" readonly style="border:none;background:#f3f7f9;" value="'+SubDepatmentJSON[0].discount_price+'" placeholder="Enter Brand Name">'+
	                           '</div>'+
	                   '</tr>');
			    }
			    if(SubDepatmentJSON[0].promocode_price!=null && SubDepatmentJSON[0].promocode_price!="0" && SubDepatmentJSON[0].promocode_price!="")
			    {
					$('.appendproductfooter').append('<tr>'+
	                           ' <td scope="row" colspan="3" style="border:none" class="text-right"></td>'+
	                           ' <th scope="row" class="text-right" style="background: #f3f7f9;">Coupon Discount </th>'+
	                           ' <td style="background: #f3f7f9;"><div class="col-sm-12 font-weight-bold">'+
	                           '<input class="form-control order_ed_total_price_pt" name="order_ed_total_price_pt" readonly style="border:none;background:#f3f7f9;" value="'+SubDepatmentJSON[0].promocode_price+'" placeholder="Enter Brand Name">'+
	                           '</div>'+
	                   '</tr>');
			    }

				$('.appendproductfooter').append('<tr>'+
                           ' <td scope="row" colspan="3" style="border:none" class="text-right"></td>'+
                           ' <th scope="row" class="text-right" style="background: #f3f7f9;">Total Bill Value </th>'+
                           ' <td style="background: #f3f7f9;"><div class="col-sm-12 font-weight-bold">'+
                           '<input class="form-control order_ed_total_price_pt" name="order_ed_total_price_pt" readonly style="border:none;background:#f3f7f9;" value="'+SubDepatmentJSON[0].total_price+'" placeholder="Enter Brand Name">'+
                           '</div>'+
                   '</tr>');



			},		
			error: function() {
				console.log("Error"); 
				//alert('something bad happened'); 
			}
		}) ;
	});
	

		$(document).on('click','.viewproductss_filter',function(){
		
		var r_index = $(this).attr('id');
		 order_id = filterJson[r_index].order_id;
		// $('#largeModal').modal('show');

			return $.ajax({
			url: base_URL+'AdminController/getorderedproduct',
			type:'POST',
			data: {"order_id":order_id},
			success:function(data){
				$('#productmodel').modal('show');
				var js = $.parseJSON(data);
				SubDepatmentJSON = js.order_details;

				// console.log(SubDepatmentJSON[0].query);
					
				if(SubDepatmentJSON[0].query=='')
				{
					$('.customer_instructionss').hide();
				}
				else
				{
					$('#order_instruction').val(SubDepatmentJSON[0].query);
					$('.customer_instructionss').show();
				}

				
				$('.appendproductdetail').html('');
				$('.appendproductinfotr').html('');
				for(var i=0;i<SubDepatmentJSON[0].produc_info.length;i++)
				{


					if(SubDepatmentJSON[0].produc_info[i].product_type=='NAP')
					{
						$('.appendproductinfotr').append('<tr>'+
							'<td >'+SubDepatmentJSON[0].produc_info[i].produ_imgurl+'</td>'+
	                        '<th  scope="row">'+SubDepatmentJSON[0].produc_info[i].prod_name+' ( '+SubDepatmentJSON[0].produc_info[i].prod_quantity+' ) </th>'+
	                        '<td >'+SubDepatmentJSON[0].produc_info[i].quantity+'</td>'+
	                        '<td > '+SubDepatmentJSON[0].produc_info[i].price_pt+' </td>'+
	                        '<td > '+SubDepatmentJSON[0].produc_info[i].prod_total_price+' </td>'+
	                    '</tr>');
					}
					else if(SubDepatmentJSON[0].produc_info[i].product_type=='AP')
					{
						$('.appendproductinfotr').append('<tr>'+
							'<td><img src="'+SubDepatmentJSON[0].produc_info[i].produ_imgurl+'" alt="product-img" height="52"></td>'+
	                        '<th scope="row">'+SubDepatmentJSON[0].produc_info[i].prod_code+' - '+SubDepatmentJSON[0].produc_info[i].prod_name+' ( '+SubDepatmentJSON[0].produc_info[i].prod_quantity+' '+SubDepatmentJSON[0].produc_info[i].unit+') </th>'+
	                        '<td>'+SubDepatmentJSON[0].produc_info[i].quantity+'</td>'+
	                        '<td>'+SubDepatmentJSON[0].produc_info[i].price_pt+'</td>'+
	                        '<td> '+SubDepatmentJSON[0].produc_info[i].prod_total_price+' </td>'+
	                    '</tr>');
					}
					else if(SubDepatmentJSON[0].produc_info[i].product_type=='slot_prod')
					{
						$('.appendproductinfotr').append('<tr>'+
							'<td class="text-center"><div  style="display: inline-flex;"> <img src="'+SubDepatmentJSON[0].produc_info[i].slot_prod1+'" alt="product-img" height="52">'+
							'<img src="'+SubDepatmentJSON[0].produc_info[i].slot_prod2+'" alt="product-img" height="52">'+
							'<img src="'+SubDepatmentJSON[0].produc_info[i].slot_prod3+'" alt="product-img" height="52"></div> '+
							'<p>'+SubDepatmentJSON[0].produc_info[i].produ_imgurl+'</p></td>'+
	                        '<th scope="row"><p>'+SubDepatmentJSON[0].produc_info[i].slot_prod_detail1+'</p>'+
	                        '<p>'+SubDepatmentJSON[0].produc_info[i].slot_prod_detail2+'</p>'+
	                        '<p>'+SubDepatmentJSON[0].produc_info[i].slot_prod_detail3+'</p> </th>'+
	                        '<td>1</td>'+
	                        '<td>'+SubDepatmentJSON[0].produc_info[i].quantity+' X '+SubDepatmentJSON[0].produc_info[i].price_pt+'</td>'+
	                        '<td> '+SubDepatmentJSON[0].produc_info[i].prod_total_price+' </td>'+
	                    '</tr>');
					}
				};

				var Order_Status = SubDepatmentJSON[0].order_current_status;

				if (Order_Status=='order_placed') 
				{
					var Order_Status_v = 'Order Placed';
				}				
				if (Order_Status=='order_inprogress') 
				{
					var Order_Status_v = 'In Progress';
				}				
				if (Order_Status=='order_outofdelivery') 
				{
					var Order_Status_v = 'Out for Delivery';
				}				
				if (Order_Status=='order_delivered') 
				{
					var Order_Status_v = 'Delivered';
				}				
				if (Order_Status=='order_cancelled') 
				{
					var Order_Status_v = 'Cancelled';
				}

				$('.appendorderinfobox').html('');
				$('.appendorderinfobox').append('  <p class="mb-2"><span class="font-weight-semibold mr-2 custom_pdf_style">Order Id </span> : #'+SubDepatmentJSON[0].orderno+'</p>'+
                '<p class="mb-2"><span class="font-weight-semibold mr-2 custom_pdf_style">Order Date  </span> : '+SubDepatmentJSON[0].ordered_date+'</p>'+
                '<p class="mb-2"><span class="font-weight-semibold mr-2 custom_pdf_style">Delivery Date  </span> : '+SubDepatmentJSON[0].delivery_date+'</p>'+
                '<p class="mb-2"><span class="font-weight-semibold mr-2 custom_pdf_style">Payment Type</span> : '+SubDepatmentJSON[0].payment_type+'</p>'+
                '<p class="mb-2"><span class="font-weight-semibold mr-2 custom_pdf_style">Order Status</span> : '+Order_Status_v+'</p>');

				$('.appendaddress').html('');
				$('.appendaddress').append("<h4>"+SubDepatmentJSON[0].address_info[0].username+",</h4>  <p>"+SubDepatmentJSON[0].address_info[0].address+" , "+SubDepatmentJSON[0].address_info[0].city+" "+
					""+SubDepatmentJSON[0].address_info[0].state+"- "+SubDepatmentJSON[0].address_info[0].pincode+"</p> <p> <b> Moble no : </b>"+SubDepatmentJSON[0].address_info[0].mobile_no+"");



				$('.appendproductfooter').html('');
			    if(SubDepatmentJSON[0].orderbag_total!=null && SubDepatmentJSON[0].orderbag_total!="0" && SubDepatmentJSON[0].orderbag_total!="")
			    {
					$('.appendproductfooter').append('<tr>'+
	                           ' <td scope="row" colspan="3" style="border:none" class="text-right"></td>'+
	                           ' <th scope="row" class="text-right" style="background: #f3f7f9;">Item total </th>'+
	                           ' <td style="background: #f3f7f9;"><div class="col-sm-12 font-weight-bold">'+
	                           '<input class="form-control order_ed_total_price_pt" name="order_ed_total_price_pt" readonly style="border:none;background:#f3f7f9;" value="'+SubDepatmentJSON[0].orderbag_total+'" placeholder="Enter Brand Name">'+
	                           '</div>'+
	                   '</tr>');
			    }
			    if(SubDepatmentJSON[0].yalla_money=='yes')
			    {
					$('.appendproductfooter').append('<tr>'+
	                           ' <td scope="row" colspan="3" style="border:none" class="text-right"></td>'+
	                           ' <th scope="row" class="text-right" style="background: #f3f7f9;">Yalla Money </th>'+
	                           ' <td style="background: #f3f7f9;"><div class="col-sm-12 font-weight-bold">'+
	                           '<input class="form-control order_ed_total_price_pt" name="order_ed_total_price_pt" readonly style="border:none;background:#f3f7f9;" value="'+SubDepatmentJSON[0].yalla_money_amount+'" placeholder="Enter Brand Name">'+
	                           '</div>'+
	                   '</tr>');
			    }
			    if(SubDepatmentJSON[0].discount_price!=null && SubDepatmentJSON[0].discount_price!="0" && SubDepatmentJSON[0].discount_price!="" && SubDepatmentJSON[0].discount_price!=0)
			    {
					$('.appendproductfooter').append('<tr>'+
	                           ' <td scope="row" colspan="3" style="border:none" class="text-right"></td>'+
	                           ' <th scope="row" class="text-right" style="background: #f3f7f9;">Item Discount </th>'+
	                           ' <td style="background: #f3f7f9;"><div class="col-sm-12 font-weight-bold">'+
	                           '<input class="form-control order_ed_total_price_pt" name="order_ed_total_price_pt" readonly style="border:none;background:#f3f7f9;" value="'+SubDepatmentJSON[0].discount_price+'" placeholder="Enter Brand Name">'+
	                           '</div>'+
	                   '</tr>');
			    }
			    if(SubDepatmentJSON[0].promocode_price!=null && SubDepatmentJSON[0].promocode_price!="0" && SubDepatmentJSON[0].promocode_price!="")
			    {
					$('.appendproductfooter').append('<tr>'+
	                           ' <td scope="row" colspan="3" style="border:none" class="text-right"></td>'+
	                           ' <th scope="row" class="text-right" style="background: #f3f7f9;">Coupon Discount </th>'+
	                           ' <td style="background: #f3f7f9;"><div class="col-sm-12 font-weight-bold">'+
	                           '<input class="form-control order_ed_total_price_pt" name="order_ed_total_price_pt" readonly style="border:none;background:#f3f7f9;" value="'+SubDepatmentJSON[0].promocode_price+'" placeholder="Enter Brand Name">'+
	                           '</div>'+
	                   '</tr>');
			    }

				$('.appendproductfooter').append('<tr>'+
                           ' <td scope="row" colspan="3" style="border:none" class="text-right"></td>'+
                           ' <th scope="row" class="text-right" style="background: #f3f7f9;">Total Bill Value </th>'+
                           ' <td style="background: #f3f7f9;"><div class="col-sm-12 font-weight-bold">'+
                           '<input class="form-control order_ed_total_price_pt" name="order_ed_total_price_pt" readonly style="border:none;background:#f3f7f9;" value="'+SubDepatmentJSON[0].total_price+'" placeholder="Enter Brand Name">'+
                           '</div>'+
                   '</tr>');



			},		
			error: function() {
				console.log("Error"); 
				//alert('something bad happened'); 
			}
		}) ;

	});
	
	
	$('#largeModal').on('show.bs.modal', function () {
		$(".no").hide();
		$('#hide').attr('checked', false);
		$('#show').attr('checked', false);
		$('#sdId').val('');
	    $(this).find('form').trigger('reset');
	    $('.appendaddress').html('');
	});	
	
	$('#productmodel').on('show.bs.modal', function () {
		$('.appendproductdetail').html('');
	});	
	
	
	function refreshDetails()
	{
		$.when(getOrderdetails()).done(function(){
			var table = $('#Main_Category').DataTable();
			table.destroy();	
			dispOrder(productpriceJSON);				
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
