<?php
/**
 *
 * @author Antoine Ouellette
 */
?>
<!DOCTYPE html>
<html lang="fr-CA">

<head>
    <title><?php echo $_SESSION['TAB_TITLE']?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $_SESSION['PAGE_DESCRIPTION']?>">
    <meta name="author" content="Antoine Ouellette">

    <link rel="icon" href="favicon.ico" type="image/png"/>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="ma-bibliotheque-popup/styles.css" />
    <script src="js/scripts.js" defer></script>
    <script src="ma-bibliotheque-popup/script.js"></script>
    <?php /*inclureJsPropreALaPageActuelle(); /*Caller la fonction dans le php*/?>

</head>

<body>