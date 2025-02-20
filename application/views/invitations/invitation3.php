<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invitation</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/inv/inv3/assets/index.css">
</head>
<body>
    <div class="inv-wrapper"> 
        <img class="bg-img" src="<?= base_url() ?>assets/inv/inv3/assets/bg.png" alt="img-bg"> 
        <div class="dynamic-content">
            <p class="mname"> <?= $info->groom ?> </p>
            <img class="spliter-img" src="<?= base_url() ?>assets/inv/inv3/assets/and.png" alt="spliter-img">
            <p class="fname"><?= $info->bride ?> </p>
            <p class="location"><a href="<?= $info->location ?>" target="_blank">Click to view location</a></p>
            <div class="inv-info"> 
                <div class="event-card left">
                    <p>Date: <br>  <?= $info->date ?> - <?= $info->month ?> - <?= $info->year ?></p>
                    <p>Time: <br> <?= $info->from ?> to <?= $info->to ?></p>
                </div>
                <div class="event-card right">
                    <p>Contact: <br> <?= $info->contact ?></p>
                    <p>Location: <br> <?= $info->venue ?></p> 
                </div>
            </div>
        </div>
    </div>
</body>
</html>