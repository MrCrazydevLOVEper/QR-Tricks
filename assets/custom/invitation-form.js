var imgURL;
$('[maxlength]').maxlength({
    alwaysShow: true,
    warningClass: 'form-text pr-3',
    limitReachedClass: 'form-text pr-3',
    placement: 'bottom-right-inside'
})
$("#wed-submit").click(function(){
    if($("#wed-groom").val() == ''){
        toastr.warning('Please enter groom');
    }
    else if($("#wed-bride").val() == ''){
        toastr.warning('Please enter bride');
    }
    else if($("#wed-date").val() == ''){
        toastr.warning('Please enter date');
    }
    else if($("#wed-month").val() == ''){
        toastr.warning('Please enter month');
    }
    else if($("#wed-year").val() == ''){
        toastr.warning('Please enter year');
    }
    else if($("#wed-from").val() == ''){
        toastr.warning('Please enter from time');
    }
    else if($("#wed-to").val() == ''){
        toastr.warning('Please enter to time');
    }
    else if($("#wed-venue").val() == ''){
        toastr.warning('Please enter venue');
    }
    else if($("#wed-contact").val() == ''){
        toastr.warning('Please enter contact');
    }  
    else if($("#wed-location").val() == ''){
        toastr.warning('Please enter location');
    }    
    else if($("#wed-message").val() == ''){
        toastr.warning('Please enter message');
    }   
    else if($("#wed-tandc").prop('checked') == false){
        toastr.warning('Please check terms and condition');
    }
    else{ 
        showDemoInformation();
    } 
}); 

function showDemoInformation(){
    $("#wed-invDemoInformation").modal("show");
    $("#wed-preview_groom").html($("#wed-groom").val());
    $("#wed-preview_bride").html($("#wed-bride").val());
    $("#wed-preview_date").html($("#wed-date").val()+'-'+$("#wed-month").val()+'-'+$("#wed-year").val());
    $("#wed-preview_time").html($("#wed-from").val()+'-'+$("#wed-to").val());
    $("#wed-preview_venue").html($("#wed-venue").val());
    $("#wed-preview_contact").html($("#wed-contact").val());
    $("#wed-preview_location").html($("#wed-location").val());
    $("#wed-preview_message").html($("#wed-message").val());
}

// $(".cancelModal").click(function(){
//     $(".modal").modal("hide");
// });

$("#wed-confirm").click(function(){
    $("#wed-invDemoInformation").modal("hide");
    createInvitation();
});

function createInvitation(){
    let token = localStorage.getItem("token");
    let data = new FormData($("#wed-invitation-from")[0]);
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
                $("#wed-copy-img").attr('data-url', imgURL);
                $("#wed-invInformation").modal("show");
                $("#wed-copy-link").val(imgURL);
                $("#wed-copy-img").each(function() {
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

$('#wed-download-image').click(function(event) {
    event.preventDefault(); 
    const canvas = $(`#wed-copy-img canvas`)[0]; // Get the canvas element of the QR code
    if (canvas) {
        const link = document.createElement('a');
        link.href = canvas.toDataURL('image/png');
        link.download = `invitation-qrcode.png`;
        link.click();
    } else {
        alert('QR code generation is still in progress. Please try again.');
    }
});
// $('#wed-download-image').click(function(){
//     location.href= base_URL + "Invitation/download_qr_code?v="+imgURL; 
// });

let wed_button = document.getElementById('wed-copy-btn');
wed_button.addEventListener('click', function (e) {
  e.preventDefault();
  document.execCommand('copy', false, document.getElementById('wed-copy-link').select());
  toastr.info("Link copied");
});