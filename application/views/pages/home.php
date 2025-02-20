<div class="qr-page active" id="home">
    <!-- <section class="bg-gradient container-fluid">
        <div class="banner-text">
            <h2>Wedding invitations</h2>
            <p>Design beautiful invitations with matching RSVP cards. Download, print, send online, or order them professionally printed. So easy!</p>
        </div>
    </section>  -->
    <div id="demo" class="carousel slide carousel-fade" data-ride="carousel">  
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?= base_url() ?>assets/img/ban-1.png" alt="Los Angeles" class="d-block w-100">
        </div>
        <div class="carousel-item">
            <img src="<?= base_url() ?>assets/img/ban-2.png" alt="Chicago" class="d-block w-100">
        </div> 
    </div> 
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a> 
</div>

 

    <section class="odd-section">
        <div class="container" id="services">
            <h2 class="mb-0 mt-2 gradient-text">Our Services<h2> <br>
            <div class="row">
                <div class="offset-md-1 col-md-5 mb-2">
                    <a class="card qr-link" data-page="weddinginvitations">
                        <img src="<?= base_url() ?>assets/img/wedding.jpg" class="card-img-top" alt="wedding">
                        <div class="card-body">
                            <p class="card-title">Wedding QR</p>
                            <p class="card-content">Create your digital invitation here</p> 
                        </div>
                    </a>
                </div>
                <div class="col-md-5  mb-2">
                    <a class="card qr-link" data-page="businesscards">
                        <img src="<?= base_url() ?>assets/img/business.jpg" class="card-img-top" alt="wedding">
                        <div class="card-body">
                            <p class="card-title">Digital Business Card</p>
                            <p class="card-content">Create your Digital Business Card with interative features</p> 
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section> 
    <section class="even-section pt-4 pb-4 bg-img">
        <div class="container content" id="services">  
            <h2 class="mb-1 text-white mb-20">Our Services<h2> <br>
            <div class="row">
                <div class="col-md-3 col-6 mb-1 mt-1">
                    <a class="card qr-link" data-page="savedinvitationcards"> 
                        <div class="card-body">
                            <img class="threed-card-img" src="<?= base_url() ?>assets/img/folder.png" alt="img">
                            <p class="card-title">Saved <br> Invitation</p>
                            <!-- <p class="card-content">You can see all our saved invitation here</p>  -->
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-6 mb-1 mt-1">
                    <a class="card qr-link" data-page="savedbusinesscards"> 
                        <div class="card-body">
                            <img class="threed-card-img" src="<?= base_url() ?>assets/img/wedding-3d.png" alt="img">
                            <p class="card-title">Saved <br> Business Card</p>
                            <!-- <p class="card-content">You can see all our saved business card here</p>  -->
                        </div>
                    </a>
                </div> 
                <div class="col-md-3 col-6 mb-1 mt-1">
                    <a class="card qr-link" data-page="myinvitationcards">
                        <div class="card-body">
                        <img class="threed-card-img" src="<?= base_url() ?>assets/img/heart.png" alt="img">
                            <p class="card-title">My Digital <br> Invitation</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-6 mb-1 mt-1">
                    <a class="card qr-link" data-page="mybusinesscards">
                        <div class="card-body">
                            <img class="threed-card-img" src="<?= base_url() ?>assets/img/business-3d.png" alt="img">
                            <p class="card-title">My Digital <br> Business Card</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="odd-section">
        <div class="container" id="services"> 
            <h2 class="mb-0 mt-2 gradient-text">Buy Gifts<h2> <br>
            <div class="row" id="giftList">
            </div>
        </div>
    </section>

</div>