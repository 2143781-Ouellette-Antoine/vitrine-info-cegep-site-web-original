<?php
/**
 *
 * @author Antoine Ouellette
 */
$_SESSION['TAB_TITLE'] = "Accueil - Vitrine informatique";
$_SESSION['PAGE_DESCRIPTION'] = "Page d'accueil de la Vitrine informatique";
require 'include/header-head.inc';
?>

<!-- position absolue -->
<div class="absolute-position-top-left flexbox flex-direction-row flex-align-items-center flex-row-gap-10px">
    <img src="medias/server.svg" alt="Icone ailleurs"/>
    <h2 class="font-accent-color">Bienvenue à la vitrine de l'informatique</h2>
</div>

<!-- position normale -->
<div class="flexbox flex-center-center stretch-all">
    <div class="flexbox flex-justify-content-center">
        <div class="block flexbox flex-direction-colomn flex-column-gap-20px no-stretch">
            <h1 class="padding-horizontal-30px">Êtes-vous devant la TV de la vitrine?</h1>
            <div class="flexbox flex-direction-row flex-row-gap-30px flex-grow-horizontal width-40vw">

                <a class="Rounded-Rectangle flexbox flex-center-center">
                    <div class="flexbox flex-direction-row no-stretch">
                        <img src="medias/tv.svg" alt="Icone TV"/>
                        <p class="font-accent-color">Devant la TV</p>
                    </div>
                </a>

                <a class="Rounded-Rectangle flexbox flex-center-center">
                    <div class="flexbox flex-direction-row no-stretch">
                        <img src="medias/logout.svg" alt="Icone ailleurs"/>
                        <p class="font-accent-color">Ailleurs</p>
                    </div>
                </a>

            </div>
        </div>
    </div>
</div>