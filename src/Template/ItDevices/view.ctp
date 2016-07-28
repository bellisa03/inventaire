<nav role="navigation" style="padding-bottom: 30px">
    <ul class="nav nav-pills">
        <li role="presentation"><?= $this->Html->link(__('Modifier'), ['action' => 'edit', $itDevice->id]) ?> </li>
        <li role="presentation"><?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $itDevice->id], ['confirm' => __('Etes-vous sûr de vouloir supprimer l\'unité de matériel IT # {0}?', $itDevice->id)]) ?> </li>
        <li role="presentation"><?= $this->Html->link(__('Liste du matériel IT'), ['action' => 'index']) ?> </li>
        <li role="presentation"><?= $this->Html->link(__('Nouveau type de matériel'), ['controller'=>'Equipments', 'action' => 'add']) ?> </li>
        <li role="presentation"><?= $this->Html->link(__('Nouvelle unité de matériel IT'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="itDevices view large-9 medium-8 columns content">
    <h3><?= __('Fiche matériel IT') ?></h3>
    <table class="table table-striped">
        <tr>
            <th><?= __('Identifiant') ?></th>
            <td><?= $this->Number->format($itDevice->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Matériel') ?></th>
            <td><?= h($equipment) ?></td>
        </tr>
        <tr>
            <th><?= __('Note') ?></th>
            <td><?= h($itDevice->note) ?></td>
        </tr>
        <tr>
            <th><?= __('Prix') ?></th>
            <td><?= $this->Number->format($itDevice->price) ?></td>
        </tr>
        <tr>
            <th><?= __('Date d\'achat') ?></th>
            <td><?php echo ($itDevice->date_in)? $formattedDates['date_in'][$itDevice->id]: 'null';; ?></td>
        </tr>
        <tr>
            <th><?= __('Date d\'amortissement') ?></th>
            <td><?php echo ($itDevice->date_depreciated)? $formattedDates['date_depreciated'][$itDevice->id]: 'null';; ?></td>
        </tr>
        <tr>
            <th><?= __('Date de sortie') ?></th>
            <td><?php echo ($itDevice->date_out)? $formattedDates['date_out'][$itDevice->id]: 'null';; ?></td>
        </tr>
    </table>
</div>
