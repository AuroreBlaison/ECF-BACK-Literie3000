<?php

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
    <h1>modifier la référence :</h1>
    <h2> <?= $data["marque"] ?> - Matelas <?= $data["modele"] ?></h2>
    <img src="img/matelas/<?= $data["picture"] ?>" alt="<?= $data["modele"] ?>">

    <form action="" method="post">
        <div class="form-group">
            <h3> dimensions : <?= $data["taille"] ?></h3>
            <label for="inputTaille">Nouvelle taille :</label>
            <input type="text" id="inputTaille" name="taille">
        </div>

        <div class="form-group">
            <h3> Ancien prix : <?= $data["prix"] ?></h3>
            <label for="inputPrix">Nouveau prix :</label>
            <input type="number" id="inputPrix" name="prix">
        </div>

        <div class="form-group">
            <h3> ancien prix remisé: <?= $data["remise"] ?></h3>
            <label for="inputRemise">Prix remisé :</label>
            <input type="remise" id="inputRemise" name="remise">
        </div>

        <input type="submit" value="Valider les modifications" class="button" />
    </form>


<?php
}
include("templates/footer.php")
?>