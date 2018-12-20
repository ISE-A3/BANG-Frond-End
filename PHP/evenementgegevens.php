<?php
require_once "connect.php";

if (isset($_GET['evenement'])) {
    $evenement = $_GET['evenement'];
    $e_sql = "EXEC dbo.usp_Evenement_Select @EVENEMENT_NAAM = '$evenement'";
    $e_query = $conn->prepare($e_sql);
    $e_query->execute();
    $e_row = $e_query->fetch(PDO::FETCH_ASSOC);
    $e_id = $e_row["EVENEMENT_ID"];
    $e_naam = $e_row["EVENEMENT_NAAM"];
    $e_naam_url = urlencode($e_naam);
    $e_datum = $e_row["EVENEMENT_DATUM"];
    $e_locatie = $e_row["LOCATIENAAM"];
    $e_plaats = $e_row["PLAATSNAAM"];
    $e_adres = $e_row["ADRES"] . " " .  $e_row["HUISNUMMER"];
    $startdatum = $e_row["STARTDATUM"];
    $einddatum = $e_row["EINDDATUM"];
} else {
    $e_id = NULL;
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
$titel = 'Evenement - ' . $e_naam;
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
                    <h1>Evenenementgegevens van <?php echo $e_naam ?></h1>
                    <p>Gegevens van <?php echo $e_naam?></p>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Detail</th>
                            <th>Gegevens</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Naam:</td>
                            <td><?php echo $e_naam; ?></td>
                        </tr>
                        <tr>
                            <td>Datum:</td>
                            <td><?php echo $e_datum; ?></td>
                        </tr>
                        <tr>
                            <td>Locatie:</td>
                            <td><?php echo $e_locatie; ?></td>
                        </tr>
                        <tr>
                            <td>Plaats:</td>
                            <td><?php echo $e_plaats; ?></td>
                        </tr>
                        <tr>
                            <td>Adres:</td>
                            <td><?php echo $e_adres ?></td>
                        </tr>
                        <tr>
                            <td>Startdatum inzendingsperiode:</td>
                            <td><?php echo $startdatum; ?></td>
                        </tr>
                        <tr>
                            <td>Einddatum inzendingsperiode:</td>
                            <td><?php echo $einddatum; ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="w3-container">
                    <a class="btn btn-primary btn-lg" href="evenementgegevens.php?evenement=<?php echo $e_naam_url; ?>">Voeg Pubquiz toe</a>
                    <?php
                    if (!isset($startdatum)) {
                        echo "<a class='btn btn-primary btn-lg' href='top100aanmaken.php?evenement=$e_naam_url'>Voeg Top 100 toe</a>";
                    }
                    if(isset($_GET['beheerder'])){
                       echo "<a class=\"btn btn-warning btn-lg\" href=\"evenementAanpassen.php?evenement=$e_naam_url\">Evenement aanpassen</a>";
                    }
                    ?>
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