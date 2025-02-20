<div class="qr-page " id="register"> 
    <!-- <div class="navbar fixed-top navbar-expand-sm navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand qr-link" data-page="home">
                <img src="<?= base_url() ?>assets/img/logo.png" height="30px">
            </a>
            <button class="btn btn-primary qr-link" data-page="home" type="button">Home</button>
        </div>
    </div> -->
    <section class="odd-section">
        <div class="container mt-4">
            <div class="row">
                <div class="offset-md-4 col-md-4 mb-3">
                    <div class="credential-form mt-4"> 
                        <div class="navbar-brand qr-link mb-4" data-page="home">
                            <img src="<?= base_url() ?>assets/img/logo.png" height="50px">
                        </div>
                        <h2 class="mb-1 m-0 m-0">Create an Account<h2> 
                        <p class="m-0 mt-2 mb-3 fs-mid">Welcome to Our Family<p> 
                        <form class="mt-3" id="userRegistration">
                            <div class="form-group">
                                <label class="fs-mid m-0 p-0 mb-2 align-left" for="reg-name">Name</label>
                                <input type="email" class="form-control" id="reg-name" name="name"> 
                            </div> 
                            <div class="form-group">
                                <label class="fs-mid m-0 p-0 mb-2 mt-3 align-left" for="reg-mobile">Mobile Number</label> 
                            </div> 
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">  <div class="input-group-text br-0">+91</div></div>
                                <input type="number" class="form-control" id="reg-mobile" name="mobile">
                            </div>
                            <div class="form-group mb-2">
                                <label class="fs-mid m-0 p-0 mb-2 align-left" for="reg-district">District</label>
                                <input type="email" class="form-control" id="reg-district" name="district"> 
                            </div> 
                            <div class="form-group">
                                <label class="fs-mid m-0 p-0 mb-2 align-left" for="reg-state">State</label>
                                <input type="email" class="form-control" id="reg-state" name="state"> 
                            </div> 
                            <div class="form-group align-right">
                                <button type="button" class="btn btn-warning mt-3" id="registerbtn">Register</button>
                            </div> 
                        </form>
                        <p class="fs-mid mt-4">Already have an account? <b class="qr-link decor-underline" data-page="login"><a> Login</a></b></p>
                        <p class="fs-mid mt-4">Register as a <b class="qr-link decor-underline" data-page="vendor"><a>Vendor</a></b></p>
                    </div>
                </div> 
            </div>
        </div>
    </section>
</div>