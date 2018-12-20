<?php
include_once "scripts/phpfunctions.php";
include_once "scripts/connect.php";

if(isset($_GET['evenement'])){
    $evenementnaam = urldecode($_GET['evenement']);
}
else {
    $evenementnaam = NULL;
}

$e_sql = "EXEC dbo.usp_Evenement_Select @EVENEMENT_NAAM = '$evenementnaam'";
$e_query = $conn->prepare($e_sql);
$e_query->execute();
$e_row = $e_query->fetch(PDO::FETCH_ASSOC);

$evenementdatum = $e_row['EVENEMENT_DATUM'];
$plaatsnaam = $e_row['PLAATSNAAM'];
$adres = $e_row['ADRES'];
$huisnummer = $e_row['HUISNUMMER'];

$sqlNummer = "EXECUTE usp_Top100Artiest_SelectTop100 @Evenementnaam = '$evenementnaam', @Evenementdatum = '$evenementdatum', @Plaatsnaam = '$plaatsnaam', @Adres = '$adres', @Huisnummer = $huisnummer ";
$query = $conn->prepare($sqlNummer);
$query->execute();

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachement; filename=$evenementnaam (Artiest) - Top100.xls");
/**
 * Evenementnaam ophalen met PHP. Rang Nummer en Artiest staan vast? De rest wordt uit SQL gehaald. Aan de hand van een php formule
 * zou ik dit eenvoudig in een html tabel moeten kunnen laden aan de hand van loops.
 */
echo "<h1>Evenementnaam: $evenementnaam</h1>
<table>
    <tr>
        <th>Rang</th>
        <th>Artiest</th>
        <th>Nummer</th>
        <th>Score</th>
    </tr>";
$rangorde = 1;
while($row = $query->fetch(PDO::FETCH_ASSOC)) {


    echo "
<!-- This would work if we removed all the bootstrap from the page and really just made a simple HTML page, it's not pretty but I'm not sure it has to be-->
<!-- Je ziet de pagina niet dus het is niet storend -->
    <tr>
        <td>$rangorde</td>
        <td>$row[ARTIEST_NAAM]</td>
        <td>$row[NUMMER_TITEL]</td>
        <td>$row[score]</td>
    </tr>
";
    $rangorde += 1;
}
echo "</table>";?>
