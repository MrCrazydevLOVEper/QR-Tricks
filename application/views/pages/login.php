<div class="qr-page" id="login">  
    <section class="odd-section">
        <div class="container mt-4">
            <div class="row">
                <div class="offset-md-4 col-md-4 mb-3">
                    <div class="credential-form mt-4"> 
                        <div class="navbar-brand qr-link mb-4" data-page="home">
                            <img src="<?= base_url() ?>assets/img/logo.png" height="50px">
                        </div>
                        <h2 class="mb-1 m-0 m-0">Welcome<h2> 
                        <p class="m-0 mt-2 mb-3 fs-mid">Sign in to access Your Account<p> 
                        <form class="mt-3" id="userLogin">
                            <div class="form-group">
                                <label class="fs-mid m-0 p-0 mb-2 align-left" for="login-name">Name</label>
                                <input type="text" class="form-control" id="login-name" name="login-name"> 
                            </div> 
                            <div class="form-group">
                                <label class="fs-mid m-0 p-0 mb-2 mt-3 align-left" for="login-mobile">Mobile Number</label> 
                            </div> 
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">  <div class="input-group-text br-0">+91</div></div>
                                <input type="number" class="form-control" id="login-mobile" name="login-mobile">
                            </div>
                            <div class="form-group align-right">
                                <button type="button" class="btn btn-warning mt-3" id="loginBtn">Send OTP</button>
                            </div> 
                        </form>
                        <p class="fs-mid mt-4">New to QR Tricks? <b class="qr-link decor-underline" data-page="register"><a> Create an account</a></b></p>
                        <p class="fs-mid mt-4">Register as a <b class="qr-link decor-underline" data-page="vendor"><a>Vendor</a></b></p>
                    </div>
                </div> 
            </div>
        </div>
    </section>
</div>