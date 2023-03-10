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
<div class="absolute-position-title flexbox flex-direction-row flex-align-items-center flex-row-gap-10px">
    <img src="medias/server.svg" alt="Icone ailleurs"/>
    <h2 class="font-accent-color">Bienvenue à la vitrine de l'informatique</h2>
</div>

<!-- position normale -->
<div class="flexbox flex-center-center stretch-all" id="div-fill">
    <div class="flexbox flex-justify-content-center">
        <div class="block flexbox flex-direction-column flex-align-items-center flex-column-gap-20px no-stretch">
            <h1 class="padding-horizontal-30px no-stretch">Activités interactives</h1>
            <div id="grid-container-activities" class="width-50vw">

                <a class="Rounded-Rectangle flexbox flex-center-center">
                    <div class="flexbox flex-direction-column flex-align-items-center no-stretch">
                        <img src="medias/snowflake.svg" alt="Icone flocon de neige" class="no-stretch"/>
                        <p class="font-accent-color text-align-center no-stretch">Fractales</p>
                    </div>
                </a>

                <a class="Rounded-Rectangle flexbox flex-center-center">
                    <div class="flexbox flex-direction-column flex-align-items-center no-stretch">
                        <img src="medias/gaming-pad.svg" alt="Icone manette de jeu" class="no-stretch"/>
                        <p class="font-accent-color text-align-center no-stretch">Jeu Pong</p>
                    </div>
                </a>

                <a class="Rounded-Rectangle flexbox flex-center-center">
                    <div class="flexbox flex-direction-column flex-align-items-center no-stretch">
                        <img src="medias/globe.svg" alt="Icone globe" class="no-stretch"/>
                        <p class="font-accent-color text-align-center no-stretch">API</p>
                    </div>
                </a>

                <a class="Rounded-Rectangle flexbox flex-center-center">
                    <div class="flexbox flex-direction-column flex-align-items-center no-stretch">
                        <img src="medias/locked-file.svg" alt="Icone fichier cadenas" class="no-stretch"/>
                        <p class="font-accent-color text-align-center no-stretch">Capture the Flag</p>
                    </div>
                </a>

                <a class="Rounded-Rectangle flexbox flex-center-center">
                    <div class="flexbox flex-direction-column flex-align-items-center no-stretch">
                        <img src="medias/key.svg" alt="Icone clé" class="no-stretch"/>
                        <p class="font-accent-color text-align-center no-stretch">Cryptographie</p>
                    </div>
                </a>

                <a class="Rounded-Rectangle flexbox flex-center-center">
                    <div class="flexbox flex-direction-column flex-align-items-center no-stretch">
                        <img src="medias/power.svg" alt="Icone alimentation" class="no-stretch"/>
                        <p class="font-accent-color text-align-center no-stretch">Machines virtuelles</p>
                    </div>
                </a>

            </div>
        </div>
    </div>
</div>