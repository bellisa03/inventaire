<nav role="navigation" style="padding-bottom: 30px">
    <ul class="nav nav-pills">
        <li role="presentation"><?= $this->Html->link(__('Nouvelle unité de matériel IT'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="itDevices index large-9 medium-8 columns content">
    <h3><?= __('Matériel IT') ?></h3>
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
                <th><?= $this->Paginator->sort('Date de sortie') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($itDevices as $itDevice): ?>
            <tr>
                <td><?= $this->Number->format($itDevice->id) ?></td>
                <td> <?php echo ($itDevice->id_equipments)?$itDevice->equipment->title:'null';;
                    ?></td>
                <td> <?php echo ($itDevice->id_equipments)?$itDevice->equipment->brand:'null';;
                    ?></td>
                <td> <?php echo ($itDevice->id_equipments)?$itDevice->equipment->version:'null';;
                    ?></td>
                <td><?= h($itDevice->note) ?></td>
                <td><?= $this->Number->format($itDevice->price) ?></td>
                <td><?php echo ($itDevice->date_in)? $formattedDates['date_in'][$itDevice->id]: 'null';; ?></td>
                <td><?php echo ($itDevice->date_depreciated)? $formattedDates['date_depreciated'][$itDevice->id]: 'null';; ?></td>
                <td><?php echo ($itDevice->date_out)? $formattedDates['date_out'][$itDevice->id]: 'null';; ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Afficher'), ['action' => 'view', $itDevice->id]) ?>
                    <?= $this->Html->link(__('Modifier'), ['action' => 'edit', $itDevice->id]) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $itDevice->id], ['confirm' => __('Etes-vous sûr de vouloir supprimer l\'unité de matériel IT # {0}?', $itDevice->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('précédent')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('suivant') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
