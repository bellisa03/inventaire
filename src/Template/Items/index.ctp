<nav role="navigation" style="padding-bottom: 30px">
    <ul class="nav nav-pills">
        <li role="presentation"><?= $this->Html->link(__('Nouveau matériel'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="items index large-9 medium-8 columns content">
    <h3><?= __('Matériels') ?></h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('Id') ?></th>
                <th><?= $this->Paginator->sort('Date d\'achat') ?></th>
                <th><?= $this->Paginator->sort('Date de sortie') ?></th>
                <th><?= $this->Paginator->sort('Prix') ?></th>
                <th><?= $this->Paginator->sort('Note') ?></th>
                <th><?= $this->Paginator->sort('id_equipments') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
            <tr>
                <td><?= $this->Number->format($item->id) ?></td>
                <td><?= h($item->date_in) ?></td>
                <td><?= h($item->date_out) ?></td>
                <td><?= $this->Number->format($item->price) ?></td>
                <td><?= h($item->note) ?></td>
                <td><?= $this->Number->format($item->id_equipments) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Afficher'), ['action' => 'view', $item->id]) ?>
                    <?= $this->Html->link(__('Modifier'), ['action' => 'edit', $item->id]) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $item->id], ['confirm' => __('Etes-vous sûr de vouloir supprimer le matériel # {0}?', $item->id)]) ?>
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
