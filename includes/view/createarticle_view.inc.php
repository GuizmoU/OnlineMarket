<?php

function handle_error() {
     if (isset($_SESSION["error"])) {
          echo("<p class='error'>" . $_SESSION["error"]["createarticle"] . "</p>");
          unset($_SESSION["error"]);
     }
}