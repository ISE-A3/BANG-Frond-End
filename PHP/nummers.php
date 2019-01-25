<!DOCTYPE html>
<html lang="en">

<?php
$titel = 'Nummers';
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
                    <p style="padding-left: 2px;"><?php
                        if(isset($_GET['result'])){
                            if($_GET['result'] == 'artiestupdatesuccess'){
                                echo "<b style='color: green;'>De artiest is succesvol bewerkt</b>";
                            }
                            else if ($_GET['result'] == 'artiestupdateerror'){
                                echo "<b style='color: red;'>Er is iets fout gegaan bij het bewerken van de artiest</b>";
                            }
                            else if($_GET['result'] == 'artiestreplacesuccess'){
                                echo "<b style='color: green;'>De artiest is succesvol vervangen</b>";
                            }
                            else if ($_GET['result'] == 'artiestreplaceerror'){
                                echo "<b style='color: red;'>Er is iets fout gegaan bij het vervangen van de artiest</b>";
                            }
                            else if($_GET['result'] == 'nummerupdatesuccess'){
                                echo "<b style='color: green;'>het nummer is succesvol bewerkt</b>";
                            }
                            else if ($_GET['result'] == 'nummerupdateerror'){
                                echo "<b style='color: red;'>Er is iets fout gegaan bij het bewerken van het nummer</b>";
                            }
                            else if($_GET['result'] == 'nummerdeletesuccess'){
                                echo "<b style='color: green;'>het nummer is succesvol verwijderd</b>";
                            }
                            else if ($_GET['result'] == 'nummerdeleteerror'){
                                echo "<b style='color: red;'>Er is iets fout gegaan bij het verwijderen van het nummer</b>";
                            }
                        }
                        ?>
                    </p>
                    <h1>Nummers</h1>
                    <?php if($_SESSION['gebruiker'] == 'bang_top100medewerker' || $_SESSION['gebruiker'] == 'bang_beheerder') {?>
                    <div class="row">
                        <div class="col text-right" >
                            <a class="btn btn-primary btn-lg" href="nieuwNummer.php">Voeg nummer toe</a>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <section class="panel">
                                <table class="table table-striped table-advance table-hover">
                                    <tbody>
                                    <tr>
                                        <th><i class="icon_profile"></i> Artiest</th>
                                        <?php if($_SESSION['gebruiker'] == 'bang_top100medewerker' || $_SESSION['gebruiker'] == 'bang_beheerder') {?>
                                        <th><i class="icon_toolbox" style="padding-left: 12px;font-size: 15px;"></i></th> <?php }?>
                                        <th><i class="icon_music"></i> Titel</th>
                                        <?php if($_SESSION['gebruiker'] == 'bang_top100medewerker' || $_SESSION['gebruiker'] == 'bang_beheerder') { ?>
                                        <th><i class="icon_toolbox" style="padding-left: 16%;font-size: 17px;"></i></th> <?php } ?>
                                    </tr>

                                    <?php

                                    $e_sql = "EXEC dbo.usp_Nummer_SelectAll";
                                    $e_query = $conn->prepare($e_sql);
                                    $e_query->execute();
                                    if ($e_query->rowCount() != 0) {
                                        // output data of each row
                                        while($e_row = $e_query->fetch(PDO::FETCH_ASSOC)){
                                            $e_titel = $e_row["NUMMER_TITEL"];
                                            $e_artiest = $e_row["ARTIEST_NAAM"];
                                            $artiest = urlencode($e_artiest);
                                            $titel = urlencode($e_titel);
                                            echo"
                                                <tr>     
                                                    <td>$e_artiest</td> ";
                                    if($_SESSION['gebruiker'] == 'bang_top100medewerker' || $_SESSION['gebruiker'] == 'bang_beheerder'){
                                                    echo "<td>
                                                           <div class=\"btn-group\">
                                                                <a class=\"btn btn-primary\" href=\"bewerkArtiest.php?artiest=$artiest\" data-toggle=\"tooltip\" title=\"Bewerk artiest\">
                                                                    <i class=\"icon_cogs\"></i>
                                                                    <i class=\"icon_profile\"></i>
                                                                </a>
                                                            </div>
                                                    </td>"; }
                                                    echo "<td>$e_titel</td>";
                                     if($_SESSION['gebruiker'] == 'bang_top100medewerker' || $_SESSION['gebruiker'] == 'bang_beheerder') {
                                                  echo "<td>
                                                        <div class=\"btn-group\">
                                                            <a class=\"btn btn-primary\" href=\"vervangArtiest.php?titel=$titel&artiest=$artiest\" data-toggle=\"tooltip\" title=\"Vervang artiest\">
                                                                <i class=\"fa fa-wrench\"></i>
                                                                <i class=\"icon_profile\"></i>
                                                            </a>
                                                            <a class=\"btn btn-success\" href=\"bewerkNummer.php?titel=$titel&artiest=$artiest\" data-toggle=\"tooltip\" title=\"Bewerk Nummer\">
                                                                <i class=\"icon_cogs\"></i>
                                                                <i class=\"icon_music\"></i>
                                                            </a>
                                                            <a class=\"btn btn-danger\" href=\"scripts/nummerVerwijdering.php?titel=$titel&artiest=$artiest\" data-toggle=\"tooltip\" title=\"Verwijder Nummer\">
                                                                <i class=\"icon_close_alt2\"></i>
                                                            </a>
                                                        </div>
                                                    </td>";
                                                    }
                                                    echo "
                                                </tr>
                                            ";
                                        }
                                    } else {
                                        echo "0 results";
                                    }
                                    ?>

                                    </tbody>
                                </table>
                            </section>
                        </div>
                    </div>
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