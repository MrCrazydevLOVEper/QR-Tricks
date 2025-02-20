$(document).ready(function(){ 
    var regex = /^(0|91)?[6-9][0-9]{9}$/;
    // User Login start
    $("#loginBtn").click(function(){ 
        if($("#login-name").val() == ''){
            toastr.warning('Please enter name');
        }
        else if($("#login-mobile").val() == ''){
            toastr.warning('Please enter mobile number');
        }
        else if (regex.test($("#login-mobile").val()) == false) {
            toastr.warning('Please enter valid mobile number');
        }
        else{ 
            userLogin();
        } 
    }); 
    function userLogin(){
        let userData = new FormData($("#userLogin")[0]);
        $.ajax({
            url: base_URL + 'Invitation/userLogin',
            type : "POST",
            data : userData,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success(res){
                let response = JSON.parse(res);
                if(response.status == "success"){
                    toastr.success(response.msg);  
                    localStorage.setItem("token", response.token);
                    localStorage.setItem("user_name", response.user_name);
                    $('#userLogin').trigger("reset"); 
                    changePage("otp");
                }
                else{
                    toastr.warning(response.msg);
                }
            },
            error(e){
                console.log(e);
            }
        }); 

    }
    // User Login end
    // User Registration start
    $("#registerbtn").click(function(){ 
        if($("#reg-name").val() == ''){
            toastr.warning('Please enter name');
        }
        else if($("#reg-mobile").val() == ''){
            toastr.warning('Please enter mobile number');
        }
        else if (regex.test($("#reg-mobile").val()) == false) {
            toastr.warning('Please enter valid mobile number');
        }
        else if($("#reg-district").val() == ''){
            toastr.warning('Please enter district');
        }
        else if($("#reg-state").val() == ''){
            toastr.warning('Please enter state');
        }
        else{ 
            userRegistration();
        } 
    }); 
    function userRegistration(){
        let userData = new FormData($("#userRegistration")[0]);
        $.ajax({
            url: base_URL + 'Invitation/userRegistration',
            type : "POST",
            data : userData,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success(res){
                let response = JSON.parse(res);
                if(response.status == "success"){
                    toastr.success(response.msg);  
                    localStorage.setItem("token", response.token);
                    localStorage.setItem("user_name", response.user_name);
                    $('#userRegistration').trigger("reset"); 
                    changePage("otp");
                }
                else{
                    toastr.warning(response.msg);
                }
            },
            error(e){
                console.log(e);
            }
        }); 

    }
    // User Registration end
    // Vendor Registration start
    $("#vendorBtn").click(function(){  
        if($("#vendor-name").val() == ''){
            toastr.warning('Please enter name');
        }
        else if($("#vendor-business-name").val() == ''){
            toastr.warning('Please enter business name');
        }
        else if($("#vendor-business-address").val() == ''){
            toastr.warning('Please enter business address');
        }
        else if($("#vendor-mobile").val() == ''){
            toastr.warning('Please enter mobile number');
        }
        else if (regex.test($("#vendor-mobile").val()) == false) {
            toastr.warning('Please enter valid mobile number');
        }
        else if($("#vendor-district").val() == ''){
            toastr.warning('Please enter district');
        }
        else if($("#vendor-state").val() == ''){
            toastr.warning('Please enter state');
        }
        else{ 
            userVendorRegistration();
        } 
    });  
    function userVendorRegistration(){
        let userData = new FormData($("#vendorRegistration")[0]);
        $.ajax({
            url: base_URL + 'Invitation/vendorRegistration',
            type : "POST",
            data : userData,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success(res){
                let response = JSON.parse(res);
                if(response.status == "success"){
                    toastr.success(response.msg);  
                    localStorage.setItem("token", response.token);
                    localStorage.setItem("user_name", response.user_name);
                    $('#vendorRegistration').trigger("reset"); 
                    changePage("otp");
                }
                else{
                    toastr.warning(response.msg);
                }
            },
            error(e){
                console.log(e);
            }
        }); 

    }
    // Vendor Registration end
});
// OTP Functionality Start
function getCodeBoxElement(index) {
    return document.getElementById('codeBox' + index);
}
function onKeyUpEvent(index, event) {
    const eventCode = event.which || event.keyCode;
    if (getCodeBoxElement(index).value.length === 1) {
        if (index !== 4) {
        getCodeBoxElement(index+ 1).focus();
        } else {
        getCodeBoxElement(index).blur();
        // Submit code
        validateOTP();
        }
    }
    if (eventCode === 8 && index !== 1) {
        getCodeBoxElement(index - 1).focus();
    }
}
function onFocusEvent(index) {
    for (item = 1; item < index; item++) {
        const currentElement = getCodeBoxElement(item);
        if (!currentElement.value) {
        currentElement.focus();
        break;
        }
    }
}
// OTP Functionality end
// Validate OTP Start
function validateOTP(){
    let userData = new FormData($("#otp-form")[0]);
    userData.append("token", localStorage.getItem("token"));
    $.ajax({
        url: base_URL + 'Invitation/validateOTP',
        type : "POST",
        data : userData,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        success(res){
            let response = JSON.parse(res);
            if(response.status == "success"){
                toastr.success(response.msg);  
                localStorage.setItem("login_status", "yes"); 
                localStorage.setItem("token", response.token);
                localStorage.setItem("user_name", response.user_name);
                $('#otp-form').trigger("reset"); 
                changePage("home");
                updateSession();
                getUserInfo();
            }
            else{
                toastr.warning(response.msg);
            }
        },
        error(e){
            console.log(e);
        }
    }); 
}
// Validate OTP end
// Update Session Start
updateSession();
function updateSession(){
    let loginStatus = localStorage.getItem("login_status");
    if(loginStatus == "yes"){
        $('.loginbtn').hide();
        $('.accountbtn').show();
        $("#userName").text(localStorage.getItem("user_name"));
    }
    else{
        $('.accountbtn').hide();
        $('.loginbtn').show();
    }
}
// Update Session End