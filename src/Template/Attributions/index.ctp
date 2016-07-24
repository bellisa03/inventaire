<nav role="navigation" style="padding-bottom: 30px">
    <ul class="nav nav-pills">
        <li role="presentation"><?= $this->Html->link(__('Nouvelle attribution'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="form-group" style="padding-bottom: 30px">
    <h3><?= __('Attributions') ?></h3>
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
            <?php foreach ($attributions as $attribution): ?>
            <tr>
                <td><?php echo $attribution->id ?></td>
                <td><?php echo $attribution->id_itdevices ?></td>
                <td><?php echo ($itTitle[$attribution->id_itdevices])? $itTitle[$attribution->id_itdevices]: 'null' ?></td>
                <td><?php echo ($attribution->id_users)?$attribution->user->login:'null' ?></td>
                <td><?= h($attribution->date_start) ?></td>
                <td><?= h($attribution->date_end) ?></td>
                <td><?php echo ($depreciation[$attribution->id_itdevices])? $depreciation[$attribution->id_itdevices]: 'null' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Afficher'), ['action' => 'view', $attribution->id]) ?>
                    <?= $this->Html->link(__('Modifier'), ['action' => 'edit', $attribution->id]) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $attribution->id], ['confirm' => __('Etes-vous sûr de vouloir supprimer l\'attribution # {0}?', $attribution->id)]) ?>
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
