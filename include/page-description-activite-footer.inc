<?php
/**
 * Page
 * @author Antoine Ouellette
 */
?>

</div>
<!-- Fin Contenu -->
<div class="stretch-horizontal" id="Footer-description-activite">
    <div class="flexbox flex-direction-row flex-justify-content-space-between margin-all-20px">
            <a class="Rounded-Rectangle flexbox flex-center-center padding-horizontal-20px padding-vertical-10px" href="<?php echo $_SESSION['BACK_PAGE_PATH']; ?>">
                <div class="flexbox flex-direction-row flex-align-items-center no-stretch">
                    <img src="medias/arrow-left.svg" alt="Icone de retour" class="no-stretch" style="height: 2.8em"/>
                    <p class="font-accent-color text-align-center no-stretch">Retour</p>
                </div>
            </a>
            <a class="Rounded-Rectangle flexbox flex-center-center padding-horizontal-20px padding-vertical-10px <?php echo $_SESSION['FOOTER_ACTION_PATH'] == "" ? "display-none" : ""; ?>" href="<?php echo $_SESSION['FOOTER_ACTION_PATH']; ?>">
                <div class="flexbox flex-direction-row flex-align-items-center no-stretch">
                    <p class="font-accent-color text-align-center no-stretch">Se connecter à la TV</p>
                    <img src="medias/arrow-left.svg" alt="Icone se connecter" class="rotate-180 no-stretch" style="height: 2.8em"/>
                </div>
            </a>
    </div>
</div>