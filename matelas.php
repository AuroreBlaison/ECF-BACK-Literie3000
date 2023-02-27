<?php

$find = false;
$data = array("modele" => "reference introuvable");

if (isset($_GET["id"])) {

    //connexion bdd
    $dsn = "mysql:host=localhost;dbname=literie3000";
    $db = new PDO($dsn, "root", "");

    //requete preparée
    $query = $db->prepare("SELECT * FROM matelas WHERE id= :id");
    $query->bindParam(":id", $_GET["id"], PDO::PARAM_INT);
    $query->execute();
    $oneMatelas = $query->fetch();

    //verification que l'id existe bien en bdd
    if ($oneMatelas) {
        $find = true;
        $data = $oneMatelas;
    }
}

include("templates/header.php");

if ($find) {
?>
    <h1> <?= $data["marque"] ?> - Matelas <?= $data["modele"] ?></h1>
    <img src="img/matelas/<?= $data["picture"] ?>" alt="<?= $data["modele"] ?>">
    <div class="price">
        <h3>prix :</h3>
        <p class="basic-price"><?= $data["prix"] ?>€</p>
        <p class="sales-price"><?= $data["remise"] ?>€</p>
    </div>

    <div class="size">
        <h3>Tailles disponibles :</h3>
        <p class="size-available">
            <?= $data["taille"] ?>
        </p>
    </div>
    
    <div class="button">
        <!-- ajouter <a> vers modification -->
        modifier
    </div>

    <div class="button">
        <input type="submit" name="delete" value="Supprimer">
        <?php
        $delete = $db->prepare("DELETE FROM matelas WHERE id= :id");
        $delete->bindParam(":id", $_GET["id"], PDO::PARAM_INT);
        $delete->execute()
        ?>

    </div>


<?php
}
include("templates/footer.php");
?>