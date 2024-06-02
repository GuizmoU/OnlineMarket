<?php


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // requires
    require_once "../config_session.inc.php";

    unset($_SESSION["user_id"]);
    header("location: ../../index.php");
}
