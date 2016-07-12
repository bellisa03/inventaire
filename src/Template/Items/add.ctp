<nav role="navigation" style="padding-bottom: 30px">
    <ul class="nav nav-pills">
        <li role="presentation"><?= $this->Html->link(__('Liste du matériel'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div style="padding-bottom: 30px; padding-right: 20px">
    <?= $this->Form->create($item) ?>
    <fieldset style="padding-bottom: 30px">
        <legend><?= __('Ajouter un matériel') ?></legend>
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
