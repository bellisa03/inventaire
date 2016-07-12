<nav role="navigation" style="padding-bottom: 30px">
    <ul class="nav nav-pills">
        <li role="presentation"><?= $this->Form->postLink(
                __('Supprimer'),
                ['action' => 'delete', $item->id],
                ['confirm' => __('Etes-vous sûr de vouloir supprimer le matériel # {0}?', $item->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Liste du matériel'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="items form large-9 medium-8 columns content">
    <?= $this->Form->create($item) ?>
    <fieldset>
        <legend><?= __('Modifier le matériel') ?></legend>
        <?php
            echo $this->Form->input('date_in', ['label' => 'Date d\'achat']);
            echo $this->Form->input('date_out', ['label' => 'Date de sortie', 'empty' => true]);
            echo $this->Form->input('price', ['label' => 'Prix']);
            echo $this->Form->input('note', ['label' => 'Note', 'type' =>'textarea']);
            echo $this->Form->input('id_equipments', ['label' => 'Type de matériel']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Sauvegarder')) ?>
    <?= $this->Form->end() ?>
</div>
