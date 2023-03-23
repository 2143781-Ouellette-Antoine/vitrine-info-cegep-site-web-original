const REGEX_EMAIL = /^[\w\-\.]+@(carrefour\.|etudiant\.)?cegepvicto.ca$/;

// Les éléments html du formulaire utilisés dans le script
const inputEmail = document.getElementById('login_email');              //champ texte email
const inputPassword = document.getElementById('login_password');        //champ texte password
const smallErrorEmail = inputEmail.parentElement.querySelector('small');    //message erreur du email
const smallErrorPassword = inputPassword.parentElement.querySelector('small');    //message erreur du password

// Initialisation du bon affichage
smallErrorEmail.classList.add('invisible');          //Ajouter une class
smallErrorPassword.classList.add('invisible');       //Ajouter une class

function ValidationEmail() {
    let emailValid = false;
    AfficherMessage(inputEmail, "");//message d'erreur = null
    let valeurEmail = inputEmail.value;

    if(valeurEmail === "")//vide?
    {
        AfficherMessage(inputEmail, "L'adresse courriel ne peut pas être vide.");
    }
    else if(valeurEmail.length>50)
    {
        AfficherMessage(inputEmail, "L'adresse courriel ne peut pas dépasser 50 caractères.");
    }
    else if(!REGEX_EMAIL.test(valeurEmail))//Si c'est pas le regex.
    {
        AfficherMessage(inputEmail, "L'adresse courriel n'est pas celle du Cégep.");
    }
    else
    {
        emailValid = true;
    }

    return emailValid;//return ça à OnSubmit()
}

function ValidationPassword() {
    let passwordValid = false;
    AfficherMessage(inputPassword, "");//message d'erreur = null
    let valeurPassword = inputPassword.value;

    if(valeurPassword === "")//vide?
    {
        AfficherMessage(inputPassword, "Le mot de passe ne peut pas être vide.");
    }
    else if(valeurPassword.length>50)
    {
        AfficherMessage(inputPassword, "Le mot de passe ne peut pas dépasser 100 caractères.");
    }
    else
    {
        passwordValid = true;
    }

    return passwordValid;//return ça à OnSubmit()
}

function ValidationFormulaire()
{
    //Les deux return true
    return ValidationEmail()&&ValidationPassword();
}

/**
 * Affiche un message dans la première balise small du même niveau qu'un élément html
 * @param {HTMLElement} element L'élément html de départ
 * @param {string} message Le message à afficher
 */
function AfficherMessage(element, message = '') {
    const zoneMessage = element.parentElement.querySelector('small');
    zoneMessage.innerHTML = message;

    if(message !== '')
    {
        zoneMessage.classList.remove('invisible');
    }
}