<?php
    $infoencode = $data["info"];
    $info = json_decode($infoencode);
    $form_id = $info->form_id; 
    if($form_id == 1) include("invitations/inv1.php");
    else if($form_id == 2) include("invitations/inv2.php"); 
?>
