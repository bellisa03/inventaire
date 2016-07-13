<nav role="navigation" style="padding-bottom: 30px">
    <ul class="nav nav-pills">
        <li role="presentation"><?= $this->Html->link(__('Nouveau meuble'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="furnitures index large-9 medium-8 columns content">
    <h3><?= __('Mobilier') ?></h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('Identifiant') ?></th>
                <th><?= $this->Paginator->sort('Matériel') ?></th>
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
                <td><?= $this->Number->format($furniture->id_equipments) ?></td>
                <td><?= $this->Number->format($furniture->id_locations) ?></td>
                <td><?= h($furniture->state) ?></td>
                <td><?= $this->Number->format($furniture->price) ?></td>
                <td><?= h($furniture->date_in) ?></td>
                <td><?= h($furniture->date_out) ?></td>
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
