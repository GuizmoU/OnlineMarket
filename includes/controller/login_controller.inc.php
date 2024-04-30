<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    echo "Connecting...";
} else {
    header("Location: ../../pages/Login.php");
}