<nav role="navigation" style="padding-bottom: 30px">
    <ul class="nav nav-pills">
        <li role="presentation"><?= $this->Html->link(__('Liste des attributions'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="form-group" style="padding-bottom: 30px">
    <?= $this->Form->create($attribution) ?>
    <fieldset style="padding-bottom: 30px">
        <legend><?= __('Ajouter une attribution') ?></legend>
        <?php
            echo $this->Form->label('Matériel IT');
            echo $this->Form->select('id_itdevices', $dropdown, ['class' => 'form-control']);
            echo $this->Form->label('Utilisateur');
            echo $this->Form->select('id_users', $users, ['class' => 'form-control']);
            echo $this->Form->input('date_start', ['empty' => true, 'label' => 'date de début']);
            echo $this->Form->input('date_end', ['empty' => true, 'label' => 'date de fin']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Sauvegarder')) ?>
    <?= $this->Form->end() ?>
</div>
