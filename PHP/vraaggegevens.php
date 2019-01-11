<?php

require_once "scripts/connect.php";
$vragen[][] = '';

if (isset($_GET['vraag'])) {
    $vraag = $_GET['vraag'];
    $v_sql = "EXEC dbo.usp_Vraag_Select @VRAAG_NAAM = '$vraag'";
    $v_query = $conn->prepare($v_sql);
    $v_query->execute();
    $teller = 0;

    while($v_rows = $v_query->fetch(PDO::FETCH_ASSOC)){
        $vragen[$teller]['naam'] = $v_rows['VRAAG_NAAM'];
        $vragen[$teller]['titel'] = $v_rows['VRAAG_TITEL'];
        $vragen[$teller]['thema'] = $v_rows['THEMA'];
        $vragen[$teller]['nr'] = $v_rows['VRAAGONDERDEELNUMMER'];
        $vragen[$teller]['vraag'] = $v_rows['VRAAGONDERDEEL'];
        $vragen[$teller]['type'] = $v_rows['VRAAGSOORT'];
        $vragen[$teller]['antwoord'] = $v_rows['ANTWOORD'];
        $vragen[$teller]['punten'] = $v_rows['PUNTEN'];
        $teller++;
    }
    $vraag_naam = $vragen[0]['naam'];
    $v_titel = $vragen[0]['titel'];
    $v_thema = $vragen[0]['thema'];
    $v_naam_url = urlencode($vragen[0]['naam']);


} else {
    $vraag_naam = NULL;
    $v_naam_url = NULL;
    $v_titel = NULL;
    $v_thema = NULL;
    $e_plaats = NULL;
    $e_adres = NULL;
    $startdatum = NULL;
    $einddatum = NULL;
    $teller = 0;
}
?>
<!DOCTYPE html>
<html lang="en">

<?php
$titel = 'Vraag - ' . $vraag_naam;
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
                    <h1>Vraaggegevens van <?php echo $vraag_naam ?></h1>
                    <p>Gegevens van <?php echo $vraag_naam?></p>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Details</th>
                            <th>Gegevens</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Vraagnaam:</td>
                            <td><?php echo $vraag_naam; ?></td>
                        </tr>
                        <?php
                        if($v_titel != NULL){
                            echo "
                        <tr>
                            <td>Vraag titel:</td>
                            <td>$v_titel</td>
                        </tr>";
                        }
                        echo " <tr>
                            <td>Thema:</td>
                            <td>$v_thema</td>
                        </tr>
                        </tbody>
                        </table>";

                        foreach ($vragen as $vraag) {

                        ?>
                        <br>
                        <table class="table table-light" >
                            <tbody>
                            <tr>
                            <td><u><b>Vraagnummer:</b></u></td>
                            <td><?php echo $vraag['nr']; ?></td>
                        </tr>
                        <tr>
                            <td>Vraag:</td>
                            <td><?php echo $vraag['vraag']; ?></td>
                        </tr>
                        <tr>
                            <td>Type:</td>
                            <td><?php
                                if(strcasecmp($vraag['type'], 'O') == 0){
                                    $v_type = 'Open';
                                }
                                else if(strcasecmp($vraag['type'], 'O')){
                                    $v_type = 'Gesloten';
                                }
                                echo $v_type;?></td>
                        </tr>
                        <tr>
                            <td>Antwoord:</td>
                            <td><?php echo $vraag['antwoord']; ?></td>
                        </tr>
                        <tr>
                            <td>Aantal punten:</td>
                            <td><?php echo $vraag['punten']; ?></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <?php if(isset($_GET['beheerder'])){ ?>
                <div class="w3-container">
                    <?php
                    if (!isset($startdatum)) {
                        echo "<a class='btn btn-primary btn-lg' href='vraag_aanmaken.php'>Voeg vraag toe</a>&nbsp;";
                    }

                    echo "<a class=\"btn btn-warning btn-lg\" href=\"evenementAanpassen.php?evenement=$v_naam_url\">Gegevens aanpassen</a>
                             <a class=\"btn btn-danger btn-lg\" href=\"scripts/vraagVerwijdering.php?vraag=$v_naam_url\">Verwijder vraag</a>
                             </div>";
                    }
                    ?>
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