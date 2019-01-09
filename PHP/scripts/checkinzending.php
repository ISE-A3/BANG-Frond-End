<?php
require_once "phpfunctions.php";
require_once "connect.php";

$evenement = $_GET['evenement'];


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


    if(empty($nummer1)){
        $error .= "De titel van nummer 1 ontbreekt. ";
    }
    if(empty($artiest1)){
        $error .= "De artiest van nummer 1 ontbreekt. ";
    }
    else {
        $sql = "EXECUTE usp_Stem_InsertStem @evenementnaam = '$evenement', @mail = '$email', @naam = '$naam', @weging = 5, @titel = '$nummer1', @artiest = '$artiest1'";
        $query = $conn->prepare($sql);
        $query->execute();
    }
    if(empty($nummer2)){
        $error .= "De titel van nummer 2 ontbreekt. ";
    }
    if (empty($artiest2)){
        $error .= "De artiest van nummer 2 ontbreekt. ";
    }
    else {
        $sql = "EXECUTE usp_Stem_InsertStem @evenementnaam = '$evenement', @mail = '$email', @naam = '$naam', @weging = 4, @titel = '$nummer2', @artiest = '$artiest2'";
        $query = $conn->prepare($sql);
        $query->execute();
    }
    if(empty($nummer3)){
        $error .= "De titel van nummer 3 ontbreekt. ";
    }
    if(empty($artiest3)){
        $error .= "De artiest van nummer 3 ontbreekt. ";
    }
    else {
        $sql = "EXECUTE usp_Stem_InsertStem @evenementnaam = '$evenement', @mail = '$email', @naam = '$naam', @weging = 3, @titel = '$nummer3', @artiest = '$artiest3'";
        $query = $conn->prepare($sql);
        $query->execute();
    }
    if(empty($nummer4)){
        $error .= "De titel van nummer 4 ontbreekt. ";
    }
    if(empty($artiest4)){
        $error .= "De artiest van nummer 4 ontbreekt. ";
    }
    else {
        $sql = "EXECUTE usp_Stem_InsertStem @evenementnaam = '$evenement', @mail = '$email', @naam = '$naam', @weging = 2, @titel = '$nummer4', @artiest = '$artiest4'";
        $query = $conn->prepare($sql);
        $query->execute();
    }
    if(empty($nummer5)){
        $error .= "De titel van nummer 5 ontbreekt. ";
    }
    if(empty($artiest5)){
        $error .= "De artiest van nummer 5 ontbreekt. ";
    }
    else {
        $sql = "EXECUTE usp_Stem_InsertStem @evenementnaam = '$evenement', @mail = '$email', @naam = '$naam', @weging = 1, @titel = '$nummer5', @artiest = '$artiest5'";
        $query = $conn->prepare($sql);
        $query->execute();
    }



    if (empty($error)){
        header('location: inzendingen.php?error=' . $error . '&evenement=' . $evenement. $nummer1. $artiest1. $nummer4. $artiest4);
    }
    else {
        header('location: inzendingen.php?error=' . $error . '&evenement=' . $evenement);
    }
}

?>