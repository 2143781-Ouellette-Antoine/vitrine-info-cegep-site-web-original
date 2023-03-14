<?php
/**
 *
 * @author Antoine Ouellette
 */
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