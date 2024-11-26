<?php

defined('BASE_PATH') OR die("premition denied!");

function getCurrentUrl(){
    return 1;
}

function isAjaxRequest(){
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        // This is an AJAX request
        return true;
    } else {
        // This is not an AJAX request
        return false;
    }
        
}

function site_url($uri = ''){
    return BASE_URL . $uri;
}

function redirect($url){
    header("Location: $url");
    die();
}

function diePage($msg){
    echo "<div style='padding: 30px; width: 80%; margin: 0 auto; background: #f68d8d; border-radius: 5px; border: 1px solid; border-color: red; font-family: sans-serif; text-align: center;'>$msg</div>";
    die();
}

function message($msg, $cssClass = 'info'){
    echo "<div class='$cssClass' style='padding: 20px; width: 80%; margin: 0 auto; background: #f68d8d; border-radius: 5px; border: 1px solid; border-color: red; font-family: sans-serif; text-align: center;'>" . htmlspecialchars_decode($msg) . "</div>";
}



function dd($var){
    echo "<pre style='color:#d40202; background: #fefbfb; z-index:999; position:relative; padding:10px; margin:10px; border-radius:5px; border-left:3px solid red;'>";
    var_dump($var);
    echo "</pre>";
}