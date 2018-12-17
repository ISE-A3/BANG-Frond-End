<?php
require_once "connect.php";

$error = '';

if (isset($_GET['id'])) {
    $e_id = $_GET['id'];
    $e_sql = "EXEC dbo.sp_evenement_select @e_id = " . $e_id;
    $e_query = $conn->prepare($e_sql);
    $e_query->execute();
    $e_row = $e_query->fetch(PDO::FETCH_ASSOC);
    $e_naam = $e_row["E_NAAM"];
    $e_datum = $e_row["E_DATUM"];
} else {
    header('location:evenement.php');
}

print_r($_POST);

if (isset($_POST["Startdatum"])) {
    $top_sql = 'EXEC dbo.sp_top100_insert @E_ID = ' . $_GET['id'] . ', @Startdatum = \'' . $_POST['Startdatum'] . '\', @Einddatum = \'' . $_POST['Einddatum'] . '\'';
    $top_query = $conn->prepare($top_sql);
    $top_query->execute();

    header("Location:evenementgegevens.php?id=" . $_GET['id']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">

    <title>Blank | Creative - Bootstrap 3 Responsive Admin Template</title>

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
                        <a href="javascript:" class="" style="border-bottom: none;border-right: none;">
                            <span style="font-size: 25px;">Pubquiz</span>
                            <span class="menu-arrow arrow_carrot-down"></span>
                        </a>
                    </li>
                    <li>
                        <a class="" href="" style="border-bottom: none;border-right: none;">
                            <i class="icon_genius"></i>
                            <span>Quizzen</span>
                        </a>
                    </li>
                    <li>
                        <a class="" href="" style="border-bottom: none;border-right: none;">
                            <i class="icon_question"></i>
                            <span>Vragen</span>

                        </a>
                    </li>


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
    <!--sidebar end-->
    <div class="w3-overlay w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" id="myOverlay"></div>
    <!--main content start-->
    <section id="main-content" style="margin-right: 10%;">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header" style="margin-left: 17px;"><i class="icon_house_alt"></i>Header komt hier</h3>
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
                    <h1>Top 100 voor het evenement <?php echo $e_naam ?></h1>
                    <p>Geef hieronder de inzendingsperiode door voor het evenement <?php echo $e_naam?> op <?php echo $e_datum?></p>
                    <div class="col-lg-6">
                        <section class="panel">
                            <header class="panel-heading">
                                Top 100 aanmaken
                            </header>
                            <div class="panel-body">
                                <form method="POST" action="" role="form">
                                    <div class="form-group">
                                        <label for="Startdatum">Startdatum</label>
                                        <input type="date" class="form-control" id="Startdatum" name="Startdatum">
                                    </div>
                                    <div class="form-group">
                                        <label for="Einddatum">Einddatum</label>
                                        <input type="date" class="form-control" id="Einddatum" name="Einddatum">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Aanmaken</button>
                                    <a class="btn btn-danger" href="evenementgegevens.php?id=<?php echo $e_id?>">Annuleer</a>
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