<nav role="navigation" style="padding-bottom: 30px">
    <ul class="nav nav-pills">
        <li role="presentation"><?= $this->Html->link(__('Modifier'), ['action' => 'edit', $equipment->id]) ?> </li>
        <li role="presentation"><?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $equipment->id], ['confirm' => __('Etes-vous sûr de vouloir supprimer le type de matériel # {0}?', $equipment->id)]) ?> </li>
        <li role="presentation"><?= $this->Html->link(__('Liste du matériel'), ['action' => 'index']) ?> </li>
        <li role="presentation"><?= $this->Html->link(__('Nouveau type de matériel'), ['action' => 'add']) ?> </li>
        <li role="presentation"><?= $this->Html->link(__('Nouvelle unité de matériel IT'), ['controller' => 'ItDevices', 'action' => 'add']) ?> </li>
        <li role="presentation"><?= $this->Html->link(__('Nouveau meuble'), ['controller' => 'Furnitures', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="equipments view large-9 medium-8 columns content">
    <h3><?= __('Fiche matériel') ?></h3>
    <table class="table table-striped">
        <tr>
            <th><?= __('Identifiant') ?></th>
            <td><?= $this->Number->format($equipment->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Type de matériel') ?></th>
            <td><?= h($equipment->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Marque') ?></th>
            <td><?= h($equipment->brand) ?></td>
        </tr>
        <tr>
            <th><?= __('Version') ?></th>
            <td><?= h($equipment->version) ?></td>
        </tr>
        <tr>
            <th><?= __('Quantité') ?></th>
            <td><?= $this->Number->format($equipment->quantity) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($equipment->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Matériel IT') ?></th>
            <td><?= $equipment->itdevice ? __('Oui') : __('Non'); ?></td>
        </tr>
        <tr>
            <th><?= __('Code Barre') ?></th>
            <td><?= $this->Number->format($equipment->barcode) ?></td>
        </tr>
    </table>
</div>
