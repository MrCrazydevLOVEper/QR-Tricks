var imgURL;
$('[maxlength]').maxlength({
    alwaysShow: true,
    warningClass: 'form-text pr-3',
    limitReachedClass: 'form-text pr-3',
    placement: 'bottom-right-inside'
});
$("#submit").click(function(){
    if($("#file").val() == ''){
        toastr.warning('Please upload a file');
    }
    else if($("#owner_name").val() == ''){
        toastr.warning('Please enter owner name ');
    }
    else if($("#business_name").val() == ''){
        toastr.warning('Please enter business name');
    }
    else if($("#date").val() == ''){
        toastr.warning('Please enter date');
    }
    else if($("#month").val() == ''){
        toastr.warning('Please enter month');
    }
    else if($("#year").val() == ''){
        toastr.warning('Please enter year');
    }
    else if($("#from").val() == ''){
        toastr.warning('Please enter from time');
    }
    else if($("#to").val() == ''){
        toastr.warning('Please enter to time');
    }
    else if($("#address").val() == ''){
        toastr.warning('Please enter address');
    }
    else if($("#wano").val() == ''){
        toastr.warning('Please enter whatsapp number');
    }
    else if($("#fb").val() == ''){
        toastr.warning('Please enter facebook link');
    }  
    else if($("#insta").val() == ''){
        toastr.warning('Please enter instagram link');
    }    
    else if($("#yt").val() == ''){
        toastr.warning('Please enter youtube link');
    }   
    else if($("#twitter").val() == ''){
        toastr.warning('Please enter twitter link');
    }   
    else if($("#location").val() == ''){
        toastr.warning('Please enter location');
    }   
    else if($("#message").val() == ''){
        toastr.warning('Please enter message');
    }  
    else if($("#tandc").prop('checked') == false){
        toastr.warning('Please check terms and condition');
    }
    else{  
        showWedDemoInformation();
    } 
}); 

function showWedDemoInformation(){
    $("#invDemoInformation").modal("show");
    $("#preview_owner_name").html($("#owner_name").val());
    $("#preview_business_name").html($("#business_name").val());
    $("#preview_date").html($("#date").val()+'-'+$("#month").val()+'-'+$("#year").val());
    $("#preview_time").html($("#from").val()+'-'+$("#to").val());
    $("#preview_address").html($("#address").val());
    $("#preview_wano").html($("#wano").val());
    $("#preview_fb").html($("#fb").val());
    $("#preview_insta").html($("#insta").val());
    $("#preview_yt").html($("#yt").val());
    $("#preview_twitter").html($("#twitter").val());
    $("#preview_location").html($("#location").val());
    $("#preview_message").html($("#message").val());
}

$(".cancelModal").click(function(){
    $(".modal").modal("hide");
});

$("#confirm").click(function(){
    $("#invDemoInformation").modal("hide");
    createWedInvitation();
});

function createWedInvitation(){
    let token = localStorage.getItem("token");
    let data = new FormData($("#invitation-from")[0]);
    data.append("token",token);
    data.append("form_id",invID);
    $.ajax({
        type: "POST",
        url: base_URL + 'Invitation/createInvitation',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        success(res){
            let response = JSON.parse(res);
            if(response.status == "success"){  
                toastr.success('Qr code created. Please Wait!'); 
                imgURL = response['url'];   
                $("#copy-img").attr('data-url', imgURL);
                $("#invInformation").modal("show");
                $("#copy-link").val(imgURL);
                $("#copy-img").each(function() {
                    const url = $(this).data('url');
                    const qrContainer = $('<div>').appendTo($(this))[0];
                    const qr = new QRCode(qrContainer, {
                        text: url,
                        width: 128,
                        height: 128
                    });
                }); 
            }
            else{
                toastr.warning(response.msg);
            }
        },
        error(){
            console.log("error : ")
        }
    });
}

$('#business-download-image').click(function(event) {
    event.preventDefault(); 
    const canvas = $(`#copy-img canvas`)[0]; // Get the canvas element of the QR code
    if (canvas) {
        const link = document.createElement('a');
        link.href = canvas.toDataURL('image/png');
        link.download = `business-qrcode.png`;
        link.click();
    } else {
        alert('QR code generation is still in progress. Please try again.');
    }
});

let button = document.getElementById('copy-btn');
button.addEventListener('click', function (e) {
  e.preventDefault();
  document.execCommand('copy', false, document.getElementById('copy-link').select());
  toastr.info("Link copied");
});