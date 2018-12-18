<?php
require_once "scripts/connect.php";
require_once "scripts/top100AanEvenement.php";

if (isset($_GET['id'])) {
    $e_id = $_GET['id'];
    $e_sql = "EXEC dbo.sp_evenement_select @e_id = " . $e_id;
    $e_query = $conn->prepare($e_sql);
    $e_query->execute();
    $e_row = $e_query->fetch(PDO::FETCH_ASSOC);
    $e_naam = $e_row["E_NAAM"];
    $e_datum = $e_row["E_DATUM"];
    $e_locatie = $e_row["LOCATIENAAM"];
    $e_plaats = $e_row["PLAATSNAAM"];
    $e_adres = $e_row["ADRES"] . " " .  $e_row["HUISNUMMER"];
    $startdatum = $e_row["STARTDATUM"];
    $einddatum = $e_row["EINDDATUM"];
} else {
    $e_naam = NULL;
    $e_datum = NULL;
    $e_locatie = NULL;
    $e_plaats = NULL;
    $e_adres = NULL;
    $startdatum = NULL;
    $einddatum = NULL;
}

?>
<!DOCTYPE html>
<html lang="en">

<?php
//$today = date("Y-m-d");       voor de open/gesloten inzendingen op evenement.php
//echo $today;

$titel = 'Top 100 Toevoegen';
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
                    <h1>Top 100</h1>
                    <p>Toevoegen van een Top 100 aan een evenement</p>
                    <div class="col-lg-6">
                        <section class="panel">
                            <header class="panel-heading">
                                Top 100 aanmaken
                            </header>
                            <div class="panel-body">
                                <form method="POST" action="top100aanmaken.php?id=<?php echo $e_id?>" role="form">
                                    <div class="form-group">
                                        <label for="Startdatum">Startdatum</label>
                                        <input type="date" class="form-control" name='Startdatum' id="Startdatum">
                                    </div>
                                    <div class="form-group">
                                        <label for="Einddatum">Einddatum</label>
                                        <input type="date" class="form-control" name='Einddatum' id="Einddatum">
                                    </div>
                                    <a class="btn btn-danger" href="evenementgegevens.php?id=<?php echo $e_id?>">Annuleer</a>
                                    <button type="submit" name='aanmaken' class="btn btn-primary">Aanmaken</button>
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