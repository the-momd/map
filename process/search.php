<?php 
include "../bootstrap/init.php";
include "../bootstrap/cors.php";

usleep(500000); // 0.5 second delay on script
if(!isAjaxRequest()){
    diePage('invalid request!');
}

$keyword = $_POST['keyword'];
if(!isset($keyword) or empty($keyword)){
    die('شروع به تایپ کردن کنید');
}

$locations = getLocations(['keyword'=>$keyword]);
if(sizeof($locations)==0){
    die('نتیجه ای یافت نشد');
}
foreach($locations as $loc){
    echo "<a href='".BASE_URL."?loc=$loc->id'> <div class='result-item' data-lat='$loc->lat' data-lng='$loc->lng' data-loc='$loc->id'>
            <span class='loc-type'>".locationTypes[$loc->type]."</span>
            <span class='loc-title'>$loc->title</span>
        </div></a>";
}

# for showing these records above, the alternative and better way is down below:
    # send header content tyle json
    # echo json_encode($locations);