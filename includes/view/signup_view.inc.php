<?php


function handle_error() {
     if (isset($_SESSION["error"])) {
          echo("<p class='error'>" . $_SESSION["error"]["signup"] . "</p>");
          unset($_SESSION["error"]);
     }
}

