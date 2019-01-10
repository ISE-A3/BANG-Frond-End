<?php

require_once "connect.php";


if (isset($_GET['evenement'])) {
    $evenement = $_GET['evenement'];
    if (isset($_POST['aanmaken'])) {
        $titel = $_POST['pubquiztitel'];
        $top_sql = "EXEC dbo.usp_Pubquiz_Insert '$evenement', '$titel'";
        $e_query = $conn->prepare($top_sql);
        $e_query->execute();

        header("Location:evenementgegevens.php?evenement=" . $evenement);
    }
}
?>