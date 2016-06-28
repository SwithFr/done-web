<?php use Core\Helpers\Html;

$title_for_layout = "Done - Bienvenue sur la page d'accueil de Done, le gestionnaire de tâche qui vous simplifie la vie."; ?>

<section class="section">
    <h2 class="section__title">Une manière <b>simple</b> de rester organisé</h2>
    <p class="section__content">
        Créez autant de projets que vous le souhaitez. Organisez-les par étiquettes et/ou priorités.
    </p>
    <p class="section__content">
        Ajoutez des tâches à vos projets. Définissez vos échéances.
    </p>
    <p class="section__content">
        Accomplissez vos tâches et débloquez des succès amusants !
    </p>
    <a href="<?= Html::url("decouvrir/0") ?>" class="button">Je créé ma première tâche !</a>
    <div class="linksToConnect">
        <a href="<?= Html::url("inscription") ?>">Je m'inscris</a> / <a href="<?= Html::url('connexion') ?>">Je me connecte</a>
    </div>
</section>
<section>
    <h2 class="section__title section__content--smaller"><b>Optimisez</b> votre temps</h2>
    <p class="section__content">
        Done, en plus d’être entièrement gratuit est vraiment très simple d’utilisation. Vous pouvez <a href="<?= Html::url("decouvrir/0") ?>">créez votre première tâche</a> pour le vérifier avant de vous inscrire. Ne perdez plus votre temps en éparpillant vos notes sur des post-it qui peuvent s’envoler… Centralisez toutes vos tâches en un même lieu où elles seront bien gardées !
    </p>
</section>
<section>
    <h2 class="section__title section__content--smaller">Gardez le <b>contrôle</b></h2>
    <p class="section__content">
        Classez vos projets et vos tâches par étiquettes ou priorités. Définissez vous-même vos tags et  libèlés de priorités et ajoutez en autant que vous le voulez, il n’y a pas de limite ! Vous pourrez également ajouter des couleurs et des états à vos tâches pour un repère visuel plus éfficace.
    </p>
</section>