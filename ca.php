<?php
require_once "connexion.php";
if (!isset($_GET['id_bien'])) {
    header("Location: " . 'index.php');
};
$bienSelectionne = isset($_GET['id_bien']) ? $_GET['id_bien'] : 0;

$bienAffiche = $connexion->select("bien", "*", "id_bien = $bienSelectionne");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Immo</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <!-- la barre de navigation avec la barre de recherche-->
    <header>
        <?php require_once "composants/navbar.php"; ?>
    </header>
    <main>
        <?php

        foreach ($bienAffiche as $bien) {
            echo $bien['nom'];
        }
        ?>
    </main>

    <footer>
        <?php require_once "composants/footer.php" ?>
    </footer>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="script.js"></script>


</html>