<?php
/**
 * Page
 * @author Antoine Ouellette
 */
require 'include/configuration.inc';
define("BACK_PAGE_PATH", $_SESSION['BACK_PAGE_PATH']);

// Si je proviens d'un formulaire POST
if (!empty($_POST))
{
    //*** Protection XSS *******************************************************************
    foreach ($_POST as $element => $valeur)
    {
        $_POST[$element] = htmlspecialchars($valeur);//Convertir les caracteres speciaux
    }

    //*** Initialisation des variables pour clarifier le code *****************************
    $email = $_POST['login_email'];
    $password = $_POST['login_password'];

    //*** Validation serveur PHP **********************************************************
    $messageErreur = '';//vide a la base.
    //Verifier Email:
    if (empty($email))// Si la variable est vide
    {
        $messageErreur .= 'L\'email est requis.<br />';
    }
    elseif (!filter_var($email, FILTER_VALIDATE_REGEXP, array("options" => array("regexp"=>"/^[\w\-\.]+@(carrefour\.|etudiant\.)?cegepvicto.ca$/"))))//Si la variable est un courriel cegep.
    {
        $messageErreur .= 'L\'email n\'est pas une adresse Cegep.<br />';
    }
    elseif (mb_strlen($password) > 50)//Si la variable est plus grande que 50 caracteres
    {
        $messageErreur .= 'L\'email depasse 50 caracteres.<br />';
    }
    //Verifier Password:
    if (empty($password))// Si la variable est vide
    {
        $messageErreur .= 'Le mot de passe est requis.<br />';
    }
    elseif (mb_strlen($password) > 100)//Si la variable est plus grande que 100 caracteres
    {
        $messageErreur .= 'Le mot de passe depasse 100 caracteres.<br />';
    }

    //La validation termine, Executer une action correspondante
    if ($messageErreur == '')
    {
        //Si il n'y a pas d'erreur

        //*** SQL *************************************************************************
        $requete = "SELECT email, password FROM utilisateur WHERE email=?";
        $stmt = $mysqli->prepare($requete);

        if ($stmt){

            $stmt->bind_param('s', $email);
            $stmt->execute();

            if (0 == $stmt->errno) {
                $_SESSION['operation_reussie'] = true;
                $_SESSION['message_operation'] = "";
            }
            else {
                $_SESSION['message_operation'] = "Nous sommes désolés, un problème technique nous empêche de vous connecter (code 1).";
            }
            $stmt->close();
        }
        else {
            $_SESSION['message_operation'] = "Nous sommes désolés, un problème technique nous empêche de vous connecter (code 2).";
        }
        //*********************************************************************************
    }
    else
    {
        //Si il y a une erreur.
        // Enregistrer que l'operation n'est pas reussie
        $_SESSION['operation_reussie'] = false;
        // Enregistrer tout le message d'erreur du formulaire
        $_SESSION['message_operation'] = $messageErreur;
        // Conserve les données du formulaire dans une variable de session.
        $_SESSION['POST'] = $_POST;
        //Renvoye les donnees POST au formulaire
    }

    //Redirection:
    if ($_SESSION['operation_reussie'] == true) {
        //retourne a la page precedente.
        $header = "location: " . BACK_PAGE_PATH;
        header($header);
    }
    else {
        //retourne a la page de login.
        header("location: login.php");
    }
}
// Si je ne proviens pas d'un formulaire POST
else
{
    // réagir si l'appel ne provient pas du formulaire
    $_SESSION[] = "";
    // par exemple, ici, on redirige vers la page d'accueil sans avertissement
    header("location: index-not-work.php");
}


require 'include/nettoyage.inc'; /* Appel nettoyage.inc */
?>