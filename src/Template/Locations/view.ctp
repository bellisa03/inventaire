<nav role="navigation" style="padding-bottom: 30px">
    <ul class="nav nav-pills">
        <li role="presentation"><?= $this->Html->link(__('Modifier'), ['action' => 'edit', $location->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $location->id], ['confirm' => __('Etes-vous sûr de vouloir supprimer le local # {0}?', $location->id)]) ?> </li>
        <li><?= $this->Html->link(__('Liste des Locaux'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nouveau local'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="locations view large-9 medium-8 columns content">
    <h3><?= __('Fiche local') ?></h3>
    <table class="table table-striped">
        <tr>
            <th><?= __('Identifiant') ?></th>
            <td><?= $this->Number->format($location->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Dénommination') ?></th>
            <td><?= h($location->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Bâtiment') ?></th>
            <td><?= h($location->building) ?></td>
        </tr>
        <tr>
            <th><?= __('Etage') ?></th>
            <td><?= $this->Number->format($location->floor) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($location->description) ?></td>
        </tr>
    </table>
</div>
