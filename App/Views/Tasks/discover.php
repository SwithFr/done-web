<?php $title_for_layout = "Découvrez Done, le gestionnaire de tâche, en créant votre première tâche."; ?>
<?php if(!isset($_SESSION['discoverCompleted'])): ?>
    <a class="add-button <?= isset($_SESSION['hasProject']) ? '' : 'disabled' ?>" href="<?= Html::url("decouvrir/2") ?>">Tâche</a>
    <a class="add-button" href="<?= Html::url("decouvrir/1") ?>">Projet</a>
    <?php if($step == 0): ?>
        <section class="section">
            <h2 class="section__title">Créer une tâche</h2>
            <p class="section__content">
                Une tâche étant rarement privée d'un contexte, il est préférable de les ranger par "projet" pour rester organisé. "Projet" est le terme utilisé par Done pour exprimer un contexte mais vous pouvez imaginez ça comme une grosse catégorie, par exemple "Courses".
            </p>
            <p class="section__content">
                Pour ajouter un projet, cliquez sur le boutton en haut de la page <a class="add-button" href="<?= Html::url("decouvrir/1") ?>">Projet.</a>
            </p>
            <p class="section__content">
                N'ayant encore aucun projet, remarquez que vous ne pouvez ajouter de tâche pour le moment.
            </p>
        </section>
    <?php endif; ?>

    <section class="section section__hidden <?= $step == 1 ? 'section__visible' : '' ?>" id="add-project-section">
        <h2 class="section__title">Ajouter un projet</h2>
        <p class="section__content">
            Créer un projet est relativement simple ! Il suffit de choisir un nom.
        </p>
        <?= $this->element("add_project_form") ?>
        <p class="section__infos">Cette action ne nécessite aucune inscription.</p>
    </section>
    <section class="section section__hidden <?= $step == 2 ? 'section__visible' : '' ?>" id="add-task-section">
        <h2 class="section__title">Ajouter une tâche</h2>
        <p class="section__content">
            Pour ajouter une tâche, cliquez sur le boutton en haut de la page <a class="add-button" href="<?= Html::url("decouvrir/2") ?>">Tâche.</a>
        </p>
        <p class="section__content">
            Ensuite, il vous suffit de choisir un titre pour votre tâche et de l'associer à un projet.
        </p>
        <?= $this->element("add_task_form") ?>
    </section>
<?php else: ?>
    <?php unset($_SESSION['discoverCompleted']); ?>
    <section class="section">
        <h2 class="section__title"><b>Bravo</b>, votre tâche est créée !</h2>
        <p class="section__content">
            Vous avez complété avec succès les étapes pour découvrir le fonctionnement de Done. C'est facile n'est-ce pas ? Évidemment, Done ne se limite pas à cette simple fonctionnalité ! vous pouvez ajoutez des tags, des priorités ainsi que des notes sur vos tâches et vos projets. Tout est très simple d'utilisation. Créez un compte pour en profiter.
        </p>
        <a href="<?= Html::url('inscription') ?>" class="button">Inscrivez-vous !</a>
        <a href="<?= Html::url('non-merci') ?>">Non merci !</a>
    </section>
<?php endif; ?>

