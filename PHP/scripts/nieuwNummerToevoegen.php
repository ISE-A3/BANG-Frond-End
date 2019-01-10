<?php

require_once "connect.php";

    if (isset($_POST['voegtoe'])) {
        $titel = $_POST['titel'];
        $artiest = $_POST['artiest'];
        $top_sql = "EXEC dbo.usp_Nummer_Insert @titel = '".$titel."', @artiest = '".$artiest."'";
        $e_query = $conn->prepare($top_sql);
        $e_query->execute();

        //$error = $e_query->errorInfo();
        //$error2 = $e_query->errorCode();


        header("Location: nieuwNummer.php?error=");//. $error2);
    }
?>