<?php 
include "../bootstrap/init.php";
include "../bootstrap/cors.php";

if(!isAjaxRequest()){
    diePage('invalid request!');
}

if(insertLocation($_POST)){
    echo "مکان با موفقیت در پایگاه داده ثبت شد و منتظر تایید مدیر است.";
} else {
    echo "مشکلی در ثبت مکان پیش آمده است.";
}
