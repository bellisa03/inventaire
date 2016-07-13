<nav role="navigation" style="padding-bottom: 30px">
    <ul class="nav nav-pills">
        <li role="presentation"><?= $this->Html->link(__('Liste du mobilier'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="furnitures form large-9 medium-8 columns content">
    <?= $this->Form->create($furniture) ?>
    <fieldset style="padding-bottom: 30px">
        <legend><?= __('Ajouter un meuble') ?></legend>
        <?php
            echo $this->Form->input('id_equipments', ['label' => 'Matériel']);
            echo $this->Form->input('id_locations', ['label' => 'Localisation']);
            echo $this->Form->input('state', ['label' => 'Etat']);
            echo $this->Form->input('price', ['label' => 'Prix']);
            echo $this->Form->input('date_in', ['label' => 'Date d\'achat', 'empty' => true]);
            echo $this->Form->input('date_out', ['label' => 'Date de sortie', 'empty' => true]);
            echo $this->Form->input('note',['label' => 'Note', 'type' =>'textarea']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Sauvegarder')) ?>
    <?= $this->Form->end() ?>
</div>
