<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invitation</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/inv/inv5/assets/index.css">
</head>
<body>
    <div class="inv-wrapper"> 
        <img class="bg-img" src="<?= base_url() ?>assets/inv/inv5/assets/bg.png" alt="img-bg"> 
        <div class="dynamic-content">
            <p class="mname"><?= $info->groom ?> </p>
            <img class="spliter-img" src="<?= base_url() ?>assets/inv/inv5/assets/and.png" alt="spliter-img">
            <p class="fname"><?= $info->bride ?> </p>
            <div class="inv-info"> 
                <div class="event-card">
                    <p><strong>Date:</strong> <?= $info->date ?> - <?= $info->month ?> - <?= $info->year ?></p>
                    <p><strong>Time:</strong> <?= $info->from ?> to <?= $info->to ?></p>
                    <p><strong>Contact:</strong>  <?= $info->contact ?></p>
                    <p><strong>Location:</strong> <?= $info->venue ?></p>
                    <p><a href="<?= $info->location ?>" target="_blank">Click to view location</a></p>
                  </div>
            </div>
        </div>
    </div>
</body>
</html>