<?php use Core\Helpers\Text; ?>
<?= $this->element("search_task_form") ?>
<?= $this->element("add_buttons") ?>
<h1><span class="hidden">Vos tâches pour </span>Aujourd'hui</h1>
<ul class="projects">
    <li class="project">
        <h2 style="color:red;">Titre du projet</h2>
        <div class="actions">
            <a href="" title="Editer le projet">
                <svg width="15" height="15" role="img" class="edit">
                    <use xlink:href="#edit"></use>
                </svg>
            </a>
            <a href="" title="Marquer le projet comme accomplie">
                <svg width="15" height="15" role="img" class="done">
                    <use xlink:href="#done"></use>
                </svg>
            </a>
            <a href="" title="Supprimer le projet">
                <svg width="15" height="15" role="img" class="suppr">
                    <use xlink:href="#suppr"></use>
                </svg>
            </a>
        </div>
        <ul class="project__tasks">
            <?php for($i = 0; $i < 3; $i++): ?>
                <li class="task">
                    <h3 style="color:blue;">Titre de la tâche</h3>
                    <p class="task_note">
                        <?= Text::cut("Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi hic mollitia odit officia perspiciatis qui reprehenderit? Autem deleniti deserunt eius facilis fugiat magni neque obcaecati, perferendis provident quam, sequi, vel!", 100) ?>
                    </p>
                    <div class="actions">
                        <a href="" title="Editer la tâche">
                            <svg width="15" height="15" role="img" class="edit">
                                <use xlink:href="#edit"></use>
                            </svg>
                        </a>
                        <a href="" title="Marquer la tâche comme accomplie">
                            <svg width="15" height="15" role="img" class="done">
                                <use xlink:href="#done"></use>
                            </svg>
                        </a>
                        <a href="" title="Supprimer la tâche">
                            <svg width="15" height="15" role="img" class="suppr">
                                <use xlink:href="#suppr"></use>
                            </svg>
                        </a>
                    </div>
                </li>
            <?php endfor; ?>
        </ul>
    </li>
</ul>