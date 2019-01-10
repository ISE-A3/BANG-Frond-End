<?php


?>

<!DOCTYPE html>
<html lang="en">

<?php
$titel = 'Bewerk Artiest - ' . $artiest;
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
                    <h1 style="margin-left: 325px;">Bewerk artiest</h1>
                    <p style="margin-left: 327px;">Verander de naam van een artiest via onderstaand formulier</p>
                    <div class="col-lg-4" style="position: fixed;margin-left: 310px;">
                        <section class="panel">
                            <header class="panel-heading">
                                <b><?php echo $artiest; ?></b>
                            </header>
                            <div class="panel-body">
                                <form method="POST" role="form">
                                    <div class="form-group">
                                        <label for="nieuweNaam">Nieuwe naam</label>
                                        <input type="text" class="form-control" name='nieuweNaam' id="nieuweNaam">
                                    </div>
                                    <div class="form-group">
                                        <label for="nieuweNaamB">Bevestig nieuwe naam</label>
                                        <input type="text" class="form-control" name='nieuweNaamB' id="nieuweNaamB">
                                    </div>
                                    <a class="btn btn-danger" href="nummers.php">Annuleer</a>
                                    <button type="submit" name='bewerk' class="btn btn-primary">Bewerk</button>
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