<?php
require_once "connexion.php";

// renvoie à la page acceuil si aucune recherche effectuée
if (!isset($_GET['contrat'])) {
    header("Location: " . 'index.php');
};

// séléctionne dans la base de donnée selon si la recherche se fait pour un achat ou pour une location
if (isset($_GET['inputVente'])) {
    $ville = $_GET['inputVente'];
    $contrat = $_GET['contrat'];
    $villeRecherchee = $connexion->select("bien", "*", "ville = '$ville' AND contrat = '$contrat'");
} else if (isset($_GET['inputLocation'])) {
    $ville = $_GET['inputLocation'];
    $contrat = $_GET['contrat'];
    $villeRecherchee = $connexion->select("bien", "*", "ville = '$ville' AND contrat = '$contrat'");
}



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
        <!-- la première section avec la barre de filtre et des infos sur la recherche -->
        <section class="firstSection">
            <?php
            if (!empty($villeRecherchee)) {
                echo '<h1>
                    Voici les habitations en ' . $contrat . ' à <span class="ville">' . $ville . '</span> 
                </h1>';
                require_once "composants/filtreIndex.php";
            } else {
                echo '<h1>
                    Sorry, pas de ' . $contrat . ' à <span class="ville">' . $ville . '</span> !
                </h1>';
                require_once "composants/filtreIndex.php";
                echo "<p class='legende'>Aucun résultats pour votre recherche réessayer avec une autre ville</p>";
            }
            ?>
        </section>
        <!-- la deuxième section qui contient les résultats de recherche sous forme de cartes -->
        <section class="secondSection">
            <div class="wrapper">
                <div class="cols">
                    <?php
                    if (!empty($villeRecherchee)) {
                        foreach ($villeRecherchee as $bien) {
                            echo
                            " 
                        
                            <div class='col' ontouchstart='this.classList.toggle('hover');'>
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
                    } else {
                        echo '<a href="biens.php"><h3>Voir tous nos biens</h3></a>';
                    }
                    ?>
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