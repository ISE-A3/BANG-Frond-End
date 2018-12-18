<?php

require_once "phpfunctions.php";
require_once "connect.php";

if(isset($_POST['bewerk'])) {
    $oudeNaam = $_GET['artiest'];
    $nieuweNaam = '';
}
