<nav role="navigation" style="padding-bottom: 30px">
    <ul class="nav nav-pills">
        <li role="presentation"><?= $this->Form->postLink(
                __('Supprimer'),
                ['action' => 'delete', $location->id],
                ['confirm' => __('Etes-vous sûr de vouloir supprimer le local # {0}?', $location->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Liste des Locaux'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="locations form large-9 medium-8 columns content">
    <?= $this->Form->create($location) ?>
    <fieldset style="padding-bottom: 30px">
        <legend><?= __('Modifier un local') ?></legend>
        <?php
            echo $this->Form->input('title', ['label' => 'Dénommination']);
            echo $this->Form->input('building', ['label' => 'Bâtiment']);
            echo $this->Form->input('floor', ['label' => 'Etage']);
            echo $this->Form->input('description', ['label' => 'Description']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Sauvegarder')) ?>
    <?= $this->Form->end() ?>
</div>
