$(document).ready(function(){
    window.changePage = function(page){
        $(".qr-page").removeClass("active");
        $("#"+page).addClass("active");
        window.scrollTo(0, 0);
        $("body").attr("active-page", page); 
    }

    
    window.getSavedCards = function(page){
        let token = localStorage.getItem("token");
        $.ajax({
            type: "POST",
            url: base_URL + 'Invitation/getSavedCards',
            data : {token, page},
            success(res){
                let response = JSON.parse(res);
                if(response.status == "success"){ 
                    let invitation = response.inv; 
                    $('.saved_invitation, .saved-business-cards').html(` <div class="alert alert-secondary mt-4 p-4 text-center" role="alert"> No Saved Invitation Found!!! </div>`);   
                    if(invitation.length != 0){ 
                        let invElements = '';
                        if(page == "business"){ 
                            for(inv of invitation){
                                invElements += `
                                <div class="col-md-4 mb-3"> 
                                    <a class="card mb-3 mt-2 qr-link" data-page="businesscardsform" data-id="${inv.form_id}">
                                        <div class="fav fav-heart ${inv.present == 'yes' ? 'active' : ''}"></div>
                                        <img src="${base_URL}/admin/${inv.inv_img}" class="card-img-top" alt="businesscard">
                                        <div class="card-body">
                                            <p class="card-title">${inv.inv_name}</p>
                                            <p class="card-user-price">Price : &#8377;${inv.inv_user_price}</p>
                                            <p class="card-vendor-price">Price : &#8377;${inv.inv_vendor_price}</p>
                                        </div>
                                    </a>
                                </div>
                                `; 
                            } 
                            $('.saved-business-cards').html(invElements); 
                        }
                        else{
                            for(inv of invitation){
                                invElements += `
                                <div class="col-md-4 mb-3"> 
                                    <a class="card mb-3 mt-2 qr-link" data-page="weddingform" data-id="${inv.form_id}">
                                        <div class="fav fav-heart ${inv.present == 'yes' ? 'active' : ''}"></div>
                                        <img src="${base_URL}/admin/${inv.inv_img}" class="card-img-top" alt="wedding">
                                        <div class="card-body">
                                            <p class="card-title">${inv.inv_name}</p>
                                            <p class="card-user-price">Price : &#8377;${inv.inv_user_price}</p>
                                            <p class="card-vendor-price">Price : &#8377;${inv.inv_vendor_price}</p>
                                        </div>
                                    </a>
                                </div>
                                `; 
                            } 
                            $('.saved_invitation').html(invElements); 
                        }
                    }
                }  
            },
            error(){
                console.log("error : ")
            }
        });
    } 

    $(document).on('click', '.qr-link', function(){
        let page = $(this).data("page");
        if(page == "savedbusinesscards"){ 
            getSavedCards('business');
        }
        else if(page == "savedinvitationcards"){ 
            getSavedCards('wedding');
        }
        else if(page == "mybusinesscards"){ 
            getMyCards('business');
        }
        else if(page == "myinvitationcards"){ 
            getMyCards('wedding');
        }
        else if(page == "businesscardsform" || page == "weddingform"){
            invID = $(this).data("id");
        } 
        else if(page == "profile"){
            getUserInfo();
        }
        changePage(page);
        if(page == "savedbusinesscards" || page == "savedinvitationcards" || page == "mybusinesscards" || page == "myinvitationcards" || page == "weddinginvitations" || page == "businesscards"){
            let token = localStorage.getItem("token");
            fetch(base_URL + `Invitation/historyReport?page=${page}&token=${token}`)
        }
    });  
    
    function getMyCards(page){
        let token = localStorage.getItem("token");  
        $.ajax({
            type: "POST",
            url: base_URL + 'Invitation/getMyCards',
            data: {token,page},
            success(res){
                let response = JSON.parse(res);
                if(response.status == "success"){
                    let invidationList = '';
                    let invitations = response['data']; 
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
                                <div class="card-body text-center">
                                    <h5 class="card-title"> ${inv.form_id == '1' ? "Wedding QR" : "Business QR"}</h5>
                                    <p class="card-text text-bold"> ${inv.form_id == '1' ? info.groom +" - "+info.bride : info.business_name }</p>
                                    <button class="btn btn-sm btn-secondary download-btn" data-id="${inv.id}">Download</button>
                                </div>
                            </div>
                        </div>`;
                        }
                    }
                    if(page == "business"){
                        $('.my-business-cards').html(invidationList);
                    } 
                    else{ 
                        $('.my-invitation-cards').html(invidationList);
                    }
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
                    $('.my-business-cards, .my-invitation-cards').html(`<div class="alert alert-secondary mt-4 p-4 text-center" role="alert"> No Invitation Found!!! </div>`); 
                }
            },
            error(){
                console.log("error : ")
            }
        });
    } 
});
