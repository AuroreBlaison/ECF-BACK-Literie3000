<?php

if (isset($_GET["id"])) {

    //connexion bdd
    $dsn = "mysql:host=localhost;dbname=literie3000";
    $db = new PDO($dsn, "root", "");

    $delete = $db->prepare("DELETE FROM matelas WHERE id= :id");
    $delete->bindParam(":id", $_GET["id"], PDO::PARAM_INT);

    if ( $delete->execute()) {
        header("location: index.php");
    };
}

?>
