<nav role="navigation" style="padding-bottom: 30px">
    <ul class="nav nav-pills">
        <li role="presentation"><?= $this->Html->link(__('Nouvelle attribution'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="form-group" style="padding-bottom: 30px">
    <h3><?= __('Fiche détaillée du matériel IT') ?></h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('Nr attribution') ?></th>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('Matériel IT') ?></th>
                <th><?= $this->Paginator->sort('Utilisateur') ?></th>
                <th><?= $this->Paginator->sort('Date de début') ?></th>
                <th><?= $this->Paginator->sort('Date de fin') ?></th>
                <th><?= $this->Paginator->sort('Date d\'amortissement') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($details as $detail): ?>
            <tr>
                <td><?php echo $detail->id ?></td>
                <td><?php echo ($detail->id_itdevices)?$detail->it_device->id:'null'  ?></td>
                <td><?php echo ($itTitle[$detail->id_itdevices])? $itTitle[$detail->id_itdevices]: 'null' ?></td>
                <td><?php echo ($detail->id_users)?$detail->user->login:'null' ?></td>
                <td><?php echo ($detail->date_start)? $formattedDates['date_start'][$detail->id]: 'null'?></td>
                <td><?php echo ($detail->date_end)? $formattedDates['date_end'][$detail->id]: 'null'?></td>
                <td><?php echo (isset($depreciation[$detail->id_itdevices]))? $depreciation[$detail->id_itdevices]: 'null' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Afficher'), ['action' => 'view', $detail->id]) ?>
                    <?= $this->Html->link(__('Modifier'), ['action' => 'edit', $detail->id]) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $detail->id], ['confirm' => __('Etes-vous sûr de vouloir supprimer l\'attribution # {0}?', $detail->id)]) ?>
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
