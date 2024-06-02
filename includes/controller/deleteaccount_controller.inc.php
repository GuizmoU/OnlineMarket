
<?php


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // requires
    require_once "../config_session.inc.php";
    require_once "../model/deleteaccount_model.php";
    require_once "../dbh.inc.php";

    try {
        deleteAccount($pdo);
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
    header("location: ../../index.php");
}