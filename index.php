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
            <div id="map"></div>
        </div>
    </div>

    <script src="assets/js/scripts.js<?= '?v=' . rand(99,9999999) ?>"></script>

</body>
</html>
