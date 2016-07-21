<nav role="navigation" style="padding-bottom: 30px">
    <ul class="nav nav-pills">
        <li role="presentation"><?= $this->Html->link(__('Nouveau meuble'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="furnitures index large-9 medium-8 columns content">
    <h3><?= __('Fiche détaillée de mobilier') ?></h3>
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
        <?php foreach ($details as $detail): ?>
            <tr>
                <td><?= $this->Number->format($detail->id) ?></td>
                <td><?php echo ($detail->id_equipments)?$detail->equipment->title:'null';; ?></td>
                <td><?php echo ($detail->id_equipments)?$detail->equipment->brand:'null';; ?></td>
                <td><?php echo ($detail->id_equipments)?$detail->equipment->version:'null';; ?></td>
                <td><?php echo ($detail->id_locations)?$detail->location->title:'null';; ?></td>
                <td><?= h($detail->state) ?></td>
                <td><?= $this->Number->format($detail->price) ?></td>
                <td><?= h($detail->date_in) ?></td>
                <td><?= h($detail->date_out) ?></td>
                <td><?= h($detail->note) ?></td>

                <td class="actions">
                    <?= $this->Html->link(__('Afficher'), ['action' => 'view', $detail->id]) ?>
                    <?= $this->Html->link(__('Modifier'), ['action' => 'edit', $detail->id]) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $detail->id], ['confirm' => __('Etes-vous sûr de vouloir supprimer le meuble # {0}?', $detail->id)]) ?>
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