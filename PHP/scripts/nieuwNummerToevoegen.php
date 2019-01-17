<?php

require_once "connect.php";

    if (isset($_POST['voegtoe'])) {
        $titel = $_POST['titel'];
        $artiest = $_POST['artiest'];
        $top_sql = "EXEC dbo.usp_Nummer_Insert @titel = '".$titel."', @artiest = '".$artiest."'";
        $e_query = $conn->prepare($top_sql);
        $e_query->execute();

        $error = $e_query->errorCode();
        if (empty($error) || 00000 == $error){
            header("Location: nieuwNummer.php?result=success");
        }
        else{
            header("Location: nieuwNummer.php?result=error");
        }
    }
?>