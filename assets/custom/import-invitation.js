$(document).ready(function(){
    function getAllInvitation(){ 
        let token = localStorage.getItem("token");
        $.ajax({
            type: "POST",
            url: base_URL + 'Invitation/getAllInvitation',
            data : {token},
            success(res){
                let response = JSON.parse(res);
                if(response.status == "success"){ 
                    let business = response.business;
                    let wedding = response.wedding;
                    if(business.length != 0){ 
                        let invElements = '';
                        for(inv of business){
                            invElements += `
                            <div class="col-md-4"> 
                                <a class="card mb-3 mt-2 qr-link" data-page="businesscardsform" data-id="${inv.form_id}">
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
                        $('.business-cards').html(invElements); 
                    }
                    if(wedding.length != 0){
                        let invElements = '';
                        for(inv of wedding){
                            invElements += `
                            <div class="col-md-4">
                                <a class="card mb-3 mt-2 qr-link" data-page="weddingform" data-id="${inv.form_id}">
                                    <div class="fav fav-heart ${inv.present == 'yes' ? 'active' : ''}"></div>
                                    <img src="${base_URL}/admin/${inv.inv_img}" class="card-img-top" alt="wedding">
                                    <div class="card-body">
                                        <p class="card-title">${inv.inv_name}</p>
                                        <p class="card-user-price">Price : &#8377;${inv.inv_user_price}</p>
                                        <p class="card-vendor-price">Price : &#8377; ${inv.inv_vendor_price}</p>
                                    </div>
                                </a>
                            </div>
                            `; 
                        } 
                        $('.wedding-cards').html(invElements); 
                    }
                }
            },
            error(){
                console.log("error : ")
            }
        });
    } 
    getAllInvitation();
    $(document).on('click touchstart', '.fav', function(e){
        e.stopPropagation();
        let elem = $(this);
        elem.toggleClass('is-animating'); 
        let token = localStorage.getItem("token");
        let invitationId = elem.closest('a').data('id');  
        let page = elem.closest('a').data("page"); 
        $.ajax({
            url: base_URL + 'Invitation/savedList',
            type: 'POST',
            data: {
                token,
                invitation_id: invitationId
            },
            success: function(response) {
                let res = JSON.parse(response); 
                if(res.status == 'success') {
                    elem.toggleClass('active');
                } 
                if(page == "businesscardsform") getSavedCards('business');
                else getSavedCards('wedding'); 
            },
            error: function() {
                console.log('AJAX error');
            }
        });
    });
    $(document).on('animationend', '.fav', function(e){
        e.stopPropagation();
        $(this).toggleClass('is-animating');
    });
    getGiftList();
    function getGiftList(){ 
        $.ajax({
            type: "GET",
            url: base_URL + 'Invitation/getGift',
            success(res){
                let gift = JSON.parse(res); 
                if(gift.length != 0){ 
                        let giftList = '';
                        for(g of gift){
                            giftList += `
                                <div class="col-md-4 col-6 mb-3">
                                    <a class="card" href="${g.link}" target="_blank">
                                        <img src="${base_URL+'admin/'+g.image}" class="card-img-top" alt="wedding">
                                        <div class="card-body">
                                            <p class="card-title">${g.name}</p>  
                                        </div>
                                    </a>
                                </div>
                            `; 
                        } 
                        $('#giftList').html(giftList); 
                }
                else{

                }
            },
            error(){
                console.log("error : ")
            }
        });
    }
});