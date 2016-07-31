<nav role="navigation" style="padding-bottom: 30px">
    <ul class="nav nav-pills">
        <li role="presentation"><?= $this->Html->link(__('Nouveau local'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="form-group" style="padding-bottom: 30px">
    <h3><?= __('Locaux') ?></h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('Identifiant') ?></th>
                <th><?= $this->Paginator->sort('Dénommination') ?></th>
                <th><?= $this->Paginator->sort('Bâtiment') ?></th>
                <th><?= $this->Paginator->sort('Etage') ?></th>
                <th><?= $this->Paginator->sort('Description') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($locations as $location): ?>
            <tr>
                <td><?= $this->Number->format($location->id) ?></td>
                <td><?= $this->Html->link($location->title, ['controller' => 'Furnitures', 'action' => 'locationDetail', $location->id])?></td>
                <td><?= h($location->building) ?></td>
                <td><?= $this->Number->format($location->floor) ?></td>
                <td><?= h($location->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Afficher'), ['action' => 'view', $location->id]) ?>
                    <?= $this->Html->link(__('Modifier'), ['action' => 'edit', $location->id]) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $location->id], ['confirm' => __('Etes-vous sûr de vouloir supprimer le local # {0}?', $location->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p><?= __('Cliquez sur la dénommination d\'un local pour voir le mobilier qu\'il contient') ?></p>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('précédent')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('suivant') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
