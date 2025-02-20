$(document).ready(function() {

	var ourtaxJSON,tax_id,mode;

	$.when(getourtaxdetails()).done(function()
	{
		tax_id = ourtaxJSON[0]["tax_id"];
		$('#gst').val(ourtaxJSON[0]["gst"]);
		$('#sgst').val(ourtaxJSON[0]["sgst"]); 
	});
	
	function getourtaxdetails()
	{
		return $.ajax({
			url: base_URL+'AdminController/getourtaxdetails',
			type:'POST',
			success:function(data)
			{
				ourtaxJSON = $.parseJSON(data);	
			},		
			error: function() {
				console.log("Error"); 
			}
		}) ;
	}
	
	$('#Formdata_details_submit').click(function(){
		$('.error').hide();

		if($('#gst').val()=="")
		{
			$('.gst').html("Please fill gst");
			$('.gst').show();
		}
		else if($('#sgst').val()=="")
		{
			$('.sgst').html("Please fill sgst");
			$('.sgst').show();
		}
		 	

		else
		{
			updateourtaxvalue();			
		}		
	});

	
	function updateourtaxvalue()
	{		
		var form = $('#Formdata_details')[0];
		var data = new FormData(form);
		data.append("tax_id", tax_id);
		request = $.ajax({
				type: "POST",
				enctype: 'multipart/form-data',
				url: base_URL+'AdminController/updateourtaxvalues',
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
