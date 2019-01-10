<!DOCTYPE html>
<html lang="en">
<?php

$titel = 'Top 5';
include_once "header.php";
require_once('scripts/checkinzending.php'); // Inzending check script

if(!isset($_GET['evenement'])){
    header('location: evenement.php');
}

if(isset($_GET['error'])){
    $error = $_GET['error'];
}

else $error = '';

echo $error;
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
                    <h3 class="page-header" style="margin-left: 17px;text-align: center;margin-bottom: 0%;">Inzendingen</h3>
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
                    <p style="width: 68%;padding-left: 315px;"><?php
                            if(!isset($_GET['error'])) {

                            }
                        else {
                            if(empty($_GET['error'])){
                                echo "<b style='color: green;'>De vorige inzending is succesvol verwerkt</b>";
                            }
                                echo "<b style='color: red;'>$error</b>";

                             }
                        ?></p>
                    <div class="row">
                        <div class="col-lg-4" style="position: fixed;margin-left: 310px;">
                            <section class="panel">
                                <header class="panel-heading">
                                    Top 5
                                </header>
                                <div class="panel-body">
                                    <form role="form" method="POST" action="">
                                        <div class="form-group">
                                            <label for="mailadres">E-mailadres</label>
                                            <input type="email" class="form-control" name="mailadres" placeholder="E-mailadres" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="voornaam">Voornaam</label>
                                            <input type="text" class="form-control" name="voornaam" placeholder="Voornaam">
                                        </div>
                                        <div class="form-group">
                                            <label for="achternaam">Achternaam</label>
                                            <input type="text" class="form-control" name="achternaam" placeholder="Achternaam">
                                        </div>
                                        <div class="form-group">
                                            <label>Top 5</label>
                                            <div class="top5" id="top5" style="display: flex;">
                                                1.&nbsp;<input list="bestaandeTitels" type="text" class="form-control" name="nummer1" placeholder="Nummer" style="width: 48%;">
                                                <input list="bestaandeArtiesten" type="text" class="form-control" name="artiest1" placeholder="Artiest" style="width: 48%;margin-left: 4%">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="top5" id="top5" style="display: flex;">
                                                2.&nbsp;<input list="bestaandeTitels" type="text" class="form-control" name="nummer2" placeholder="Nummer" style="width: 48%;">
                                                <input list="bestaandeArtiesten" type="text" class="form-control" name="artiest2" placeholder="Artiest" style="width: 48%;margin-left: 4%">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="top5" id="top5" style="display: flex;">
                                                3.&nbsp;<input list="bestaandeTitels" type="text" class="form-control" name="nummer3" placeholder="Nummer" style="width: 48%;">
                                                <input list="bestaandeArtiesten" type="text" class="form-control" name="artiest3" placeholder="Artiest" style="width: 48%;margin-left: 4%">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="top5" id="top5" style="display: flex;">
                                                4.&nbsp;<input list="bestaandeTitels" type="text" class="form-control" name="nummer4" placeholder="Nummer" style="width: 48%;">
                                                <input list="bestaandeArtiesten" type="text" class="form-control" name="artiest4" placeholder="Artiest" style="width: 48%;margin-left: 4%">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="top5" id="top5" style="display: flex;">
                                                5.&nbsp;<input list="bestaandeTitels" type="text" class="form-control" name="nummer5" placeholder="Nummer" style="width: 48%;">
                                                <input list="bestaandeArtiesten" type="text" class="form-control" name="artiest5" placeholder="Artiest" style="width: 48%;margin-left: 4%">
                                            </div>
                                        </div>
                                        <datalist id="bestaandeArtiesten">
                                            <?php
                                            $e_sql = "EXEC dbo.usp_Artiest_SelectAll";
                                            $e_query = $conn->prepare($e_sql);
                                            $e_query->execute();
                                            while($e_row = $e_query->fetch(PDO::FETCH_ASSOC)){
                                                $artiest = $e_row['ARTIEST_NAAM'];
                                                echo "<option value='$artiest'>$artiest</option>";
                                            }
                                            ?>
                                        </datalist>
                                        <datalist id="bestaandeTitels">
                                            <?php
                                            $e_sql = "EXEC dbo.usp_Nummer_SelectAllUniqueTitels";
                                            $e_query = $conn->prepare($e_sql);
                                            $e_query->execute();
                                            while($e_row = $e_query->fetch(PDO::FETCH_ASSOC)){
                                                $nummer = $e_row['NUMMER_TITEL'];
                                                echo "<option value='$nummer'>$nummer</option>";
                                            }
                                            ?>
                                        </datalist>
                                        <button type="submit" name="verwerk" class="btn btn-primary">Verwerk</button>
                                    </form>

                                </div>
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

