<?php
/**
 * Page
 * @author Antoine Ouellette
 */
require 'include/configuration.inc';
define("BACK_PAGE_PATH", $_SESSION['BACK_PAGE_PATH']??"index.php");

// Si je proviens d'un formulaire POST
if (!empty($_POST))
{
    //*** Protection XSS ******************************************************************
    foreach ($_POST as $element => $valeur)
    {
        $_POST[$element] = htmlspecialchars($valeur);//Convertir les caracteres speciaux
    }

    //*** Initialisation des variables pour clarifier le code *****************************
    $email = strtolower($_POST['login_email']);
    $password = $_POST['login_password'];
    $_SESSION['operation_reussie'] = false;

    //*** Validation serveur PHP **********************************************************
    $messageErreur = '';//vide a la base.
    //Verifier Email:
    if (empty($email))// Si la variable est vide
    {
        $messageErreur .= 'L\'email est requis.<br />';
    }
    elseif (!filter_var($email, FILTER_VALIDATE_REGEXP, array("options" => array("regexp"=>"/^(([a-z\-]+(\.[a-z\-]+)+@)|(\d{6,}@((etudiant)|(carrefour))\.))cegepvicto\.ca$/"))))//Si la variable est un courriel cegep.
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
    elseif (strlen($password) > 72) //Si la variable est plus grande que 72 bytes
    {
        // BCRYPT est limité à 72 bytes
        $messageErreur .= 'Le mot de passe est trop long<br />';
    }

    //La validation termine, Executer une action correspondante
    if ($messageErreur == '')
    {
        //Si il n'y a pas d'erreur

        //*** SELECT **********************************************************************
        $requete = "SELECT password, password_salt FROM utilisateur WHERE email=?;";
        $stmt = $mysqli->prepare($requete);

        if ($stmt){

            $stmt->bind_param('s', $email);
            $stmt->execute();

            if (0 == $stmt->errno) {
                $stmt->store_result();

                if ($stmt->num_rows > 0)
                {
                    //Email Exists:
                    $stmt->bind_result($result_password, $result_salt);

                    if ($stmt->fetch()) {
                        if (password_verify($password . $result_salt, $result_password)) {
                            //Password Good.
                            $_SESSION['operation_reussie'] = true;
                            $_SESSION['message_operation'] = "Connecté avec succès!";
                        } else {
                            //Password Wrong.
                            $_SESSION['message_operation'] = "L'adresse courriel et le mot de passe ne correspondent pas.";
                        }
                    } else {
                        $_SESSION['message_operation'] = "Nous sommes désolés, un problème technique nous empêche de vous connecter (code 3).";
                    }

                    $stmt->close();
                }
                else
                {
                    //Email doesn't exist:
                    $stmt->close();

                    //*** INSERT **********************************************************************
                    //Hash new password.
                    try {
                        $salt = bin2hex(random_bytes(16));
                    } catch (Exception $e) {
                        $salt = md5(uniqid(mt_rand(), true));
                    }
                    $password = password_hash($password . $salt, PASSWORD_BCRYPT);
                    //Insert.
                    $requete = "INSERT INTO utilisateur(email, password, password_salt) VALUES (?, ?, ?)";
                    $stmt = $mysqli->prepare($requete);

                    if ($stmt){

                        $stmt->bind_param('sss', $email, $password, $salt);
                        $stmt->execute();

                        if (0 == $stmt->errno) {
                            $_SESSION['operation_reussie'] = true;
                            $_SESSION['message_operation'] = "Compte créé avec succès!";
                        }
                        else {
                            $_SESSION['message_operation'] = "Nous sommes désolés, un problème technique nous empêche de créer votre compte (code 1).";
                        }
                        $stmt->close();
                    }
                    else {
                        $_SESSION['message_operation'] = "Nous sommes désolés, un problème technique nous empêche de créer votre compte (code 2).";
                    }
                    //*********************************************************************************

                }
            }
            else {
                $_SESSION['message_operation'] = "Nous sommes désolés, un problème technique nous empêche de vous connecter (code 1).";
                $stmt->close();
            }
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
    if ($_SESSION['operation_reussie']) {
        //Declarer que Logged In
        $_SESSION['LOGGED_IN'] = true;
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
    header("location: index.php");
}

require 'include/nettoyage.inc';
?>