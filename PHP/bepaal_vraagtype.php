<?php
/**
 * Created by PhpStorm.
 * User: anouk
 * Date: 4-1-2019
 * Time: 13:26
 */

session_start();

$_SESSION['VRAAGNAAM'] = $_POST['VRAAGNAAM'];
$_SESSION['AANTALANTWOORDOPTIES'] = $_POST['AANTALANTWOORDOPTIES'];

echo $_SESSION['AANTALANTWOORDOPTIES'];

if($_SESSION['AANTALVRAAGOPTIES'] = '"Ik wil een open vraag toevoegen"') {
    header('Location: openvraag_toevoegen.php');
}
else {
    header('Location: geslotenvraag_toevoegen.php');
}
