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
    $sql = '';
// /*
    if(empty($nummer1)){
        $sql = "EXECUTE sp_verwerkStem @E_ID = $evenement, @mail = $email, @naam = $naam, @weging = 5, @titel = NULL, @artiest = $artiest1";
        $query = $conn->prepare($sql);
        $query->execute();
    }
    else if(empty($artiest1)){
        $sql = "EXECUTE sp_verwerkStem @E_ID = $evenement, @mail = $email, @naam = $naam, @weging = 5, @titel = $nummer1, @artiest = NULL";
        $query = $conn->prepare($sql);
        $query->execute();
    }
    else {
        $sql = "EXECUTE sp_verwerkStem @E_ID = $evenement, @mail = $email, @naam = $naam, @weging = 5, @titel = $nummer1, @artiest = $artiest1";
        $query = $conn->prepare($sql);
        $query->execute();
    }
    if(empty($nummer2)){
        $sql = "EXECUTE sp_verwerkStem @E_ID = $evenement, @mail = $email, @naam = $naam, @weging = 4, @titel = NULL, @artiest = $artiest2";
        $query = $conn->prepare($sql);
        $query->execute();
    }
    else if(empty($artiest2)){
        $sql = "EXECUTE sp_verwerkStem @E_ID = $evenement, @mail = $email, @naam = $naam, @weging = 4, @titel = $nummer2, @artiest = NULL";
        $query = $conn->prepare($sql);
        $query->execute();
    }
    else {
        $sql = "EXECUTE sp_verwerkStem @E_ID = $evenement, @mail = $email, @naam = $naam, @weging = 4, @titel = $nummer2, @artiest = $artiest2";
        $query = $conn->prepare($sql);
        $query->execute();
    }
    if(empty($nummer3)){
        $sql = "EXECUTE sp_verwerkStem @E_ID = $evenement, @mail = $email, @naam = $naam, @weging = 3, @titel = NULL, @artiest = $artiest3";
        $query = $conn->prepare($sql);
        $query->execute();
    }
    else if(empty($artiest3)){
        $sql = "EXECUTE sp_verwerkStem @E_ID = $evenement, @mail = $email, @naam = $naam, @weging = 3, @titel = $nummer3, @artiest = NULL";
        $query = $conn->prepare($sql);
        $query->execute();
    }
    else {
        $sql = "EXECUTE sp_verwerkStem @E_ID = $evenement, @mail = $email, @naam = $naam, @weging = 3, @titel = $nummer3, @artiest = $artiest3";
        $query = $conn->prepare($sql);
        $query->execute();
    }
    if(empty($nummer4)){
        $sql = "EXECUTE sp_verwerkStem @E_ID = $evenement, @mail = $email, @naam = $naam, @weging = 2, @titel = NULL, @artiest = $artiest4";
        $query = $conn->prepare($sql);
        $query->execute();
    }
    else if(empty($artiest4)){
        $sql = "EXECUTE sp_verwerkStem @E_ID = $evenement, @mail = $email, @naam = $naam, @weging = 2, @titel = $nummer4, @artiest = NULL";
        $query = $conn->prepare($sql);
        $query->execute();
    }
    else {
        $sql = "EXECUTE sp_verwerkStem @E_ID = $evenement, @mail = $email, @naam = $naam, @weging = 2, @titel = $nummer4, @artiest = $artiest4";
        $query = $conn->prepare($sql);
        $query->execute();
    }
    if(empty($nummer5)){
        $sql = "EXECUTE sp_verwerkStem @E_ID = $evenement, @mail = $email, @naam = $naam, @weging = 1, @titel = NULL, @artiest = $artiest5";
        $query = $conn->prepare($sql);
        $query->execute();
    }
    else if(empty($artiest5)){
        $sql = "EXECUTE sp_verwerkStem @E_ID = $evenement, @mail = $email, @naam = $naam, @weging = 1, @titel = $nummer5, @artiest = NULL";
        $query = $conn->prepare($sql);
        $query->execute();
    }
    else {
        $sql = "EXECUTE sp_verwerkStem @E_ID = $evenement, @mail = $email, @naam = $naam, @weging = 1, @titel = $nummer5, @artiest = $artiest5";
        $query = $conn->prepare($sql);
        $query->execute();
    }
    // */
}

$error = '';
?>