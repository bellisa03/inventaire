<nav role="navigation" style="padding-bottom: 30px">
    <ul class="nav nav-pills">
        <li role="presentation"><?= $this->Html->link(__('Modifier'), ['action' => 'edit', $attribution->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $attribution->id], ['confirm' => __('Etes-vous sûr de vouloir supprimer l\'attribution# {0}?', $attribution->id)]) ?> </li>
        <li><?= $this->Html->link(__('Liste des attributions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nouvelle attribution'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="attributions view large-9 medium-8 columns content">
    <h3><?= __('Fiche attribution') ?></h3>
    <table class="table table-striped">
        <tr>
            <th><?= __('Nr Attribution') ?></th>
            <td><?= $this->Number->format($attribution->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($attribution->id_itdevices) ?></td>
        </tr>
        <tr>
            <th><?= __('Matériel IT') ?></th>
            <td><?= h($itTitle[$attribution->id_itdevices]) ?></td>
        </tr>
        <tr>
            <th><?= __('Utilisateur') ?></th>
            <td><?= h($user) ?></td>
        </tr>
        <tr>
            <th><?= __('Date de début') ?></th>
            <td><?php echo ($attribution->date_start)? $formattedDates['date_start'][$attribution->id]: 'null';; ?></td>
        </tr>
        <tr>
            <th><?= __('Date de fin') ?></th>
            <td><?php echo ($attribution->date_end)? $formattedDates['date_end'][$attribution->id]: 'null';; ?></td>
        </tr>
        <tr>
            <th><?= __('Date d\'amortissement') ?></th>
            <td><?= h($depreciation[$attribution->id_itdevices]) ?></td>
        </tr>
    </table>
</div>
