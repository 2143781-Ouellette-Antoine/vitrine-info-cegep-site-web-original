<?php
/**
 * Page
 * @author Antoine Ouellette
 */
/* Sauvegarder la page precedente. */
require 'include/configuration.inc';
$_SESSION['PAGE_NAME'] = "Se connecter";
$_SESSION['TAB_TITLE'] = "Connexion";
$_SESSION['PAGE_DESCRIPTION'] = "Page de connexion de la Vitrine informatique";
$_SESSION['INCLUDE_CSS_JS'] = ["css/login.css", "js/login.js"];
require 'include/html-head.inc';

//Si je provient du Formulaire
if (isset($_SESSION['POST']))
{
    // Récupère les données POST que le fichier traitement-formulaire.php avait stockées dans $_SESSION['POST'] .
    $donneesSaisiesPrecedemment = $_SESSION['POST'];
    $_SESSION['POST'] = null;//les vider.
}

//Si le formulaire retourne un message
if (isset($_SESSION['message_operation']) && !$_SESSION['message_operation']=="")
{
    //Message de reussite
    if ($_SESSION['operation_reussie'] == true)
    {
        echo "<div class='alert alert-success' role='alert'>";
    }
    //Message d'echec
    else
    {
        echo "<div class='alert alert-error' role='alert'>";
    }

    echo $_SESSION['message_operation'];//Affiche le contenu du message.
    echo "</div>";
    $_SESSION['message_operation'] = null;
    $_SESSION['operation_reussie'] = null;
}
?>
<body class="center-content">

<div id="login-container" class="center-content">
    <h1>Connexion</h1>
    <p id="InfoLogin">Connectez-vous avec votre adresse courriel du Cégep.</p>
    <form action="http://127.0.0.1/vitrine-info/traitement-login.php" method="post" name="formulaireAuthentification" id="formulaireAuthentification" onsubmit="return ValidationFormulaire()">
        <div class="form-group">
            <label for="login_email" class="font-accent-color">Courriel:</label>
            <input type="text" class="form-control" name="login_email" id="login_email" autofocus oninput="ValidationEmail()" placeholder="da@etudiant.cegepvicto.ca"
                   value="<?php echo $donneesSaisiesPrecedemment['login_email'] ?? '' ?>">
            <small class="font-error invisible">Erreur!</small>
        </div>
        <div class="form-group">
            <label for="login_password" class="font-accent-color">Mot de passe:</label>
            <input type="text" class="form-control" name="login_password" id="login_password" oninput="ValidationPassword()" placeholder="mot de passe"
                   value="<?php echo $donneesSaisiesPrecedemment['login_password'] ?? '' ?>">
            <small class="font-error invisible">Erreur!</small>
        </div>
        <!--Soumettre-->
        <div>
            <button type="submit" name="submitButton" class="Button">Se connecter</button>
        </div>
        <p id="EmailNote">
            da@etudiant.cegepvicto.ca<br>
            da@carrefour.cegepvicto.ca<br>
            nom.prenom@cegepvicto.ca
        </p>
    </form>
</div>

<!-- Footer -->
<?php
$_SESSION['BACK_BUTTON'] = true;

/*
HTTP_REFERER might not work with HTTPS and some browser might ommit it from the header section
*/
$_SESSION['BACK_PAGE_PATH'] = $_SERVER['HTTP_REFERER']??"index.php";
$_SESSION['FOOTER_ACTION_TEXT'] = "";
$_SESSION['FOOTER_ACTION_PATH'] = "";
require 'include/footer.inc';
?>
</body>