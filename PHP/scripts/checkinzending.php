<?php
require_once "phpfunctions.php";
require_once "connect.php";

$evenement = $_GET['evenement'];


if(isset($_POST['verwerk'])) {
    $email = checkInput($_POST['mailadres']);
    $voornaam = checkInput($_POST['voornaam']);
    $achternaam = checkInput($_POST['achternaam']);
    $titel1 = checkInput($_POST['titel1']);
    $artiest1 = checkInput($_POST['artiest1']);
    $titel2 = checkInput($_POST['titel2']);
    $artiest2 = checkInput($_POST['artiest2']);
    $titel3 = checkInput($_POST['titel3']);
    $artiest3 = checkInput($_POST['artiest3']);
    $titel4 = checkInput($_POST['titel4']);
    $artiest4 = checkInput($_POST['artiest4']);
    $titel5 = checkInput($_POST['titel5']);
    $artiest5 = checkInput($_POST['artiest5']);
    $naam = $voornaam . ' ' . $achternaam;

    //inzending 1
    if (!empty($titel1)&&!empty($artiest1)){
        $sql = "EXECUTE usp_Stem_InsertStem @evenementnaam = '$evenement', @mail = '$email', @naam = '$naam', @weging = 5, @titel = '$titel1', @artiest = '$artiest1'";
        $query = $conn->prepare($sql);
        $query->execute();

        $error = $query->errorCode();
        if (empty($error) || 00000 == $error){
            $result1 = "inzending1success";
        }
        else{
            $result1 = "inzending1sqlerror";
        }
    }
    elseif (empty($titel1)&&!empty($artiest1)){
        $result1 = "inzending1nummererror";
    }
    elseif (!empty($titel1)&&empty($artiest1)){
        $result1 = "inzending1artiesterror";
    }

    //inzending 2
    if (!empty($titel2)&&!empty($artiest2)){
        $sql = "EXECUTE usp_Stem_InsertStem @evenementnaam = '$evenement', @mail = '$email', @naam = '$naam', @weging = 4, @titel = '$titel2', @artiest = '$artiest2'";
        $query = $conn->prepare($sql);
        $query->execute();

        $error = $query->errorCode();
        if (empty($error) || 00000 == $error){
            $result2 = "inzending2success";
        }
        else{
            $result2 = "inzending2sqlerror";
        }
    }
    elseif (empty($titel2)&&!empty($artiest2)){
        $result2 = "inzending2nummererror";
    }
    elseif (!empty($titel2)&&empty($artiest2)){
        $result2 = "inzending2artiesterror";
    }

    //inzending 3
    if (!empty($titel3)&&!empty($artiest3)){
        $sql = "EXECUTE usp_Stem_InsertStem @evenementnaam = '$evenement', @mail = '$email', @naam = '$naam', @weging = 3, @titel = '$titel3', @artiest = '$artiest3'";
        $query = $conn->prepare($sql);
        $query->execute();

        $error = $query->errorCode();
        if (empty($error) || 00000 == $error){
            $result3 = "inzending3success";
        }
        else{
            $result3 = "inzending3sqlerror";
        }
    }
    elseif (empty($titel3)&&!empty($artiest3)){
        $result3 = "inzending3nummererror";
    }
    elseif (!empty($titel3)&&empty($artiest3)){
        $result3 = "inzending3artiesterror";
    }

    //inzending 4
    if (!empty($titel4)&&!empty($artiest4)){
        $sql = "EXECUTE usp_Stem_InsertStem @evenementnaam = '$evenement', @mail = '$email', @naam = '$naam', @weging = 2, @titel = '$titel4', @artiest = '$artiest4'";
        $query = $conn->prepare($sql);
        $query->execute();

        $error = $query->errorCode();
        if (empty($error) || 00000 == $error){
            $result4 = "inzending4success";
        }
        else{
            $result4 = "inzending4sqlerror";
        }
    }
    elseif (empty($titel4)&&!empty($artiest4)){
        $result4 = "inzending4nummererror";
    }
    elseif (!empty($titel4)&&empty($artiest4)){
        $result4 = "inzending4artiesterror";
    }

    //inzending 5
    if (!empty($titel5)&&!empty($artiest5)){
        $sql = "EXECUTE usp_Stem_InsertStem @evenementnaam = '$evenement', @mail = '$email', @naam = '$naam', @weging = 1, @titel = '$titel5', @artiest = '$artiest5'";
        $query = $conn->prepare($sql);
        $query->execute();

        $error = $query->errorCode();
        if (empty($error) || 00000 == $error){
            $result5 = "inzending5success";
        }
        else{
            $result5 = "inzending5sqlerror";
        }
    }
    elseif (empty($titel5)&&!empty($artiest5)){
        $result5 = "inzending5nummererror";
    }
    elseif (!empty($titel5)&&empty($artiest5)){
        $result5 = "inzending5artiesterror";
    }

    $headerstring = 'location: inzendingen.php?evenement=' . $evenement;

    if (isset($result1)){
        $headerstring .= ("&result1=" . $result1);
    }
    if (isset($result2)){
        $headerstring .= ("&result2=" . $result2);
    }
    if (isset($result3)){
        $headerstring .= ("&result3=" . $result3);
    }
    if (isset($result4)){
        $headerstring .= ("&result4=" . $result4);
    }
    if (isset($result5)){
        $headerstring .= ("&result5=" . $result5);
    }

    header($headerstring );
}

?>