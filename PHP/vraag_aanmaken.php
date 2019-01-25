<?php
$titel = 'Aanmaken Vraag';
include_once "header.php";

if (isset($_POST['toevoegen'])) {
    $_SESSION['VRAAGNAAM'] = $_POST['VRAAGNAAM'];
    $_SESSION['AANTALANTWOORDOPTIES'] = $_POST['AANTALANTWOORDOPTIES'];

    if(empty($_POST['VRAAGTITEL'])){
        $vraagtitel = " ";
    }
    else {
        $vraagtitel = $_POST['VRAAGTITEL'];
    }

    $e_sql = 'EXEC dbo.usp_Vraag_Insert @VRAAG_NAAM = \'' . $_POST['VRAAGNAAM'] . '\', @VRAAG_TITEL = \'' . $vraagtitel . '\'';
    echo $e_sql;
    $e_query = $conn->prepare($e_sql);
    $e_query->execute();

    if(empty($_POST['VRAAGTHEMA'])) {
        $vraagthema = " ";
    }
    else {
        $vraagthema = $_POST['VRAAGTHEMA'];
    }

    $e_sql2 = 'EXEC dbo.usp_Thema_Bij_Vraag_Insert @VRAAG_NAAM = \'' . $_POST['VRAAGNAAM'] . '\', @THEMA = \'' . $vraagthema . '\'';
    echo $e_sql2;
    $e_query2 = $conn->prepare($e_sql2);
    $e_query2->execute();

    $target_dir = "media/";
    $target_file = $target_dir . basename($_FILES["MEDIA"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["MEDIA"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["MEDIA"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    header("Location:bepaal_vraagtype.php");
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
                    <h1 style="margin-left: 17px;">Vraag Aanmaken</h1>
                    <div class="col-lg-6">
                        <section class="panel">
                            <header class="panel-heading">
                                Vraagnaam
                            </header>
                            <div class="panel-body">
                                <form method="POST" action="" role="form" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="VRAAGNAAM">Vraagnaam*</label>
                                        <input type="text" class="form-control" id="VRAAGNAAM" name="VRAAGNAAM" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="VRAAGTITEL">Vraagtitel</label>
                                        <input type="text" class="form-control" id="VRAAGTITEL" name="VRAAGTITEL">
                                    </div>
                                    <div class="form-group">
                                        <label for="VRAAGTHEMA">Vraagthema</label>
                                        <input type="text" class="form-control" id="VRAAGTHEMA" name="VRAAGTHEMA">
                                    </div>
                                    <div class="form-group">
                                        <label for="MEDIA">Media</label>
                                        <input type="file" class="form-control" id="MEDIA" name="MEDIA">
                                    </div>
                                    <p>*Dit veld is verplicht</p>
                            </div>
                        </section>
                        <section class="panel">
                            <header class="panel-heading">
                                Vraag toevoegen
                            </header>
                            <div class="panel-body">
                                    <p>Indien gesloten, hoeveel antwoordopties wilt u toevoegen?</p>
                                    <div class="form-group">
                                        <label for="inputSuccess">Aantal Antwoordopties</label>
                                            <select class="form-control m-bot15" name="AANTALANTWOORDOPTIES">
                                                <option value="OPEN">Ik wil een open vraag toevoegen</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="toevoegen">Ga door naar Toevoegen</button>
                                    <a class="btn btn-danger" href="evenement.php">Annuleer</a>
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