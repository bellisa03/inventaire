<nav role="navigation" style="padding-bottom: 30px">
    <ul class="nav nav-pills">
        <li role="presentation"><?= $this->Form->postLink(
                __('Supprimer'),
                ['action' => 'delete', $attribution->id],
                ['confirm' => __('Etes-vous sûr de vouloir supprimer l\'attribution # {0}?', $attribution->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Liste des attributions'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="attributions form large-9 medium-8 columns content">
    <?= $this->Form->create($attribution) ?>
    <fieldset style="padding-bottom: 30px">
        <legend><?= __('Modifier une attribution') ?></legend>
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
