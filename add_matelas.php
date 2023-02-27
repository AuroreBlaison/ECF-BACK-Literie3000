<?php

if (!empty($_POST)) {

    //securisation des données saisies > faille XSS
    $marque = trim(strip_tags($_POST["marque"]));
    $modele = trim(strip_tags($_POST["modele"]));
    $taille = trim(strip_tags($_POST["taille"]));
    $prix = trim(strip_tags($_POST["prix"]));
    $remise = trim(strip_tags($_POST["remise"]));
    $picture = trim(strip_tags($_POST["picture"]));

    //initialisation d'un tableau d'erreur
    $errors = [];

    //verifications que les champs sont bien remplis
    if (empty($marque)) {
        $errors["marque"] = "Veuillez renseigner la marque pour cette référence";
    }

    if (empty($modele)) {
        $errors["modele"] = "Veuillez renseigner le modèle pour cette référence";
    }

    if (empty($taille)) {
        $errors["taille"] = "Veuillez specifier la taille pour cette référence";
    }

    if (empty($prix)) {
        $errors["prix"] = "Veuillez renseigner le prix pour cette référence";
    }

    if (empty($errors)) {
        //connexion bdd
        $dsn = "mysql:host=localhost;dbname=literie3000";
        $db = new PDO($dsn, "root", "");

        //requete d'insertion en bdd avec une requete preparée
        $query = $db->prepare("INSERT INTO matelas
        (marque, modele, taille, prix, remise, picture)
        VALUES (:marque, :modele, :taille, :prix, :remise, :picture)");
        $query->bindParam(":marque", $marque);
        $query->bindParam(":modele", $modele);
        $query->bindParam(":taille", $taille);
        $query->bindParam(":prix", $prix, PDO::PARAM_INT);
        $query->bindParam(":remise", $remise, PDO::PARAM_INT);
        $query->bindParam(":picture", $picture);

        if ($query->execute()) {
            header("location: index.php");
        }
    }
}

include("templates/header.php")
?>

<h1> Ajouter une nouvelle référence</h1>

<form action="" method="post">
    <div class="form-group">
        <label for="inputMarque">Marque :</label>
        <input type="text" id="inputMarque" name="marque">
        <?php
        if (isset($errors["marque"])) {
        ?>
            <span class="info-error"> <?= $errors["marque"] ?> </span>
        <?php
        }
        ?>
    </div>

    <div class="form-group">
        <label for="inputModele">Modèle :</label>
        <input type="text" id="inputModele" name="modele">
        <?php
        if (isset($errors["modele"])) {
        ?>
            <span class="info-error"> <?= $errors["modele"] ?> </span>
        <?php
        }
        ?>
    </div>

    <div class="form-group">
        <label for="inputTaille">Taille :</label>
        <input type="text" id="inputTaille" name="taille">
        <?php
        if (isset($errors["taille"])) {
        ?>
            <span class="info-error"> <?= $errors["taille"] ?> </span>
        <?php
        }
        ?>
    </div>

    <div class="form-group">
        <label for="inputPrix">Prix :</label>
        <input type="number" id="inputPrix" name="prix">
        <?php
        if (isset($errors["prix"])) {
        ?>
            <span class="info-error"> <?= $errors["prix"] ?> </span>
        <?php
        }
        ?>
    </div>

    <div class="form-group">
        <label for="inputRemise">Prix remisé :</label>
        <input type="remise" id="inputRemise" name="remise">
    </div>

    <div class="form-group">
        <label for="inputPicture">Image :</label>
        <input type="text" id="inputPicture" name="picture">
    </div>

    <input type="submit" value="Ajouter la réference" class="button" />
</form>

<?php
include("templates/footer.php")
?>