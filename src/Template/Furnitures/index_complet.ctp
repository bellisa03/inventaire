<nav role="navigation" style="padding-bottom: 30px">
    <ul class="nav nav-pills">
        <li role="presentation"><?= $this->Html->link(__('Nouveau meuble'), ['action' => 'add']) ?></li>
        <li role="presentation"><?= $this->Html->link(__('Listing du mobilier actif'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="furnitures index large-9 medium-8 columns content">
    <h3><?= __('Mobilier actif et inactif') ?></h3>
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
                <th><?= $this->Paginator->sort('Date de sortie') ?></th>
                <th><?= $this->Paginator->sort('note') ?></th>


                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($furnitures as $furniture): ?>
            <tr>
                <td><?= $this->Number->format($furniture->id) ?></td>
                <td><?php echo ($furniture->id_equipments)?$furniture->equipment->title:'null';; ?></td>
                <td><?php echo ($furniture->id_equipments)?$furniture->equipment->brand:'null';; ?></td>
                <td><?php echo ($furniture->id_equipments)?$furniture->equipment->version:'null';; ?></td>
                <td><?php echo ($furniture->id_locations)?$furniture->location->title:'null';; ?></td>
                <td><?= h($furniture->state) ?></td>
                <td><?= $this->Number->format($furniture->price) ?></td>
                <td><?php echo ($furniture->date_in)? $formattedDates['date_in'][$furniture->id]: 'null';; ?></td>
                <td><?php echo ($furniture->date_out)? $formattedDates['date_out'][$furniture->id]: 'null';; ?></td>
                <td><?= h($furniture->note) ?></td>

                <td class="actions">
                    <?= $this->Html->link(__('Afficher'), ['action' => 'view', $furniture->id]) ?>
                    <?= $this->Html->link(__('Modifier'), ['action' => 'edit', $furniture->id]) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $furniture->id], ['confirm' => __('Etes-vous sûr de vouloir supprimer le meuble # {0}?', $furniture->id)]) ?>
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
