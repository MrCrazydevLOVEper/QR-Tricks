<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>QR Tricks</title>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Pacifico&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Hind+Madurai:wght@300;400;500;600;700&family=Marhey:wght@300..700&family=Oleo+Script+Swash+Caps:wght@400;700&display=swap');
    :root{
        --fs1 : 22px;
        --fs2 : 27px;
        --fs3 : 40px;
    }
    body{
        padding:0px;
        margin:0px;
    }
    #invitation{
        background: #dff9ff;
        margin: auto;
        display: flex;
        justify-content: center;
    }
    .information{
        max-width: 600px;
        width: 100%;
        background: #d1e5ff;
        text-align: center;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 100px 0px;
        border: 3px solid #c9e0e5;
        position: relative;
    }
    p{
        margin:0px;
        text-transform: CAPITALIZE;
        margin-bottom: var(--fs1);
        font-family: "Oleo Script Swash Caps", system-ui;
    }
    .sub-title{
        font-weight: 100;
        font-size: var(--fs1);
    }
    .title{
        font-weight: bold;
        font-size: var(--fs2);
    }
    .groom{
        font-size: var(--fs3);
        font-weight: 900;
        font-family: "pacifico", system-ui;
        text-transform: CAPITALIZE;
        color:#541d87;
        margin-bottom: 0px;
    }
    .and{
        font-size: var(--fs2);
        color:#541d87;
    }
    .bride{
        font-size: var(--fs3);
        font-weight: 900;
        font-family: "pacifico", system-ui;
        text-transform: CAPITALIZE;
        color:#541d87;
    }
    .date-time{
        font-weight: 800;
        font-size: var(--fs1);
    }
    .venue{
        width: 75%;
        font-size: var(--fs1);
    }
    .message{
        width: 75%;
        font-size: var(--fs1);
    }
    .location{
        font-size: var(--fs1);
    }
    .location a{
        font-size: var(--fs1);
        background: white;
        outline: none;
        border: 2px solid #ed9dab;
        padding: 4px 10px;
        border-radius: 16px;
    }
    .contact{
        font-size: var(--fs1);
    }
    .top-img{
        height: 100px;
        position: absolute;
        top: 0px;
        right: 0px;
    }
    .bottom-img{
        height: 100px;
        position: absolute;
        bottom: 0px;
        left: 0px;
    }
    .main-img{
        width:100px;
    }
    
</style>
</head>
<body> 
    <div class="invitation-container">
        <div id="invitation">
            <div class="information">
                <img class="top-img" src="https://imgs.search.brave.com/Svab_OFRe5wIPKwOfouQx2g-KYfB7yXvCPmEpXOM2ps/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9wbmdm/cmUuY29tL3dwLWNv/bnRlbnQvdXBsb2Fk/cy9yb3NlLTYyLTI5/NHgzMDAucG5n" alt="text">
                <img class="bottom-img" src="https://imgs.search.brave.com/0tv2fmosBKIh43t6Ke1NM_yQtFCM-zwYkWpeKdISWNo/rs:fit:500:0:0/g:ce/aHR0cHM6Ly93d3cu/cG5nbWFydC5jb20v/ZmlsZXMvNi9NYXJy/aWFnZS1QTkctVHJh/bnNwYXJlbnQtUGlj/dHVyZS0xLnBuZw" alt="text">
                <p class="sub-title">You are cordially invited to</p>
                <p class="title">the wedding of</p>
                <p class="groom"><?= $info->groom ?></p>
                <img class="main-img" src="https://imgs.search.brave.com/PPTghnD3K8HgGShwGB-jFvsORKzA9dIk3g_rbNicwKc/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9wbHVz/cG5nLmNvbS9pbWct/cG5nL3dlZGRpbmct/cG5nLWhkLWZyZWUt/ZG93bmxvYWQtY2xp/cC1hcnRzLXJlbGF0/ZWQtdG8td2VkZGlu/Zy1wbmctaGQtMTky/MC5wbmc" alt="">
                <p class="bride"><?= $info->bride ?></p>
                <p class="date-time"><?= $info->date ?> - <?= $info->month ?> - <?= $info->year ?> | <?= $info->from ?> to <?= $info->to ?></p>
                <p class="venue"><?= $info->venue ?></p>
                <p class="message"><?= $info->message ?></p>
                <p class="location">Location : <a href="<?= $info->location ?>" target="_blank">click to view location</a></p>
                <p class="contact">Contact : <?= $info->contact ?></p>
            <div>
        </div> 
    </div>
</body>
</html>