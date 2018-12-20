<?php

function checkInput($input) //Troep weghalen bij gebruikersinput
{
    $input = stripslashes($input); //Haal slashes weg
    $input = htmlspecialchars($input); //Haal de html chars weg
    return $input;
}

function checkUsername($input)
{
    $input = checkInput($input);//Bovenstaande functie
    $input = strtolower($input);//Alles naar lage tekens
    return $input;
}

?>