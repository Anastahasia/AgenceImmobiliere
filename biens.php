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
        <?php
        require_once "composants/navbar.php";
        ?>
    </header>

    <main>
        <section class="firstSection">
            <h1>
                Trouvez votre havre de paix
            </h1>
            <?php require_once "composants/filtreIndex.php" ?>

        </section>
        <section class="secondSection">
            <div class="card-container">
                <h2>N'hésitez plus faites nous confiance pour votre prochain cocon</h2>
                <div class="wrapper">
                    <div class="cols">
                        <!-- Affiche les logements disponibles en location -->
                        <?php
                        if (isset($_GET['location'])) {
                            $display = $connexion->select("bien", "*", "statut LIKE '%non%' AND contrat LIKE 'location'");
                            foreach ($display as $bien) {
                                echo
                                "<div class='col' ontouchstart='this.classList.toggle('hover');'>
                                    <div class='container'>
                                        <div class='front' style='background-image: url(" . $bien['photo1'] . ");background-repeat:no-repeat'>
                                            <div class='inner'>
                                                <p>" . $bien['nom'] . "</p>
                                                <span>" . $bien['ville'] . "</span>
                                            </div>
                                        </div>
                                        <div class='back'>
                                            <div class='inner'>
                                                <a href='ca.php/?id_bien= " . $bien['id_bien'] . "'><p class='description'>" . $bien['description'] . "</p></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ";
                            }
                            
                        } // <!-- Affiche les logements disponibles à la vente -->
                        elseif (isset($_GET['vente'])) {
                            $display = $connexion->select("bien", "*", "statut LIKE '%non%' AND contrat LIKE 'vente'");
                            foreach ($display as $bien) {
                                echo
                                "<div class='col' ontouchstart='this.classList.toggle('hover');'>
                                    <div class='container'>
                                        <div class='front' style='background-image: url(" . $bien['photo1'] . ");background-repeat:no-repeat'>
                                            <div class='inner'>
                                                <p>" . $bien['nom'] . "</p>
                                                <span>" . $bien['ville'] . "</span>
                                            </div>
                                        </div>
                                        <div class='back'>
                                            <div class='inner'>
                                                <a href='ca.php/?id_bien= " . $bien['id_bien'] . "'><p class='description'>" . $bien['description'] . "</p></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                ";
                            }
                         } // <!-- Affiche tous les logements disponibles à la vente et en location-->
                        else{
                            $display = $connexion->select("bien", "*", "statut LIKE '%non%'");
                        foreach ($display as $bien) {
                            echo
                            "   <div class='col' ontouchstart='this.classList.toggle('hover');'>
                                    <div class='container'>
                                        <div class='front' style='background-image: url(" . $bien['photo1'] . ");background-repeat:no-repeat'>
                                            <div class='inner'>
                                                <p>" . $bien['nom'] . "</p>
                                                <span>" . $bien['ville'] . "</span>
                                            </div>
                                        </div>
                                        <div class='back'>
                                            <div class='inner'>
                                                <a href='ca.php/?id_bien= " . $bien['id_bien'] . "'><p class='description'>" . $bien['description'] . "</p></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                ";
                        }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <?php require_once "composants/footer.php" ?>
    </footer>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="script.js"></script>

</html>