<?php

require_once "../config_session.inc.php";
require_once "../model/details_model.php";
require_once "../dbh.inc.php";

addArticle($_GET["id"], $pdo);

header("Location: ../../index.php");