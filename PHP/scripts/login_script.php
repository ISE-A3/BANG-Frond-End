<?php

if(isset($_POST['inloggen'])) {

    $_SESSION['gebruiker'] = $_POST['gebruikersnaam'];
    $_SESSION['wachtwoord'] = $_POST['wachtwoord'];
    header('Location: evenement.php');

}
?>