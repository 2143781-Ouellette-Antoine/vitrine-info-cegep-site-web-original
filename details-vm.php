<?php
/**
 *
 * @author Antoine Ouellette
 */
require 'include/configuration.inc';

if (empty($_GET)) {
    $idVM_string = "1";
    $idVM = 1;
} else {
    //*** Protection XSS ******************************************************************
    foreach ($_GET as $element => $valeur)
    {
        $_GET[$element] = htmlspecialchars($valeur);//Convertir les caracteres speciaux
    }

    //*** Initialisation des variables pour clarifier le code *****************************
    $idVM_string = htmlspecialchars($_GET['id']);
    $idVM = intval($idVM_string);
}

if ( !($idVM == 0) ) {//if not 0:
    $_SESSION['operation_reussie'] = false;
    //*** SQL *************************************************************************
    $requete = "SELECT nom, thumbnail_path FROM vm WHERE id=?";
    $stmt = $mysqli->prepare($requete);

    if ($stmt) {    // si la requête a fonctionné

        $stmt->bind_param('i', $idVM);
        $stmt->execute();

        if (0 == $stmt->errno) {
            $stmt->bind_result($vm_nom, $thumbnail_path);

            $stmt->fetch();

            $_SESSION['operation_reussie'] = true;
            $_SESSION['message_operation'] = "";
        }
        else {
            $_SESSION['message_operation'] = "Nous sommes désolés, un problème technique nous empêche de bien afficher la page (code 1).";
        }
        $stmt->close();
    }
    else {
        $_SESSION['message_operation'] = "Nous sommes désolés, un problème technique nous empêche de bien afficher la page (code 2).";
    }
    //*********************************************************************************
}
else {
    // réagir si le parametre n'est pas un int:
    $_SESSION[] = "";
    // on redirige vers la page d'accueil sans avertissement
    //header("location: index.php");
}

//Si la page retourne un message
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


/* Creation des variables de session a passer a html-head.inc */
$_SESSION['PAGE_NAME'] = $vm_nom;
$_SESSION['TAB_TITLE'] = $_SESSION['PAGE_NAME'];
$_SESSION['PAGE_DESCRIPTION'] = "Page de la machine virtuelle Ubuntu Desktop 22.04.2";
$_SESSION['INCLUDE_CSS_JS'] = ["css/details-vm.css"];
require 'include/html-head.inc';
?>
<body>
<!-- Navigation Bar -->
<?php
$_SESSION['NAVIGATION_BAR_TITLE'] = "";
$_SESSION['LOGIN_BUTTON'] = true;
require 'include/navigation-bar.inc';
?>

<!-- Content -->
<div id="GridContainerPage">
    <div id="GridContentPage">
        <h1><?php echo $_SESSION['PAGE_NAME'] ?></h1>
        <img src="<?php echo $thumbnail_path ?>">

        <h2>En ligne</h2>
        <a class="VerticalButton PageActionButton EmphasisButton" href="#">
            <img src="medias/stars-light.svg" alt="Icone étoiles" class="VerticalButtonIcon">
            <h3 class="VerticalButtonText">Nouvelle session</h3>
        </a>
        <a class="VerticalButton PageActionButton" href="#">
            <img src="medias/many-floppy-disks.svg" alt="Icone de plusieurs floppy disk" class="VerticalButtonIcon">
            <h3 class="font-accent-color VerticalButtonText">Charger une sauvegarde</h3>
        </a>
        <h2>Télécharger</h2>
        <a class="VerticalButton PageActionButton" href="#">
            <img src="medias/cd.svg" alt="Icone CD" class="VerticalButtonIcon">
            <h3 class="font-accent-color VerticalButtonText">Télécharger l'ISO</h3>
        </a>
        <a class="VerticalButton PageActionButton" href="#">
            <img src="medias/server.svg" alt="Icone disque dur" class="VerticalButtonIcon">
            <h3 class="font-accent-color VerticalButtonText">Télécharger le VHD</h3>
        </a>

        <h2>Description</h2>
        <p>
            Voici la description de la machine virtuelle.
        </p>
    </div>
</div>

<!-- Invisible -->
<div class="invisible">
    <!-- Navigation Bar -->
    <?php
    $_SESSION['NAVIGATION_BAR_TITLE'] = "";
    $_SESSION['LOGIN_BUTTON'] = true;
    require 'include/navigation-bar.inc';
    ?>
</div>

<!-- Footer -->
<?php
$_SESSION['BACK_BUTTON'] = true;
$_SESSION['BACK_PAGE_PATH'] = "liste-vm.php";
$_SESSION['FOOTER_ACTION_TEXT'] = "";
$_SESSION['FOOTER_ACTION_PATH'] = "";
require 'include/footer.inc';
?>