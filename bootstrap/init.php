<?php
include  "constants.php";
include BASE_PATH . "bootstrap/config.php";
include BASE_PATH . "libs/lib-helpers.php";
include BASE_PATH . "libs/lib-locations.php";


try {
    $pdo = new PDO("mysql:dbname={$database_config->db};host={$database_config->host}", $database_config->user, $database_config->pass);
} catch (PDOException $e) {
    diePage("Connection failed: " . $e->getMessage());
    
}