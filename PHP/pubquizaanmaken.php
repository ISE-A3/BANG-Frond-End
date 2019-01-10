<?php
require_once "scripts/pubquizaanEvenement.php";

if (isset($_GET['evenement'])) {
    $evenement = $_GET['evenement'];
    $e_sql = "EXEC dbo.usp_Evenement_Select @EVENEMENT_NAAM = '$evenement'";
    $e_query = $conn->prepare($e_sql);
    $e_query->execute();
    $e_row = $e_query->fetch(PDO::FETCH_ASSOC);
    $e_naam = $e_row["EVENEMENT_NAAM"];
    $e_datum = $e_row["EVENEMENT_DATUM"];
    $e_locatie = $e_row["LOCATIENAAM"];
    $e_plaats = $e_row["PLAATSNAAM"];
    $e_adres = $e_row["ADRES"] . " " .  $e_row["HUISNUMMER"];
} else {
    $e_naam = NULL;
    $e_datum = NULL;
    $e_locatie = NULL;
    $e_plaats = NULL;
    $e_adres = NULL;
}
?>

<!DOCTYPE html>
<html lang="en">

<?php
$titel = 'Pubquiz Toevoegen';
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
                    <h1 style="margin-left: 12px;">Pubquiz</h1>
                    <p style="margin-left: 16px;">Toevoegen van een Pubquiz aan het evenement '<?php echo $e_naam;?>'</p>
                    <div class="col-lg-6">
                        <section class="panel">
                            <header class="panel-heading">
                                Pubquiz aanmaken
                            </header>
                            <div class="panel-body">
                                <form method="POST" action="pubquizaanmaken.php?evenement=<?php echo $e_naam?>" role="form">
                                    <div class="form-group">
                                        <label for="pubquiztitel">Titel pubquiz</label>
                                        <input type="text" class="form-control" name='pubquiztitel' id="pubquiztitel">
                                    </div>
                                    <a class="btn btn-danger" href="evenementgegevens.php?evenement=<?php echo $e_naam?>">Annuleer</a>
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

</body>

</html>