<?php

$e_sql = "EXEC dbo.usp_Evenement_SelectAll";

$e_query = $conn->prepare($e_sql);
$e_query->execute();

if(isset($_GET['m'])) {
   if ($_GET['m'] = 'succes') {
       $message = "Een evenement is succesvol toegevoegd";
   }
}
$today = date("Y-m-d");       //voor de open/gesloten inzendingen op evenement.php

?>
<!DOCTYPE html>
<html lang="en">

<?php
$titel = 'Evenementen';
include_once "header.php";
?>

<body>
<!-- container section start -->
<section id="container" class="">
    <!--header start-->

    <header class="header dark-bg" style="border-bottom: none;">
        <div class="toggle-nav">
            <button id="openNav" onclick="w3_open()" style="background-color: rgba(0,0,0,0.0000001); border-color: rgba(0,0,0,0.0000001);color: whitesmoke;">
                <!-- de kleur voor de headerbackground = rgba(0,0,0,0.0000001)-->
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu" style="font-size: 40px;                         margin-top: 0px;"></i>
                </div>
            </button>
            <button id="closeNav" onclick="w3_close()" style="display: none; background-color: rgba(0,0,0,0.0000001); border-color: rgba(0,0,0,0.0000001);color: whitesmoke;">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="arrow_left_alt" style="font-size: 40px;                         margin-top: 0px;"></i>
            </button>
        </div>

        <!--logo start-->

        <!--logo end-->

    </header>
    <!--header end-->

    <!--sidebar start-->
    <?php
    include_once "sidebar.php";
    ?>

    <!--sidebar end-->
    <div class="w3-overlay w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" id="myOverlay"></div>
    <!--main content start-->
    <section id="main-content" style="margin-right: 10%;">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <!--
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                        <li><i class="fa fa-bars"></i>Pages</li>
                        <li><i class="fa fa-square-o"></i>Pages</li>
                    </ol>
                    Hierboven staat een breadcrumb, moeilijk te implementeren. Voor nu nog disabled
                    -->
                </div>
            </div>

            <!-- page start-->

            <div id="main">
                <div class="w3-container">
                    <h1><i class="icon_house_alt"></i> Evenementen</h1>
                    <p>Overzicht van alle evenementen</p>
                    <p><?php if(isset($_GET['m'])){echo $message;}?></p>
                    <table class="table table-striped">
                        <tr>
                            <th>Naam</th>
                            <th>Datum</th>
                            <th>Locatie</th>
                            <th>Startdatum</th>
                            <th>Einddatum</th>
                            <th>Inzendingen</th>
                            <th>Top 100 downloads</th>
                        </tr>
                        <?php
                        while ($e_row = $e_query->fetch(PDO::FETCH_ASSOC)) {
                            $e_id = $e_row["EVENEMENT_ID"];
                            $e_naam = $e_row["EVENEMENT_NAAM"];
                            $e_naam_url = urlencode($e_naam);       //urlencode zorgt voor de spaties in evenementnamen
                            $e_locatie = $e_row["LOCATIENAAM"];
                            $e_datum = $e_row["EVENEMENT_DATUM"];
                            $startdatum = $e_row["STARTDATUM"];
                            $einddatum = $e_row["EINDDATUM"];

                            echo "<tr>";
                            if(isset($_GET['beheerder'])) {
                               echo "<td ><a href = 'evenementgegevens.php?beheerder=1&evenement=$e_naam_url' > $e_naam</a ></td >";
                                }
                                else {
                                    echo "<td ><a href = 'evenementgegevens.php?evenement=$e_naam_url' > $e_naam</a ></td >";
                                }
                            echo "<td>$e_datum</td>
                            <td>$e_locatie</td>
                            <td>$startdatum</td>
                            <td>$einddatum</td>";
                            if(empty($startdatum) && empty($einddatum)){
                                echo "<td></td>
                                      <td></td>";
                            }
                            else {
                             if($today > $einddatum){
                                echo "<td><a href='evenementgegevens.php?evenement=$e_naam_url'<b style='color: #cd0a0a'>Gesloten</b><i class=\"icon_pencil-edit\"></i></td>";
                             }
                             else if(($today < $einddatum) && ($today > $startdatum)) {
                                 echo "<td><a href='inzendingen.php?evenement=$e_naam_url'<b style='color:green;'>Open</b><i class=\"icon_pencil-edit\"></i></td>";
                             }
                             else {
                                echo "<td><a href='evenementgegevens.php?evenement=$e_naam_url'<b style='color: #cd0a0a'>Gesloten</b><i class=\"icon_pencil-edit\"></i></td>";
                            }
                             echo "<td><a href='poc_downloadtop100v2.php?evenement=$e_naam_url' style='color: #005cbf'>Nummer<i class='icon_download'></i></a>&nbsp;&nbsp;&nbsp;<a href='downloadtop100_artiest.php?evenement=$e_naam_url' style='color: #005cbf'>Artiest<i class='icon_download'></i></a></td>
                        </tr>";
                            }
                        }
                        ?>

                    </table>
                </div>
                <?php if(isset($_GET['beheerder'])) {
                    echo "
                <div class=\"w3-container\">
                    <a class=\"btn btn-primary btn-lg\" href=\"evenementAanmaken.php\">Voeg evenement toe</a>
                    <a class=\"btn btn-danger btn-lg\" href=\"evenement.php\">Verwijder evenement</a>
                </div>";
                }?>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->
    <div class="text-right">
        <div class="credits">

        </div>
    </div>
</section>


</body>

</html>