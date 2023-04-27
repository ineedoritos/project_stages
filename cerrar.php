<?php

$url_base = "http://localhost/digit/";

session_start();
session_destroy();
header("location:".$url_base."sections/index.php");


?>