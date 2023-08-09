<?php
require_once "connexion.php";

if (!isset($_GET['ville'])) {
    header("Location: " . 'index.php');
};
$ville = $_GET['ville'];
$contrat = $_GET['contrat'];
$villeRecherchee = $connexion->select("bien", "*", "ville = '$ville' AND contrat = '$contrat'")

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
    <section class="firstSection">
        <?php
        if (!empty($villeRecherchee)) {
            echo '<h1>
                        Voici les habitations en ' . $contrat . ' à ' . $ville . '
                    </h1>';
        } else {
            echo '<a href=""><h1>Voir tous nos biens</h1></a>';
        }
        require_once "filtreIndex.php" ?>
    </section>
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
                    echo "Aucun résultats pour votre recherche réessayer avec une autre ville";
                }

                ?>
            </div>
        </div>
    </section>
</body>

</html>