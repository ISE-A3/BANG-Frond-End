<?php

$titel = 'Toevoegen Gesloten Vraag';
include_once "header.php";
$vraagnaam = /**$_SESSION['VRAAGNAAM'];*/ 'Testvraag6';
$aantal_antwoordopties = $_SESSION['AANTALANTWOORDOPTIES'];
$sql = "SELECT COUNT(*) FROM VRAAGONDERDEEL INNER JOIN VRAAG ON VRAAGONDERDEEL.VRAAG_ID = VRAAG.VRAAG_ID WHERE VRAAG_NAAM = '$vraagnaam'";
if ($res = $conn->query($sql)) {
    if ($res->fetchColumn() > 0) {
        $select = "SELECT MAX(VRAAGONDERDEELNUMMER) FROM VRAAGONDERDEEL GROUP BY VRAAGONDERDEELNUMMER, VRAAG_ID HAVING VRAAG_ID = (SELECT VRAAG_ID FROM VRAAG WHERE VRAAG_NAAM = '$vraagnaam')";
        $data = $conn->query($select);
        $array = $data->fetch();
        $maxvraagonderdeelnummer = $array['0'];
        $vraagonderdeelnummer = $maxvraagonderdeelnummer + 1;
    }
} else {
    $vraagonderdeelnummer = 1;
}


if (isset($_POST['geslotenvraag_toevoegen'])) {

    $e_sql = 'EXEC dbo.usp_Vraagonderdeel_Insert @VRAAG_NAAM = \'' . $vraagnaam . '\', @VRAAGONDERDEELNUMMER = \'' . $vraagonderdeelnummer . '\', @VRAAGONDERDEEL = \'' . $_POST['VRAAG'] . '\', @VRAAGSOORT = \'' . $_SESSION['VRAAGSOORT'] . '\'';
    $e_query = $conn->prepare($e_sql);
    $e_query->execute();


    $punten = 0;
    $huidige_antwoordoptie = 1;
    while($huidige_antwoordoptie <= $aantal_antwoordopties) {
        if($_POST['CORRECTANTWOORD'] == $_POST['ANTWOORDOPTIE' . $huidige_antwoordoptie .'']) {
            $punten = $_POST['AANTALPUNTEN'];
        }
        else {
            $punten = 0;
        }

        $e_sql2 = 'EXEC dbo.usp_Antwoord_Insert @VRAAG_NAAM = \'' . $vraagnaam . '\', @VRAAGONDERDEELNUMMER = \'' . $vraagonderdeelnummer . '\', @ANTWOORD = \'' . $_POST['ANTWOORDOPTIE' . $huidige_antwoordoptie . ''] . '\', @PUNTEN = \'' . $punten . '\'';
        echo $e_sql;
        $e_query = $conn->prepare($e_sql);
        $e_query->execute();
        $huidige_antwoordoptie++;

        $_SESSION['AANTALANTWOORDOPTIES'] = $_POST['AANTALANTWOORDOPTIES'];
        header("Location:bepaal_vraagtype.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

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
                    <h1 style="margin-left: 17px;"><?=$vraagnaam?></h1>
                    <div class="col-lg-6">
                        <section class="panel">
                            <header class="panel-heading">
                                Vraag Toevoegen
                            </header>
                            <div class="panel-body">
                                <form method="POST" action="" role="form">
                                    <div class="form-group">
                                        <label for="VRAAG">Vraag</label>
                                        <input type="text" class="form-control" id="VRAAG" name="VRAAG">
                                    </div>
                                    <?php
                                        $i = 0;
                                        while($i < $aantal_antwoordopties) {
                                            echo '<div class="form-group">
                                        <label for="ANTWOORDOPTIE' . ($i + 1) .'">Antwoordoptie ' . ($i + 1) . '</label>
                                        <input type="text" class="form-control" id="ANTWOORDOPTIE' . ($i + 1) . '" name="ANTWOORDOPTIE' . ($i + 1) . '">
                                        </div>';
                                            $i = $i + 1;
                                            }
                                    ?>
                                    <div class="form-group">
                                        <label for="CORRECTANTWOORD">Correct Antwoord</label>
                                        <input type="text" class="form-control" id="CORRECTANTWOORD" name="CORRECTANTWOORD">
                                    </div>
                                    <div class="form-group">
                                        <label for="AANTALPUNTEN">Aantal Punten Voor Correct Antwoord</label>
                                        <input type="text" class="form-control" id="AANTALPUNTEN" name="AANTALPUNTEN">
                                    </div>
                            </div>
                        </section>
                        <section class="panel">
                            <header class="panel-heading">
                                Nog een Vraag Toevoegen?
                            </header>
                            <div class="panel-body">
                                    <p>Indien gesloten, hoeveel antwoordopties wilt u toevoegen?</p>
                                    <div class="form-group">
                                        <label for="inputSuccess">Aantal Vraagopties</label>
                                        <select class="form-control m-bot15" name="AANTALANTWOORDOPTIES">
                                            <option>Ik wil een open vraag toevoegen</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="geslotenvraag_toevoegen">Nog Een Vraag Toevoegen</button>
                                    <a class="btn btn-danger" href="evenement.php">Aanmaken Afronden</a>
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

