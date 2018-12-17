<?php
require_once "phpfunctions.php";
require_once "connect.php";

$evenement = $_GET['ID'];

if(isset($_POST['verwerk'])) {
    $email = checkInput($_POST['mailadres']);
    $voornaam = checkInput($_POST['voornaam']);
    $achternaam = checkInput($_POST['achternaam']);
    $nummer1 = checkInput($_POST['nummer1']);
    $artiest1 = checkInput($_POST['artiest1']);
    $nummer2 = checkInput($_POST['nummer2']);
    $artiest2 = checkInput($_POST['artiest2']);
    $nummer3 = checkInput($_POST['nummer3']);
    $artiest3 = checkInput($_POST['artiest3']);
    $nummer4 = checkInput($_POST['nummer4']);
    $artiest4 = checkInput($_POST['artiest4']);
    $nummer5 = checkInput($_POST['nummer5']);
    $artiest5 = checkInput($_POST['artiest5']);

    $naam = $voornaam . ' ' . $achternaam;
    echo $naam;
    $sql = 'INSERT INTO';

    if(empty($nummer1)){
        $sql = "EXECUTE sp_verwerkStem @E_ID = $evenement, @mail = $email, @naam = $naam, @weging = 5, @titel = NULL, @artiest = $artiest1";
        $query = $conn->prepare($sql);
        $query->execute();
    }
    else if(empty($artiest1)){
        $sql = "EXECUTE sp_verwerkStem @E_ID = $evenement, @mail = $email, @naam = $naam, @weging = 5, @titel = $nummer1, @artiest = NULL";
    }
    else {
        $sql = "EXECUTE sp_verwerkStem @E_ID = $evenement, @mail = $email, @naam = $naam, @weging = 5, @titel = $nummer1, @artiest = $artiest1";
    }
    if(empty($nummer2)){

    }
    else if(empty($artiest2)){

    }
    else {
        $sql = "EXECUTE sp_verwerkStem @E_ID = $evenement, @mail = $email, @naam = $naam, @weging = 4, @titel = $nummer2, @artiest = $artiest2";
    }
    if(empty($nummer3)){

    }
    else if(empty($artiest3)){

    }
    else {
        $sql = "EXECUTE sp_verwerkStem @E_ID = $evenement, @mail = $email, @naam = $naam, @weging = 3, @titel = $nummer3, @artiest = $artiest3";
    }
    if(empty($nummer4)){

    }
    else if(empty($artiest4)){

    }
    else {
        $sql = "EXECUTE sp_verwerkStem @E_ID = $evenement, @mail = $email, @naam = $naam, @weging = 2, @titel = $nummer4, @artiest = $artiest4";
    }
    if(empty($nummer5)){

    }
    else if(empty($artiest5)){

    }
    else {
        $sql = "EXECUTE sp_verwerkStem @E_ID = $evenement, @mail = $email, @naam = $naam, @weging = 1, @titel = $nummer5, @artiest = $artiest5";
    }
}

$error = '';
?>