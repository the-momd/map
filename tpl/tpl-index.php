<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>7map</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
    <link rel="stylesheet" href="assets/css/styles.css<?= '?v=' . rand(99,9999999) ?>">
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
</head>
<body>
    <div class="main">
        <div class="head">
            <input type="text" id="search" placeholder="دنبال کجا می‌گردی؟">
        </div>
        <div class="mapContainer">
            <div id="map" style="height: 600px;"></div>
        </div>
    </div>
    <div class="modal-overlay" style="display: none;">
        <div class="modal">
            <span class="close">x</span>
            <h3 class="modal-title">ثبت لوکیشن</h3>
            <div class="modal-content">
                <form id='addLocationForm' action="<?= site_url('process/addLocation.php') ?>" method="post">
                <div class="field-row">
                            <div class="field-title">مختصات</div>
                            <div class="field-content">
                                <input type="text" id="lat-display" name="lat" readonly style="width: 160px; text-align:center">
                                <input type="text" id="lng-display" name="lng" readonly style="width: 160px; text-align:center">
                            </div>
                    </div>
                    <div class="field-row">
                            <div class="field-title">نام مکان</div>
                            <div class="field-content">
                                <input type="text" name="title" id='l-title' placeholder="مثلا: دفتر مرکزی سون لرن">
                            </div>
                    </div>
                    <div class="field-row">
                        <div class="field-title">نوع</div>
                        <div class="field-content">
                            <select name="type" id="l-type">
                            <?php foreach(locationTypes as $key=>$value): ?>
                            <option value="<?=$key?>"><?=$value?></option>
                            <?php endforeach;  ?>
                            </select>
                        </div>
                    </div>
                    <div class="field-row">
                        <div class="field-title">ذخیره نهایی</div>
                        <div class="field-content">
                            <input type="submit" value=" ثبت ">
                        </div>
                    </div>
                    <div class="ajax-result"></div>
                </form>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>
</html>
