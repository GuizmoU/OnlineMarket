<?php

ini_set("session.use_only_cookies", 1);
ini_set("session.use_strict_mode", 1);

session_set_cookie_params([
    "lifetime" => 1800,
    "domain" => "localhost",
    "path" => "/", // session marche partout
    "secure" => true, // marche seulement avec une connexion https
    "httponly" => true, // l'utilisateur ne puisse pas changer les cookies avec un script de hack
]);

session_start();

// changer l'id de la session chaque 30 minutes
//if (!isset($_SESSION["last_regeneration"])) {
    //var_dump($_SESSION["last_regeneration"]);
    //regenerate_session_id();
//} else {
    //$interval = 30 * 60;
    //if (time() - $_SESSION["last_regeneration"] >= $interval) {
        //regenerate_session_id();
    //}
//}

function regenerate_session_id() {
    session_regenerate_id();
    $_SESSION["last_regeneration"] = time();
}