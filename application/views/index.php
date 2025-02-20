<?php require("component/head.php") ?>
<body active-page="home">
<?php require("component/menu.php") ?>
    <div id="page">
        <?php include("pages/home.php") ?>
        <?php include("pages/business_cards.php") ?>
        <?php include("pages/business_card_form.php") ?>
        <?php include("pages/wedding_invitation.php") ?>
        <?php include("pages/wedding_form.php") ?>
        <?php include("pages/login.php") ?>
        <?php include("pages/registration.php") ?>
        <?php include("pages/vendor_registration.php") ?>
        <?php include("pages/otp.php") ?>
        <?php include("pages/profile.php") ?>
        <?php include("pages/saved_business_cards.php") ?>
        <?php include("pages/saved_invitation.php") ?>
        <?php include("pages/my_invitation.php") ?>
        <?php include("pages/my_business_cards.php") ?>
    </div>
<?php require("component/footer.php") ?>
</body>
</html>