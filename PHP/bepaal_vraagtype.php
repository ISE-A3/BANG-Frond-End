<?php
/**
 * Created by PhpStorm.
 * User: anouk
 * Date: 4-1-2019
 * Time: 13:26
 */

session_start();
echo $_SESSION['AANTALANTWOORDOPTIES'];

if($_SESSION['AANTALANTWOORDOPTIES'] == 'OPEN') {
    $_SESSION['VRAAGSOORT'] = 'O';
    header('Location: openvraag_toevoegen.php');
}
else {
    $_SESSION['VRAAGSOORT'] = 'G';
    header('Location: geslotenvraag_toevoegen.php');
}
