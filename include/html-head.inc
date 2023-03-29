<?php
/**
 *
 * @author Antoine Ouellette
 */

 /*
Session TV
 */
require_once('include/api/api.php');

try {
    $api = new Api();
} catch (Exception $e) {
    // @todo Exception management
    // Could be a redirection to an error page
}

/* TV session */
if (isset($api)) {
    if (isset($_SESSION['TV_SESSION_ID'])) {
        if ($api->checkTvSession($_SESSION['TV_SESSION_ID'], $_SESSION['TV_SESSION_TOTP'])) {
            // TV session is active, we redirect the user to the proper page (if possible)
            switch ($_SESSION['PAGE_NAME']) {
                case "Fractales":
                    header("Location: liste-fractales.php");
                    exit();
                break;

                default:
                break;
            }
        } else { // TV session has expired
            // Clear old TV session data
            unset($_SESSION['TV_SESSION_ID']);
            unset($_SESSION['TV_SESSION_TOTP']);

            // Notify the user
            $_SESSION['notification'] = ["info", "Votre session TV a expiré suite à votre inactivité."];
        }
    }
}
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
    <link rel="stylesheet" href="css/notification.css">
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
    <script src="js/notification.js" defer></script>

</head>