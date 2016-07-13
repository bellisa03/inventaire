<nav role="navigation" style="padding-bottom: 30px">
    <ul class="nav nav-pills">
        <li role="presentation"><?= $this->Html->link(__('Liste du matériel IT'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="itDevices form large-9 medium-8 columns content">
    <?= $this->Form->create($itDevice) ?>
    <fieldset style="padding-bottom: 30px">
        <legend><?= __('Ajouter une unité de matériel IT') ?></legend>
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
