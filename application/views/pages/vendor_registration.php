<div class="qr-page" id="vendor"> 
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
                        <form class="mt-3" id="vendorRegistration">
                            <div class="form-group">
                                <label class="fs-mid m-0 p-0 mb-2 align-left" for="vendor-name">Name</label>
                                <input type="email" class="form-control" id="vendor-name" name="vendor-name"> 
                            </div> 
                            <div class="form-group">
                                <label class="fs-mid m-0 p-0 mb-2 align-left mt-3" for="vendor-business-name">Business Name</label>
                                <input type="email" class="form-control" id="vendor-business-name"  name="vendor-business-name"> 
                            </div> 
                            <div class="form-group">
                                <label class="fs-mid m-0 p-0 mb-2 align-left mt-3" for="vendor-business-address">Business Address</label>
                                <input type="email" class="form-control" id="vendor-business-address" name="vendor-business-address"> 
                            </div> 
                            <div class="form-group">
                                <label class="fs-mid m-0 p-0 mb-2 mt-3 align-left" for="vendor-mobile">Contact</label> 
                            </div> 
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">  <div class="input-group-text br-0">+91</div></div>
                                <input type="text" class="form-control" id="vendor-mobile" name="vendor-mobile">
                            </div>
                            <div class="form-group mb-2">
                                <label class="fs-mid m-0 p-0 mb-2 align-left" for="vendor-district">District</label>
                                <input type="email" class="form-control" id="vendor-district" name="vendor-district"> 
                            </div> 
                            <div class="form-group">
                                <label class="fs-mid m-0 p-0 mb-2 align-left" for="vendor-state">State</label>
                                <input type="email" class="form-control" id="vendor-state" name="vendor-state"> 
                            </div> 
                            <div class="form-group align-right">
                                <button type="button" class="btn btn-warning mt-3" id="vendorBtn">Register</button>
                            </div> 
                        </form>
                        <p class="fs-mid mt-4">Already have an account? <b class="qr-link decor-underline" data-page="login"><a> Login</a></b></p>
                    </div>
                </div> 
            </div>
        </div>
    </section>
</div>