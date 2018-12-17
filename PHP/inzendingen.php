<?php
//include_once "header.php";
require_once('scripts/checkinzending.php'); // Inzending check script
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Top 5</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
    <!-- Navbar style css -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

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
                    <li>
                        <a class="" href="inzendingen.php" style="border-bottom: none;border-right: none;">
                            <i class="icon_pencil-edit"></i>
                            <span>Inzendingen</span>
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
                    <p style="width: 68%;padding-left: 315px;"></p>
                    <div class="row">
                        <div class="col-lg-4" style="position: fixed;margin-left: 310px;">
                            <section class="panel">
                                <header class="panel-heading">
                                    Top 5   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php
                                    if(isset($_POST['verwerk'])) {

                                        if(empty($error)) {
                                            echo "<b style='color: green;'>De vorige inzending is succesvol verwerkt</b>";
                                        }
                                        else echo "<b style='color: red;'>". $error . "</b>";
                                    }
                                    ?>
                                </header>
                                <div class="panel-body">
                                    <form role="form" method="POST" action="inzendingen.php">
                                        <div class="form-group">
                                            <label for="mailadres">E-mailadres</label>
                                            <input type="email" class="form-control" name="mailadres" placeholder="E-mailadres">
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
                                                1.&nbsp;<input type="text" class="form-control" name="nummer1" placeholder="Nummer" style="width: 48%;">
                                                <input type="text" class="form-control" name="artiest1" placeholder="Artiest" style="width: 48%;margin-left: 4%">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="top5" id="top5" style="display: flex;">
                                                2.&nbsp;<input type="text" class="form-control" name="nummer2" placeholder="Nummer" style="width: 48%;">
                                                <input type="text" class="form-control" name="artiest2" placeholder="Artiest" style="width: 48%;margin-left: 4%">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="top5" id="top5" style="display: flex;">
                                                3.&nbsp;<input type="text" class="form-control" name="nummer3" placeholder="Nummer" style="width: 48%;">
                                                <input type="text" class="form-control" name="artiest3" placeholder="Artiest" style="width: 48%;margin-left: 4%">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="top5" id="top5" style="display: flex;">
                                                4.&nbsp;<input type="text" class="form-control" name="nummer4" placeholder="Nummer" style="width: 48%;">
                                                <input type="text" class="form-control" name="artiest4" placeholder="Artiest" style="width: 48%;margin-left: 4%">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="top5" id="top5" style="display: flex;">
                                                5.&nbsp;<input type="text" class="form-control" name="nummer5" placeholder="Nummer" style="width: 48%;">
                                                <input type="text" class="form-control" name="artiest5" placeholder="Artiest" style="width: 48%;margin-left: 4%">
                                            </div>
                                        </div>
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

