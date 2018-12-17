<?php

require_once "connect.php";

if (isset($_GET["ID"])) {
    if (isset($_POST)) {
        $top_sql = "EXEC dbo.sp_top100_insert" . " " . $_GET["ID"] . ", " . $_POST["Startdatum"] . ", " . $_POST["Einddatum"];
        $e_query = $conn->prepare($e_sql);
        $e_query->execute();

        //header("Location:evenementgegevens.php?=" . $_GET['ID']);
    }
}
?>