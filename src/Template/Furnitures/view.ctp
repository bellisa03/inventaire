<nav role="navigation" style="padding-bottom: 30px">
    <ul class="nav nav-pills">
        <li role="presentation"><?= $this->Html->link(__('Modifier un meuble'), ['action' => 'edit', $furniture->id]) ?> </li>
        <li role="presentation"><?= $this->Form->postLink(__('Supprimer un meuble'), ['action' => 'delete', $furniture->id], ['confirm' => __('Etes-vous sûr de vouloir supprimer le meuble # {0}?', $furniture->id)]) ?> </li>
        <li role="presentation"><?= $this->Html->link(__('Liste du mobilier'), ['action' => 'index']) ?> </li>
        <li role="presentation"><?= $this->Html->link(__('Nouveau meuble'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="furnitures view large-9 medium-8 columns content">
    <h3><?= h($furniture->id) ?></h3>
    <table class="table table-striped">
        <tr>
            <th><?= __('Identifiant') ?></th>
            <td><?= $this->Number->format($furniture->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Matériel') ?></th>
            <td><?= $this->Number->format($furniture->id_equipments) ?></td>
        </tr>
        <tr>
            <th><?= __('Localisation') ?></th>
            <td><?= $this->Number->format($furniture->id_locations) ?></td>
        </tr>
        <tr>
            <th><?= __('Etat') ?></th>
            <td><?= h($furniture->state) ?></td>
        </tr>
        <tr>
            <th><?= __('Prix') ?></th>
            <td><?= $this->Number->format($furniture->price) ?></td>
        </tr>
        <tr>
            <th><?= __('Date d\'achat') ?></th>
            <td><?= h($furniture->date_in) ?></td>
        </tr>
        <tr>
            <th><?= __('Date de sortie') ?></th>
            <td><?= h($furniture->date_out) ?></td>
        </tr>
        <tr>
            <th><?= __('Note') ?></th>
            <td><?= h($furniture->note) ?></td>
        </tr>
    </table>
</div>
