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
    $_SESSION['VRAAGSOORT'] = 'OPEN';
    header('Location: openvraag_toevoegen.php');
}
else {
    $_SESSION['VRAAGSOORT'] = 'GESLOTEN';
    header('Location: geslotenvraag_toevoegen.php');
}
