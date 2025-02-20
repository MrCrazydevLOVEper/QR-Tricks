$(document).ready(function() {

	var ourinfoJSON,company_info_id,mode;

	$.when(getourinfodetails()).done(function()
	{
		company_info_id = ourinfoJSON[0]["company_info_id"];
		$('#name').val(ourinfoJSON[0]["name"]);
		$('#address').val(ourinfoJSON[0]["address"]);
		$('#email').val(ourinfoJSON[0]["email"]);
		$('#phonenumber').val(ourinfoJSON[0]["phonenumber"]);
		$('#fax').val(ourinfoJSON[0]["fax"]);
		$('#gst').val(ourinfoJSON[0]["gst"]); 
		$('#pan').val(ourinfoJSON[0]["pan"]);


		$('#branch_address').val(ourinfoJSON[0]["branch_address"]);
		$('#sec_number').val(ourinfoJSON[0]["sec_number"]);
		$('#sec_mail').val(ourinfoJSON[0]["sec_mail"]);
		$('#website').val(ourinfoJSON[0]["website"]);
		$('#state_code').val(ourinfoJSON[0]["state_code"]);
		$('#bank_name').val(ourinfoJSON[0]["bank_name"]);
		$('#bank_ac_no').val(ourinfoJSON[0]["bank_ac_no"]);
		$('#ifsc_code').val(ourinfoJSON[0]["ifsc_code"]);
		$('#services').val(ourinfoJSON[0]["services"]);

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
	
	$('#Formdata_details_submit').click(function(){
		$('.error').hide();

		if($('#name').val()=="")
		{
			$('.name').html("Please fill Name");
			$('.name').show();
		}
		else if($('#email').val()=="")
		{
			$('.email').html("Please fill email");
			$('.email').show();
		}
		else if($('#sec_mail').val()=="")
		{
			$('.sec_mail').html("Please fill secondary email");
			$('.sec_mail').show();
		}
		else if($('#gst').val()=="")
		{
			$('.gst').html("Please fill gst");
			$('.gst').show();
		}
		else if($('#fax').val()=="")
		{
			$('.fax').html("Please fill fax");
			$('.fax').show();
		}
		else if($('#ifsc_code').val()=="")
		{
			$('.ifsc_code').html("Please fill ifsc code");
			$('.ifsc_code').show();
		}
		else if($('#bank_ac_no').val()=="")
		{
			$('.bank_ac_no').html("Please fill bank ac no");
			$('.bank_ac_no').show();
		}
		else if($('#phonenumber').val()=="")
		{
			$('.phonenumber').html("Please fill phone number");
			$('.phonenumber').show();
		}
		else if($('#sec_number').val()=="")
		{
			$('.sec_number').html("Please fill phone secondary number");
			$('.sec_number').show();
		}
		else if($('#pan').val()=="")
		{
			$('.pan').html("Please fill pan");
			$('.pan').show();
		}
		else if($('#website').val()=="")
		{
			$('.website').html("Please fill website");
			$('.website').show();
		}
		else if($('#state_code').val()=="")
		{
			$('.state_code').html("Please fill state code");
			$('.state_code').show();
		}
		else if($('#bank_name').val()=="")
		{
			$('.bank_name').html("Please fill bank name");
			$('.bank_name').show();
		}
		else if($('#address').val()=="")
		{
			$('.address').html("Please fill address");
			$('.address').show();
		}
		else if($('#branch_address').val()=="")
		{
			$('.branch_address').html("Please fill branch address");
			$('.branch_address').show();
		}
		else if($('#services').val()=="")
		{
			$('.services').html("Please fill services");
			$('.services').show();
		}	

		else
		{
			updateourinfovalue();			
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
