<?php
require_once "connexion.php";
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
        <nav>

        </nav>
    </header>

    <!-- la première section avec le titre et la barre de filtre -->
    <section class="firstSection">
        <h1>
            Trouvez votre havre de paix
        </h1>
        <?php require_once "filtreIndex.php" ?>

        <p class="legende">- Explorez notre sélection d'immobilier d'exception dès aujourd'hui !</p>
    </section>
    <section id="secondSection">

        <!--  le carroussel -->
        <div class="carousel">
            <h2>
                Découvrez nos appartements
            </h2>

            <!-- les cartes du carroussel -->

            <?php
            $display = $connexion->select("bien", "*", "statut LIKE '%non%' LIMIT 5");

            foreach ($display as $bien) {
                echo
                '<div class="carousel-item">
                    <div class="carousel-box">
                        <div class="num">' . $bien['ville'] . '</div>
                        <a href="ca.php/?id_bien= ' . $bien['id_bien'] . '">
                            <div class="title">' . $bien['nom'] . '</div>
                        </a>
                        <img src="' . $bien['photo1'] . '" />
                    </div>
                </div>';
            }
            ?>
        </div>

        <div class="cursor"></div>
        <div class="cursor cursor2"></div>
    </section>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="script.js"></script>


</html>