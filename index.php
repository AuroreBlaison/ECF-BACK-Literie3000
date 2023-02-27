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

<div class="catalogue">
    <?php
    foreach ($matelas as $oneMatelas) {
    ?>
        <div class="matelas">
            <img src="img/matelas/<?= $oneMatelas["picture"] ?>" alt="<?= $oneMatelas["modele"] ?>">
            <h2>
                <a href="matelas.php?id=<?= $oneMatelas["id"] ?>"> <?= $oneMatelas["marque"] ?> - <?= $oneMatelas["modele"] ?> </a>
            </h2>
        </div>
    <?php
    }
    ?>

</div>

<?php
include("templates/footer.php");
?>