<?php

// connexion a ma bdd + recuperation des infos sous forme tableau associatif
$dsn = "mysql:host=localhost;dbname=literie3000";
$db = new PDO($dsn, "root", "");
$query = $db->query("SELECT * FROM matelas");
$matelas = $query->fetchAll(PDO::FETCH_ASSOC);

// var_dump($matelas);

include("templates/header.php")
?>

<h1>notre gamme</h1>

<div class="button">
    <a href="add_matelas.php"> Ajouter une référence</a>
</div>

<div class="catalogue">
    <?php
    foreach ($matelas as $oneMatelas) {
    ?>
        <div class="matelas">
            <h2>
                <?= $oneMatelas["marque"] ?>
            </h2>
            <h3>
                <?= $oneMatelas["modele"] ?>
            </h3>
            <img src="img/matelas/<?= $oneMatelas["picture"] ?>" alt="<?= $oneMatelas["modele"] ?>">
            <div class="button">
                <a href="matelas.php?id=<?= $oneMatelas["id"] ?>"> Voir en détail</a>
            </div>
        </div>
    <?php
    }
    ?>

</div>

<?php
include("templates/footer.php");
?>