<?php

require_once "scripts/connect.php";


$v_sql = "EXEC dbo.usp_Vraag_SelectAll";

$v_query = $conn->prepare($v_sql);
$v_query->execute();

$message = '';

if(isset($_GET['m'])) {
    if ($_GET['m'] == "succes") {
        $message = "<b>Een vraag is succesvol toegevoegd</b>";
    }
    if($_GET['m'] == "aangepast"){
        $message = "<b>De vraag is succesvol aangepast</b>";
    }
    if($_GET['m'] == "deleted"){
        $message = "<b>De vraag is succesvol verwijderd</b>";
    }
}
$today = date("Y-m-d");       //voor de open/gesloten inzendingen op

?>
<!DOCTYPE html>
<html lang="en">

<?php
$titel = 'Vragen';
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
                    <h1><i class="icon_question_alt2"></i> Vragen</h1>
                    <p>Overzicht van alle vragen</p>

                    <table class="table table-striped">
                        <tr>
                            <th>Vraagnaam</th>
                            <th>Titel</th>
                            <th>Thema</th>
                            <th>Aantal vragen</th>
                        </tr>
                        <?php
                        while ($v_row = $v_query->fetch(PDO::FETCH_ASSOC)) {
                            $v_naam = $v_row["VRAAG_NAAM"];
                            $v_naam_url = urlencode($v_naam);       //urlencode zorgt voor de spaties in vraagnamen
                            $v_titel = $v_row["VRAAG_TITEL"];
                            $v_thema = $v_row["THEMA"];
                            $v_onderdelen = $v_row["Aantal_onderdelen"];

                            echo "<tr>";
                            if(isset($_GET['beheerder'])) {
                                echo "<td ><a href = 'vraaggegevens.php?beheerder=1&vraag=$v_naam_url' > $v_naam</a ></td >";
                            }
                            else {
                                echo "<td ><a href = 'vraaggegevens.php?vraag=$v_naam_url' > $v_naam</a ></td >";
                            }
                            echo "<td>$v_titel</td>             
                            <td>$v_thema</td>
                            <td>$v_onderdelen</td>
                        </tr>";
                        }
                        ?>
                    </table>
                </div>
                <?php if(isset($_GET['beheerder'])) {
                        if($_SESSION['gebruiker'] == 'bang_quizmaker' || $_SESSION['gebruiker'] == 'bang_beheerder') {
                            echo "
                <div class=\"w3-container\">
                    <a class=\"btn btn-primary btn-lg\" href=\"vraag_aanmaken.php\">Voeg vraag toe</a>
                </div>";
                        }
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