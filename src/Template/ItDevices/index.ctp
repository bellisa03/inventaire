<nav role="navigation" style="padding-bottom: 30px">
    <ul class="nav nav-pills">
        <li role="presentation"><?= $this->Html->link(__('Nouvelle unité de matériel IT'), ['action' => 'add']) ?></li>
        <li role="presentation"><?= $this->Html->link(__('Listing complet du matériel IT (actif et inactif)'), ['action' => 'indexComplet']) ?></li>
    </ul>
</nav>
<div class="itDevices index large-9 medium-8 columns content">
    <h3><?= __('Matériel IT actif') ?></h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('Identifiant') ?></th>
                <th><?= $this->Paginator->sort('Matériel') ?></th>
                <th><?= $this->Paginator->sort('Marque') ?></th>
                <th><?= $this->Paginator->sort('Version') ?></th>
                <th><?= $this->Paginator->sort('Note') ?></th>
                <th><?= $this->Paginator->sort('Prix') ?></th>
                <th><?= $this->Paginator->sort('Date d\'achat') ?></th>
                <th><?= $this->Paginator->sort('Date d\'amortissement') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($activeItDevices as $activeItDevice): ?>
            <tr>
                <td><?= $this->Html->link($activeItDevice->id, ['controller' => 'Attributions', 'action' => 'itdeviceDetail', $activeItDevice->id])?></td>
                <td> <?php echo ($activeItDevice->id_equipments)?$activeItDevice->equipment->title:'null';;
                    ?></td>
                <td> <?php echo ($activeItDevice->id_equipments)?$activeItDevice->equipment->brand:'null';;
                    ?></td>
                <td> <?php echo ($activeItDevice->id_equipments)?$activeItDevice->equipment->version:'null';;
                    ?></td>
                <td><?= h($activeItDevice->note) ?></td>
                <td><?= $this->Number->format($activeItDevice->price) ?></td>
                <td><?php echo ($activeItDevice->date_in)? $formattedDates['date_in'][$activeItDevice->id]: 'null';; ?></td>
                <td><?php echo ($activeItDevice->date_depreciated)? $formattedDates['date_depreciated'][$activeItDevice->id]: 'null';; ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Afficher'), ['action' => 'view', $activeItDevice->id]) ?>
                    <?= $this->Html->link(__('Modifier'), ['action' => 'edit', $activeItDevice->id]) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $activeItDevice->id], ['confirm' => __('Etes-vous sûr de vouloir supprimer l\'unité de matériel IT # {0}?', $activeItDevice->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p><?= __('Cliquez sur l\'ID du matériel IT pour voir sa liste d\'attribution') ?></p>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('précédent')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('suivant') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
