<nav role="navigation" style="padding-bottom: 30px">
    <ul class="nav nav-pills">
        <li role="presentation"><?= $this->Html->link(__('Nouveau meuble'), ['action' => 'add']) ?></li>
        <li role="presentation"><?= $this->Html->link(__('Choisir un autre local'), ['controller'=> 'Locations','action' => 'index']) ?></li>
        <li role="presentation"><?= $this->Html->link(__('Listing complet du mobilier (actif et inactif)'), ['action' => 'indexComplet']) ?></li>
    </ul>
</nav>
<div class="furnitures index large-9 medium-8 columns content">
    <h3><?= __('Fiche détaillée d\'un local') ?></h3>
    <table class="table table-striped">
        <thead>
        <tr>
            <th><?= $this->Paginator->sort('Identifiant') ?></th>
            <th><?= $this->Paginator->sort('Matériel') ?></th>
            <th><?= $this->Paginator->sort('Marque') ?></th>
            <th><?= $this->Paginator->sort('Version') ?></th>
            <th><?= $this->Paginator->sort('Localisation') ?></th>
            <th><?= $this->Paginator->sort('Etat') ?></th>
            <th><?= $this->Paginator->sort('Prix') ?></th>
            <th><?= $this->Paginator->sort('Date d\'achat') ?></th>
            <th><?= $this->Paginator->sort('note') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($activeFurnitures as $activeFurniture): ?>
            <tr>
                <td><?= $this->Number->format($activeFurniture->id) ?></td>
                <td><?php echo ($activeFurniture->id_equipments)?$activeFurniture->equipment->title:'null';; ?></td>
                <td><?php echo ($activeFurniture->id_equipments)?$activeFurniture->equipment->brand:'null';; ?></td>
                <td><?php echo ($activeFurniture->id_equipments)?$activeFurniture->equipment->version:'null';; ?></td>
                <td><?php echo ($activeFurniture->id_locations)?$activeFurniture->location->title:'null';; ?></td>
                <td><?= h($activeFurniture->state) ?></td>
                <td><?= $this->Number->format($activeFurniture->price) ?></td>
                <td><?php echo ($activeFurniture->date_in)? $formattedDates['date_in'][$activeFurniture->id]: 'null';; ?></td>
                <td><?= h($activeFurniture->note) ?></td>

                <td class="actions">
                    <?= $this->Html->link(__('Afficher'), ['action' => 'view', $activeFurniture->id]) ?>
                    <?= $this->Html->link(__('Modifier'), ['action' => 'edit', $activeFurniture->id]) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $activeFurniture->id], ['confirm' => __('Etes-vous sûr de vouloir supprimer le meuble # {0}?', $activeFurniture->id)]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <button><?= $this->Html->link('Exporter en Excel', ['controller' => 'Furnitures', 'action' => 'exporter', $activeFurnitures[0]->id_locations], ['class' => 'button', 'target' => '_blank'])?></button>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('précédent')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('suivant') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>