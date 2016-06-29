<?php use Core\Helpers\Html; ?>
<div role="navigation" class="main-nav">
    <h1 class="main-nav__title">
        <a title="Redirige vers l'accueil du site Done" href="<?= Html::url('accueil') ?>">
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
        <?php if(!isset($_SESSION['usertoken'])): ?>
            <li><a title="Redirige vers le formulaire de connexion" href="<?= Html::url('connexion') ?>">Connexion</a></li>
            <li><a title="Redirige vers le formulaire d‘inscription" href="<?= Html::url("inscription") ?>">Inscription</a></li>
        <?php else: ?>
            <li><a title="Redirige vers la liste des projets et tâches" href="<?= Html::url("tableau-de-bord") ?>">Tableau de bord</a></li>
            <li><a title="Lien de déconnexion" href="<?= Html::url('au-revoir') ?>">Déconnexion</a></li>
        <?php endif; ?>
        <li><a title="Redirige vers la documentation de l'API pour développeurs" href="#">API</a></li>
    </ul>
</div>
