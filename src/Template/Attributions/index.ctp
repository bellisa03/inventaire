<nav role="navigation" style="padding-bottom: 30px">
    <ul class="nav nav-pills">
        <li role="presentation"><?= $this->Html->link(__('Nouvelle attribution'), ['action' => 'add']) ?></li>
        <li role="presentation"><?= $this->Html->link(__('Listing complet des attributions (actif et inactif)'), ['action' => 'indexComplet']) ?></li>
    </ul>
</nav>
<div class="form-group" style="padding-bottom: 30px">
    <h3><?= __('Attributions active') ?></h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('Nr attribution') ?></th>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('Matériel IT') ?></th>
                <th><?= $this->Paginator->sort('Utilisateur') ?></th>
                <th><?= $this->Paginator->sort('Date de début') ?></th>
                <th><?= $this->Paginator->sort('Date d\'amortissement') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($activeAttributions as $activeAttribution): ?>
            <tr>
                <td><?php echo $activeAttribution->id ?></td>
                <td><?php echo $activeAttribution->id_itdevices ?></td>
                <td><?php echo ($itTitle[$activeAttribution->id_itdevices])? $itTitle[$activeAttribution->id_itdevices]: 'null' ?></td>
                <td><?php echo ($activeAttribution->id_users)?$activeAttribution->user->login:'null' ?></td>
                <td><?php echo ($activeAttribution->date_start)? $formattedDates['date_start'][$activeAttribution->id]: 'null';; ?></td>
                <td><?php echo ($depreciation[$activeAttribution->id_itdevices])? $depreciation[$activeAttribution->id_itdevices]: 'null' ;;?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Afficher'), ['action' => 'view', $activeAttribution->id]) ?>
                    <?= $this->Html->link(__('Modifier'), ['action' => 'edit', $activeAttribution->id]) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $activeAttribution->id], ['confirm' => __('Etes-vous sûr de vouloir supprimer l\'attribution # {0}?', $activeAttribution->id)]) ?>
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
