<?php $label = Template::getLabel($type); ?>
<div class="actions">
    <a href="<?= Html::url("$type/edition/{$item->id}") ?>" title="Editer <?= $label ?>">
        <svg width="15" height="15" role="img" class="edit">
            <use xlink:href="#edit"></use>
        </svg>
    </a>
    <?php if(!isset($done)): ?>
        <a href="<?= Html::url("$type/done/{$item->id}") ?>" title="Marquer <?= $label ?> comme accomplie">
            <svg width="15" height="15" role="img" class="done">
                <use xlink:href="#done"></use>
            </svg>
        </a>
    <?php endif; ?>
    <a href="<?= Html::url("$type/suppression/{$item->id}") ?>" title="Supprimer <?= $label ?>">
        <svg width="15" height="15" role="img" class="suppr">
            <use xlink:href="#suppr"></use>
        </svg>
    </a>
</div>