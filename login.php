<?php
/**
 * Page
 * @author Antoine Ouellette
 */
/* Sauvegarder la page precedente. */
require 'include/configuration.inc';
$_SESSION['BACK_PAGE_PATH'] = $_SERVER['HTTP_REFERER'];

$_SESSION['TAB_TITLE'] = "Se connecter";
require 'include/html-head.inc';
//require 'include/centered-content.inc';

//Si je provient du Formulaire
if (isset($_SESSION['POST']))
{
    // Récupère les données POST que le fichier traitement-formulaire.php avait stockées dans $_SESSION['POST'] .
    $donneesSaisiesPrecedemment = $_SESSION['POST'];
    $_SESSION['POST'] = null;//les vider.
}

//Si le formulaire retourne un message
if (isset($_SESSION['message_operation']))
{
    //Message de reussite
    if ($_SESSION['operation_reussie'] == true)
    {
        echo "<div class='alert alert-success' role='alert'>";
    }
    //Message d'echec
    else
    {
        echo "<div class='alert alert-danger' role='alert'>";
    }

    echo $_SESSION['message_operation'];//Affiche le contenu du message.
    echo "</div>";
    $_SESSION['message_operation'] = null;
    $_SESSION['operation_reussie'] = null;
}
?>

        <form action="http://127.0.0.1/vitrine-info/traitement-login.php" method="post" name="formulaireAuthentification" id="formulaireAuthentification">
            <div class="form-group">
                <label for="login_email" class="required">Email:</label>
                <input type="text" class="form-control" name="login_email" id="login_email" required autofocus
                       value="<?php echo $donneesSaisiesPrecedemment['identifiant_utilisateur'] ?? '' ?>">
                <small class="msgErreur form-text text-danger display-none">Erreur!</small>
            </div>
            <div class="form-group">
                <label for="login_password" class="required">Mot de passe:</label>
                <input type="text" class="form-control" name="login_password" id="login_password" required
                       value="<?php echo $donneesSaisiesPrecedemment['mot_de_passe'] ?? '' ?>">
                <small class="msgErreur form-text text-danger display-none">Erreur!</small>
            </div>
            <!--Soumettre-->
            <button type="submit" name="submitButton" class="btn bg-dark text-white border-dark rounded">Connexion</button>
        </form>