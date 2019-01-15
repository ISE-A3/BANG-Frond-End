<?php
include_once "scripts/phpfunctions.php";
include_once "scripts/connect.php";

if(isset($_GET['evenement'])){
    $evenementnaam = urldecode($_GET['evenement']);
}
else {
    $evenementnaam = NULL;
}

$sqlNummer = "EXECUTE usp_Top100Artiest_SelectTop100 @Evenementnaam = '$evenementnaam'";
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
