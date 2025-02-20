<?php
    $infoencode = $data["info"];
    $info = json_decode($infoencode);
    $form_id = $info->form_id;   
    // if($form_id == 1) include("invitations/inv1.php");
    // else if($form_id == 2) include("invitations/inv2.php"); 
    if($form_id == 1) include("invitations/invitation1.php");
    else if($form_id == 2) include("invitations/invitation2.php");
    else if($form_id == 3) include("invitations/invitation3.php");
    else if($form_id == 4) include("invitations/invitation4.php");
    else if($form_id == 5) include("invitations/invitation5.php");
    else if($form_id == 6) include("invitations/invitation6.php");
    else if($form_id == 7) include("invitations/invitation7.php");
    else if($form_id == 8) include("invitations/invitation8.php");
    else if($form_id == 9) include("invitations/invitation9.php");
    else if($form_id == 10) include("invitations/invitation10.php");
    
    

?>
