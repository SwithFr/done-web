<?php use Core\Helpers\Html; ?>
<div role="navigation" class="main-nav">
    <h1 class="main-nav__title">
        <a href="<?= Html::url('accueil') ?>">
            <svg width="24" height="24" role="img" class="logo">
                <use xlink:href="#logo"></use>
            </svg>
            DONE
            <span class="hidden">gestionnaire de tâches</span>
        </a>
    </h1>
    <a id="menu-closed" class="main-nav__icon" href="#open-menu" title="Ouvrir le menu">
        <svg width="24" height="24" role="img" class="nav">
            <use xlink:href="#nav"></use>
        </svg>
    </a>
    <ul id="open-menu">
        <li><a href="#menu-closed" title="Fermer le menu" class="close-menu">X</a></li>
        <li><a href="#">Connexion</a></li>
        <li><a href="#">Inscription</a></li>
        <li><a href="#">API</a></li>
    </ul>
</div>
