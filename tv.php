<?php
/**
 * Page
 * @author Antoine Ouellette
 */
/* Sauvegarder la page precedente. */
require 'include/configuration.inc';
$_SESSION['PAGE_NAME'] = "Connexion TV";
$_SESSION['TAB_TITLE'] = $_SESSION['PAGE_NAME'];
$_SESSION['PAGE_DESCRIPTION'] = "Page de connexion à la TV de la Vitrine informatique";
$_SESSION['INCLUDE_CSS_JS'] = ["css/tv.css", "js/tv.js"];
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

    <div class="VerticalButton" id="OTPExample">
        <h3 class="VerticalButtonText">XYZ XYZ</h3>
    </div>

    <h1>Tapez le code affiché près de la TV</h1>
    <form action="http://127.0.0.1/vitrine-info/traitement-tv.php" method="post" name="formulaireTOTPTV" id="formulaireTOTPTV" onsubmit="return true">
        <div class="container">
            <div class="inputfield">
                <input type="number" maxlength="1" class="input" disabled />
                <input type="number" maxlength="1" class="input" disabled />
                <input type="number" maxlength="1" class="input" disabled />
                <input type="number" maxlength="1" class="input" disabled />
                <input type="number" maxlength="1" class="input" disabled />
                <input type="number" maxlength="1" class="input" disabled />
            </div>
            <button class="" id="submit" onclick="validateOTP()">Submit</button>
        </div>
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