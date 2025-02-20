<div class="qr-page" id="otp">  
    <section class="odd-section">
        <div class="container mt-4">
            <div class="row">
                <div class="offset-md-4 col-md-4 mb-3">
                    <div class="credential-form mt-4"> 
                        <div class="navbar-brand qr-link mb-4" data-page="home">
                            <img src="<?= base_url() ?>assets/img/logo.png" height="50px">
                        </div>
                        <h2 class="mb-1 m-0 m-0">Verification<h2> 
                        <p class="m-0 mt-2 mb-4 fs-mid">You will get a OTP via SMS<p> 
                        <form class="mt-4" id="otp-form">
                        <section class="container-fluid mt-4">
                            <div class="row">
                                <div class="col-md-8 offset-md-2">
                                <form class="text-center">
                                    <div class="form-group"> 
                                        <div class="passcode-wrapper">
                                            <input id="codeBox1" type="number" name="otp[]" onkeyup="onKeyUpEvent(1, event)" onfocus="onFocusEvent(1)">
                                            <input id="codeBox2" type="number" name="otp[]" onkeyup="onKeyUpEvent(2, event)" onfocus="onFocusEvent(2)">
                                            <input id="codeBox3" type="number" name="otp[]" onkeyup="onKeyUpEvent(3, event)" onfocus="onFocusEvent(3)">
                                            <input id="codeBox4" type="number" name="otp[]" onkeyup="onKeyUpEvent(4, event)" onfocus="onFocusEvent(4)">
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                            </section>
                        </form>
                        <p class="fs-mid mt-4">New to QR Tricks? <b class="qr-link decor-underline" data-page="register"><a> Create an account</a></b></p>
                        <p class="fs-mid mt-4">Register as a <b class="qr-link decor-underline" data-page="vendor"><a>Vendor</a></b></p>
                    </div>
                </div> 
            </div>
        </div>
    </section>
</div>