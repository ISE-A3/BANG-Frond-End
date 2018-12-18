<?php

require_once "connect.php";


if (isset($_GET["id"])) {
    $e_id = $_GET['id'];
    if (isset($_POST['aanmaken'])) {
        $startdatum = $_POST['Startdatum'];
        $einddatum = $_POST['Einddatum'];
        $top_sql = "EXEC dbo.sp_top100_insert $e_id, '$startdatum', '$einddatum'";
        //$top_sql = "EXEC dbo.sp_top100_insert" . " " . $_GET["id"] . ", " . $_POST["Startdatum"] . ", " . $_POST["Einddatum"];
        $e_query = $conn->prepare($top_sql);
        $e_query->execute();

        header("Location:evenementgegevens.php?id=" . $_GET['id']);
    }
}
?>