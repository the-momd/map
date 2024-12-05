<?php 
include "../bootstrap/init.php";
include "../bootstrap/cors.php";

if(!isAjaxRequest()){
    diePage('invalid request!');
}

if(is_null($_POST['loc']) or !is_numeric($_POST['loc'])){
    echo "Invalid Location";
    die();
}

$location_id = $_POST['loc'];
echo toggleStatus($_POST['loc']);

