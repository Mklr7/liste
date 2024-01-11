<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
var_dump($_COOKIE);
setcookie('utilisateur', 'mesut', time() + 60 * 60 * 24);





?>