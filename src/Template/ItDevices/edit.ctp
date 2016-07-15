<nav role="navigation" style="padding-bottom: 30px">
    <ul class="nav nav-pills">
        <li role="presentation"><?= $this->Form->postLink(
                __('Supprimer'),
                ['action' => 'delete', $itDevice->id],
                ['confirm' => __('Etes-vous sûr de vouloir supprimer l\'unité de matériel IT # {0}?', $itDevice->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Liste du matériel IT'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="form-group" style="padding-bottom: 30px">
    <?= $this->Form->create($itDevice) ?>
    <fieldset style="padding-bottom: 30px">
        <legend><?= __('Modifier une unité de matériel IT') ?></legend>
        <?php
            echo $this->Form->input('id_equipments', ['label' => 'Identifiant']);
            echo $this->Form->input('note',['label' => 'Note', 'type' =>'textarea']);
            echo $this->Form->input('price', ['label' => 'Prix']);
            echo $this->Form->input('date_in', ['label' => 'Date d\'achat', 'empty' => true]);
            echo $this->Form->input('date_depreciated', ['label' => 'Date d\'amortissement', 'empty' => true]);
            echo $this->Form->input('date_out', ['label' => 'Date de sortie', 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Sauvegarder')) ?>
    <?= $this->Form->end() ?>
</div>
