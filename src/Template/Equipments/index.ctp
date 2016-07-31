<nav role="navigation" style="padding-bottom: 30px">
    <ul class="nav nav-pills">
        <li role="presentation"><?= $this->Html->link(__('Nouveau type de matériel'), ['action' => 'add']) ?></li>
        <li role="presentation"><?= $this->Html->link(__('Nouvelle unité de matériel IT'), ['controller' => 'ItDevices', 'action' => 'add']) ?> </li>
        <li role="presentation"><?= $this->Html->link(__('Nouveau meuble'), ['controller' => 'Furnitures', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="form-group" style="padding-bottom: 30px">
    <h3><?= __('Type de matériel') ?></h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('Identifiant') ?></th>
                <th><?= $this->Paginator->sort('Type de matériel') ?></th>
                <th><?= $this->Paginator->sort('Marque') ?></th>
                <th><?= $this->Paginator->sort('Version') ?></th>
                <th><?= $this->Paginator->sort('Quantité') ?></th>
                <th><?= $this->Paginator->sort('Description') ?></th>
                <th><?= $this->Paginator->sort('Matériel IT') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($equipments as $equipment): ?>
            <tr>
                <td><?= $this->Number->format($equipment->id) ?></td>
                <td><?= h($equipment->title) ?></td>
                <td><?= h($equipment->brand) ?></td>
                <td><?= h($equipment->version) ?></td>
                <td><?= $equipment->itdevice ? $this->Html->link($this->Number->format($equipment->quantity), ['controller' => 'ItDevices', 'action' => 'detail', $equipment->id]) : $this->Html->link($this->Number->format($equipment->quantity), ['controller' => 'Furnitures', 'action' => 'detail', $equipment->id]);  ?></td>
                <td><?= h($equipment->description) ?></td>
                <td><?= $equipment->itdevice ? __('Oui') : __('Non'); ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Afficher'), ['action' => 'view', $equipment->id]) ?>
                    <?= $this->Html->link(__('Modifier'), ['action' => 'edit', $equipment->id]) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $equipment->id], ['confirm' => __('Etes-vous sûr de vouloir supprimer le type de matériel # {0}?', $equipment->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p><?= __('Cliquez sur la quantité d\'un type de matériel pour voir ses différentes unités') ?></p>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('précédent')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('suivant') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
