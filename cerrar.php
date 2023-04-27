<?php

$url_base = "http://localhost/project_stages/";

session_start();
session_destroy();
header("location:".$url_base."sections/index.php");


?>