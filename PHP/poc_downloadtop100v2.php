<?php
/**
 * Created by PhpStorm.
 * User: anouk
 * Date: 16-12-2018
 * Time: 16:18
 */
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachement; filename=Evenementnaam: Top100.xls");
/**
 * Evenementnaam ophalen met PHP. Rang Nummer en Artiest staan vast? De rest wordt uit SQL gehaald. Aan de hand van een php formule
 * zou ik dit eenvoudig in een html tabel moeten kunnen laden aan de hand van loops.
 */
?>
<!-- This would work if we removed all the bootstrap from the page and really just made a simple HTML page, it's not pretty but I'm not sure it has to be-->
<!-- Je ziet de pagina niet dus het is niet storend -->
<h1>Evenementnaam: Top100</h1>
<table>
    <tr>
        <th>Rang</th>
        <th>Nummer</th>
        <th>Artiest</th>
    </tr>
    <tr>
        <td>1</td>
        <td>Nummer 1</td>
        <td>Artiest 1</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Nummer 2</td>
        <td>Artiest 2</td>
    </tr>
</table>
