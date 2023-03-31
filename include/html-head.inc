<?php
/**
 *
 * @author Antoine Ouellette
 */
?>
<!DOCTYPE html>
<html lang="fr-CA">

<head>
    <title><?php echo $_SESSION['TAB_TITLE']?> - Vitrine informatique</title>
    <meta charset="utf-8">
    <meta name="description" content="<?php echo $_SESSION['PAGE_DESCRIPTION']?>">
    <meta name="author" content="Antoine Ouellette">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="favicon.ico" type="image/png"/>
    <link rel="stylesheet" href="css/styles.css">
    <script src='js/script.js' defer></script>
    <?php
        //Pour chaque parametre
        foreach ($_SESSION['INCLUDE_CSS_JS'] as $path) {
            //si css
            if (substr_compare($path, ".css", -4) === 0) {
                echo "<link rel='stylesheet' href='" . $path . "'>";
            }
            //si js
            if (substr_compare($path, ".js", -3) === 0) {
                echo "<script src='" . $path . "' defer></script>";
            }
        }
    ?>

</head>