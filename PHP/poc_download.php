<?php
<<<<<<< HEAD:PHP/evenement.php
require_once "connect.php";

$e_sql = "EXEC dbo.sp_evenement_select_all";

$e_query = $conn->prepare($e_sql);
$e_query->execute();

if(isset($_GET['m'])) {
   if ($_GET['m'] = 'succes') {
       $message = "Een evenement is succesvol toegevoegd";
   }
}
=======
/**
 * Created by PhpStorm.
 * User: anouk
 * Date: 14-12-2018
 * Time: 10:58
 */

>>>>>>> origin/U.T.4:PHP/poc_download.php
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

        <div class="top-nav notification-row">
            <!-- notificatoin dropdown start-->
            <ul class="nav pull-right top-menu">

            </ul>

        </div>
    </header>
    <!--header end-->
<<<<<<< HEAD:PHP/evenement.php
    <!--sidebar start-->
    <?php
    include_once "sidebar.php";
    ?>
=======
    <style>

    </style>

    <!--sidebar start-->
    <aside>
        <div class="w3-sidebar w3-bar-block w3-animate-left" style="display:none;z-index:5;background-color: #394a59" id="mySidebar">
            <div id="sidebar" class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu">
                    <li class="">
                        <a class="" href="index.php"style="border-right: none;">
                            <i class="icon_house_alt" style="font-size: 30px;"></i>
                            <span style="font-size: 25px; padding-top: 10px;">Home</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" class="" style="border-bottom: none;border-right: none;">
                            <span style="font-size: 25px;">Pubquiz</span>
                            <span class="menu-arrow arrow_carrot-down"></span>
                        </a>
                    </li>
                    <li>
                        <a class="" href="tables.html" style="border-bottom: none;border-right: none;">
                            <i class="icon_genius"></i>
                            <span>Quizzen</span>
                        </a>
                    </li>
                    <li>
                        <a class="" href="chart-chartjs.html" style="border-bottom: none;border-right: none;">
                            <i class="icon_question"></i>
                            <span>Vragen</span>

                        </a>

                    </li>

                    <br>

                    <li>
                        <a class="" href="buttons.php" style="border-bottom: none;border-right: none;">
                            <span style="font-size: 25px;">Top 100</span>
                            <span class="menu-arrow arrow_carrot-down"></span>
                        </a>

                    </li>

                    <li class="sub-menu">
                        <a href="tablestructures.php" class="" style="border-bottom: none;border-right: none;">
                            <i class="icon_table"></i>
                            <span>Tables</span>
                        </a>
                    </li>

                    <li class="sub-menu ">
                        <a href="javascript:;" class="" style="border-bottom: none;border-right: none;">
                            <i class="icon_documents_alt"></i>
                            <span>Pages</span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="buttons.php">Buttons</a></li>
                            <li><a class="" href="login.php"><span>Login</span></a></li>
                            <li><a class="" href="contact.html"><span>Contact Page</span></a></li>
                            <li><a class="active" href="blank.html">Blank Page</a></li>
                            <li><a class="" href="404.html">404 Error</a></li>
                        </ul>
                    </li>

                </ul>
                <!-- sidebar menu end-->
            </div>
        </div>
    </aside>
>>>>>>> origin/U.T.4:PHP/poc_download.php
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
<<<<<<< HEAD:PHP/evenement.php
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
                        </tr>
                        <?php
                        while ($e_row = $e_query->fetch(PDO::FETCH_ASSOC)) {
                            $e_id = $e_row["E_ID"];
                            $e_naam = $e_row["E_NAAM"];
                            $e_locatie = $e_row["LOCATIENAAM"];
                            $e_datum = $e_row["E_DATUM"];
                            $startdatum = $e_row["STARTDATUM"];
                            $einddatum = $e_row["EINDDATUM"];

                            echo "<tr>
                            <td><a class='list-group-item' href='evenementgegevens.php?id=$e_id'>$e_naam</a></td>
                            <td>$e_datum</td>
                            <td>$e_locatie</td>
                            <td>$startdatum</td>
                            <td>$einddatum</td>
                            <td><a href='inzendingen.php?id=$e_id'<b style='color:green;'>Open</b><i class=\"icon_pencil-edit\"></i></td>
                        </tr>";
                        }
                        ?>

                    </table>
=======
                    <h1>Navigatiebar test</h1>
                    <p>Dit is tekst om testen xD. Dit is tekst om testen xD. Dit is tekst om testen xD. Dit is tekst om testen xD. Dit is tekst om testen xD. Dit is tekst om testen xD.</p>
                    <p>Klik linksboven om de navigatiebalk uit te klappen</p>
                    <td><a class="btn btn-default btn-lg" href="poc_downloadtop100v2.php" title="Bootstrap 3 themes generator">Download Top100</a></td>
                    <img src="../NiceAdmin/spaceShip.jpg" alt="Allahu Spacebar" style="width:100%;">
>>>>>>> origin/U.T.4:PHP/poc_download.php
                </div>
                <div class="w3-container">
                    <a class="btn btn-primary btn-lg" href="evenementAanmaken.php">Voeg evenement toe</a>
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
<script>
    function w3_open() {
        document.getElementById("main").style.marginLeft = "0%";
        document.getElementById("mySidebar").style.width = "11.9%";
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("openNav").style.display = 'none';
        document.getElementById("mySidebar").style.borderRight = "1px solid #D7D7D7";
        document.getElementById("myOverlay").style.display = "block";
        document.getElementById("closeNav").style.display = "block";
    }
    function w3_close() {
        document.getElementById("main").style.marginLeft = "0%";
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("openNav").style.display = "inline-block";
        document.getElementById("myOverlay").style.display = "none";
        document.getElementById("closeNav").style.display = "none";
    }
</script>

</body>

</html>