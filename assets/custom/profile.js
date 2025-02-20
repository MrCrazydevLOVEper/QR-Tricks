$(document).ready(function(){
    window.getUserInfo = function(){
        let token = localStorage.getItem("token");  
        $.ajax({
            type: "POST",
            url: base_URL + 'Invitation/getUserInfo',
            data: {token},
            success(res){
                let response = JSON.parse(res);
                if(response.status == "success"){
                    let userData = response['data'][0];

                    // Vendor Functionality
                    let userType = userData.type == "V" ? "vendor" : "user";
                    let userTypeElement = ` <span class="userTypeElement">${userType}</span>`;
                    $('body').addClass(userType);
                    $('.user-name').html(userData["name"]+userTypeElement); 

                    let invidationList = '';
                    let invitations = userData.invitation;
                    if(invitations.length == 0){
                        invidationList = `<div class="alert alert-secondary" role="alert">
                        No Invitation Found!!!
                      </div>`;
                    }   
                    else{
                        for(let inv of invitations){
                            let info = JSON.parse(inv.info); 
                            invidationList +=`<div class="col-md-3 mt-4 mb-4">
                            <div class="card" style="width: 100%">
                                <div class="qr-image" id="qrcode-${inv.id}" data-url="${inv.custom_url}"></div>
                                <div class="card-body">
                                    <h5 class="card-title"> ${inv.form_id == '1' ? "Wedding QR" : "Business QR"}</h5>
                                    <p class="card-text text-bold"> ${inv.form_id == '1' ? info.groom +" - "+info.bride : info.business_name }</p>
                                    <button class="btn btn-sm btn-secondary download-btn" data-id="${inv.id}">Download</button>
                                </div>
                            </div>
                        </div>`;
                        }
                    }
                    $('#inv-list').html(invidationList); 
                    $('.qr-image').each(function() {
                        const url = $(this).data('url');
                        const qrContainer = $('<div>').appendTo($(this))[0];
                        const qr = new QRCode(qrContainer, {
                            text: url,
                            width: 128,
                            height: 128
                        });
                    }); 
                    // Add click event for download buttons
                    $('.download-btn').click(function(event) {
                        event.preventDefault();
                        const id = $(this).data('id');
                        const canvas = $(`#qrcode-${id} canvas`)[0]; // Get the canvas element of the QR code
                        if (canvas) {
                            const link = document.createElement('a');
                            link.href = canvas.toDataURL('image/png');
                            link.download = `qrcode-${id}.png`;
                            link.click();
                        } else {
                            alert('QR code generation is still in progress. Please try again.');
                        }
                    });
                }
                else{ 
                    changePage("login");
                    // toastr.warning(response.msg);
                }
            },
            error(){
                console.log("error : ")
            }
        });
    } 
    getUserInfo();
    $(".logout-btn").click(function(){
        localStorage.setItem("login_status","no");
        localStorage.removeItem("token");
        localStorage.removeItem("user_name");
        location.reload();
    });
});