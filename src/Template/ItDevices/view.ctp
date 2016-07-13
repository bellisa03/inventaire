<nav role="navigation" style="padding-bottom: 30px">
    <ul class="nav nav-pills">
        <li role="presentation"><?= $this->Html->link(__('Modifier une unité de matériel IT'), ['action' => 'edit', $itDevice->id]) ?> </li>
        <li role="presentation"><?= $this->Form->postLink(__('Supprimer une unité de matériel IT'), ['action' => 'delete', $itDevice->id], ['confirm' => __('Etes-vous sûr de vouloir supprimer l\'unité de matériel IT # {0}?', $itDevice->id)]) ?> </li>
        <li role="presentation"><?= $this->Html->link(__('Liste du matériel IT'), ['action' => 'index']) ?> </li>
        <li role="presentation"><?= $this->Html->link(__('Nouvelle unité de matériel IT'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="itDevices view large-9 medium-8 columns content">
    <h3><?= h($itDevice->id) ?></h3>
    <table class="table table-striped">
        <tr>
            <th><?= __('Identifiant') ?></th>
            <td><?= $this->Number->format($itDevice->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Matériel') ?></th>
            <td><?= $this->Number->format($itDevice->id_equipments) ?></td>
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
            <td><?= h($itDevice->date_in) ?></td>
        </tr>
        <tr>
            <th><?= __('Date d\'amortissement') ?></th>
            <td><?= h($itDevice->date_depreciated) ?></td>
        </tr>
        <tr>
            <th><?= __('Date de sortie') ?></th>
            <td><?= h($itDevice->date_out) ?></td>
        </tr>
    </table>
</div>
