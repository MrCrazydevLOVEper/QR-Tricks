<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>QR Tricks</title>
<link rel="stylesheet" href="<?=base_url() ?>assets/icofont/icofont.min.css">
<style>
    /* @import url('https://fonts.googleapis.com/css2?family=Pacifico&display=swap'); */
    /* @import url('https://fonts.googleapis.com/css2?family=Hind+Madurai:wght@300;400;500;600;700&family=Marhey:wght@300..700&family=Oleo+Script+Swash+Caps:wght@400;700&display=swap'); */
    :root{
        --fs1 : 16px;
        --fs2 : 27px;
        --fs3 : 40px;
    }
    body{
        padding:0px;
        margin:0px;
    }
    #invitation{
        margin: auto; 
        display: flex;
        justify-content: center; 
        /* background-repeat: no-repeat; */
        background-size: cover;
        background: #91ff0045;
    }
    .information{
        max-width: 600px;
        width: 100%;
        background: url(https://img.freepik.com/free-photo/abstract-orange-background-layout-designstudioroom-web-template-business-report-with-smooth-circle-gradient-color_1258-101756.jpg?t=st=1710608972~exp=1710612572~hmac=47b29cce4c195a6680b9709e6e1247234a885befd2b580b7372a6a4d3d40a24e&w=740);
        text-align: center;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        /* padding: 100px 0px; */
        border: 3px solid #dd4f07;
        position: relative;
    }
    p{
        margin:0px;
        text-transform: CAPITALIZE;
        margin-bottom: var(--fs1);
        font-family: "Oleo Script Swash Caps", system-ui;
    }
    .information .logo{
        height:100px;
    }
    .business_name {
        font-weight: bold;
        border-bottom: 5px solid #000;
        padding-bottom: 13px;
        margin: 10px 0px; 
        font-size: var(--fs3);
    }
    .owner_name{
        font-weight: bold;   
        font-size: var(--fs2);
        margin-bottom: 10px; 
    }
    .founder{   
        font-size: var(--fs1);
        margin-bottom: 10px; 
    }
    .link-container a{
        width: 30px;
        height: 30px;
        display: inline-block;
        position: relative;
        text-decoration: none;
        color: #fff;
        background: #c6a55d;
        line-height: 30px;
        padding: 2px;
        border-radius: 8px;
        margin: 0px 2px;
    }
    .flex-center{
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }
    .about-container .key{
        font-weight:bold;
        min-width: 110px;
        display: inline-block;
        text-align: left;
    }
    span.value {
        text-align: left;
    }
    .w100{
        width:100%;
    }
    p.custom-flex {
        display: flex;
    }
    .about-container.flex-center {
        padding: 5px 15px;
    }
    .map-link img{
        height: 100px;
    }
    .lh-100{
        line-height: 100px;
    }
</style>
</head>
<body> 
    <div class="invitation-container">
        <div id="invitation">
            <div class="information"> 
                <img class="logo" src="<?=base_url().$info->file ?>">
                <p class="business_name"><?= $info->business_name ?></p>  
                <p class="owner_name"><?= $info->owner_name ?></p> 
                <p class="founder">CEO & FOUNDER </p>  
                <div class="link-container">
                    <a href="<?= $info->wano ?>"><i class="icofont-whatsapp"></i></a>
                    <a href="<?= $info->fb ?>"><i class="icofont-facebook"></i></a>
                    <a href="<?= $info->insta ?>"><i class="icofont-instagram"></i></a>
                    <a href="<?= $info->yt ?>"><i class="icofont-youtube-play"></i></a>
                    <a href="<?= $info->twitter ?>"><i class="icofont-twitter"></i></a> 
                </div> 
                <div class="about-container flex-center">
                    <h3 class="title w100">ABOUT US</h3>
                    <p class="custom-flex"> <span class="key">START DATE </span><span class="value">: <?= $info->date ?> - <?= $info->month ?> - <?= $info->year ?></span></p>
                    <p class="custom-flex"> <span class="key">TIME </span><span class="value">: <?= $info->from ?> to <?= $info->to ?></span></p>
                    <p class="custom-flex"> <span class="key">ADDRESS </span><span class="value">: <?= $info->address ?></span></p> 
                    <p class="custom-flex"> <span class="key">DESCRIPTION </span><span class="value">: <?= $info->message ?></span></p>
                    <p class="custom-flex lh-100"> <span class="key"> LOCATION  </span><span class="value"> <a class="map-link" href="<?= $info->location ?>"> <img src="<?=base_url() ?>assets/inv/map1.png"> </a>  </span></p>
                </div> 
            <div>
        </div> 
    </div>
</body>
</html>