<nav role="navigation" style="padding-bottom: 30px">
    <ul class="nav nav-pills">
        <li role="presentation"><?= $this->Form->postLink(
                __('Supprimer'),
                ['action' => 'delete', $furniture->id],
                ['confirm' => __('Etes-vous sûr de vouloir supprimer le meuble # {0}?', $furniture->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Liste du mobilier'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="furnitures form large-9 medium-8 columns content">
    <?= $this->Form->create($furniture) ?>
    <fieldset style="padding-bottom: 30px">
        <legend><?= __('Modifier un meuble') ?></legend>
        <?php
            echo $this->Form->label('Type de matériel');
            echo $this->Form->select('id_equipments', $dropdown, ['class' => 'form-control']);
            echo $this->Form->label('Localisation');
            echo $this->Form->select('id_locations', $locations, ['class' => 'form-control']);
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
