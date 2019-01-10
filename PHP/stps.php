<?php
/**
 * Created by PhpStorm.
 * User: anouk
 * Date: 6-1-2019
 * Time: 13:39
 */

/*
 * dbo.usp_Vraag_Insert
 */
if(!isset($_SESSION['VRAAGTITEL'])) {
    $_SESSION['VRAAGTITEL'] = '';
}
if(!isset(S_SESSION['VRAAGTHEMA'])) {
    $_SESSION['VRAAGTHEMA'] = '';
}

$e_sql = "EXEC dbo.usp_Vraag_Insert @VRAAG_NAAM = " . $_SESSION['VRAAGNAAM'] . " @VRAAG_TITEL = " . $_SESSION['VRAAGTITEL'] . " @THEMA = " . $_SESSION['VRAAGTHEMA'];
$e_query = $conn->prepare($e_sql);
$e_query->execute();

/*
 * dbo.usp_Vraagonderdeel_Insert
 */
/* Vraagonderdeelnummer ophogen */
$e_sql = "EXEC dbo.usp_Vraagonderdeel_Insert @VRAAGONDERDEELNUMMER = " . $_SESSION['VRAAGONDERDEELNUMMER'] . " @VRAAGONDERDEEL = " . $_SESSION['VRAAG'] . " @VRAAGSOORT = " . $_SESSION['VRAAGSOORT'] . " @ANTWOORD = " . $_SESSION['ANTWOORD'] . " @PUNTEN = " . $_SESSION['AANTALPUNTEN'];
$e_query = $conn->prepare($e_sql);
$e_query->execute();