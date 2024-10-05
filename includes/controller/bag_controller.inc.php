<?php
// requires
require_once "../config_session.inc.php";
require_once "../model/bag_model.php";
require_once "../dbh.inc.php";

supressArticle($_GET["id"], $pdo);

header("Location: ../../pages/Bag.php");