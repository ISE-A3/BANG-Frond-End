<?php
require_once "connect.php";

$e_sql = "EXEC dbo.sp_evenement_select_all";

$e_query = $conn->prepare($e_sql);
$e_query->execute();

if(isset($_GET['m'])) {
   if ($_GET['m'] = 'succes') {
       $message = "Een evenement is succesvol toegevoegd";
   }
}
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
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu" style="font-size: 40px;                         margin-top: 0px;"></i></div>
            </button>
            <button id="closeNav" onclick="w3_close()" style="display: none; background-color: rgba(0,0,0,0.0000001); border-color: rgba(0,0,0,0.0000001);color: whitesmoke;">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="arrow_left_alt" style="font-size: 40px;                         margin-top: 0px;"></i></div>
            </button>
        </div>

        <div class="top-nav notification-row">
            <!-- notificatoin dropdown start-->
            <ul class="nav pull-right top-menu">

            </ul>

        </div>
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

