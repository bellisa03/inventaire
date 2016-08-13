<nav role="navigation" style="padding-bottom: 30px">
    <ul class="nav nav-pills">
        <li role="presentation"><?= $this->Form->postLink(
                __('Supprimer'),
                ['action' => 'delete', $equipment->id],
                ['confirm' => __('Etes-vous sûr de vouloir supprimer le type de matériel # {0}?', $equipment->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Liste du matériel'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="form-group" style="padding-bottom: 30px">
    <?= $this->Form->create($equipment) ?>
    <fieldset style="padding-bottom: 30px">
        <legend><?= __('Modifier un type de matériel') ?></legend>
        <?php
            echo $this->Form->input('title', ['label' => 'Type de matériel']);
            echo $this->Form->input('brand', ['label' => 'Marque']);
            echo $this->Form->input('version', ['label' => 'Version']);
            echo $this->Form->input('description', ['label' => 'Description']);
            echo $this->Form->input('itdevice', ['label' => 'Matériel IT']);
            //echo $this->Form->input('barcode', ['label' => 'Code Barre']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Sauvegarder')) ?>
    <?= $this->Form->end() ?>
</div>
