<?php
/**
 *
 * @author Antoine Ouellette
 */
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    $currentURL = "https://";
else
    $currentURL = "http://";
// Append the host(domain name, ip) to the URL.
$currentURL .= $_SERVER['HTTP_HOST'];
// Append the requested resource location to the URL
$currentURL .= $_SERVER['REQUEST_URI'];

if($_SESSION['BACK_PAGE_PATH']==$currentURL)
{
    $_SESSION['BACK_PAGE_PATH'] = "index.php";
}
?>
<!-- Footer Bar -->
<div id="FooterBar">
    <a class="VerticalButton" href="<?php echo $_SESSION['BACK_PAGE_PATH']; ?>">
        <img src="medias/arrow-left.svg" alt="Icone fleche" id="BackIcon">
        <h3 class="font-accent-color"><?php echo $_SESSION['BACK_BUTTON'] ? "Retour" : "Quitter"; ?></h3>
    </a>

    <a class="VerticalButton <?php echo $_SESSION['FOOTER_ACTION_PATH']=="" ? "display-none" : ""; ?>" href="<?php echo $_SESSION['FOOTER_ACTION_PATH']; ?>">
        <h3 class="font-accent-color VerticalButtonText"><?php echo $_SESSION['FOOTER_ACTION_TEXT']; ?></h3>
        <img src="medias/arrow-left.svg" style="rotate: 180deg" alt="Icone connexion" class="VerticalButtonIcon">
    </a>
</div>