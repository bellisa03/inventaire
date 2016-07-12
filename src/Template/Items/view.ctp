<nav role="navigation" style="padding-bottom: 30px">
    <ul class="nav nav-pills">
        <li role="presentation"><?= $this->Html->link(__('Modifier le matériel'), ['action' => 'edit', $item->id]) ?> </li>
        <li role="presentation"><?= $this->Form->postLink(__('Supprimer le matériel'), ['action' => 'delete', $item->id], ['confirm' => __('Etes-vous sûr de vouloir supprimer le matériel # {0}?', $item->id)]) ?> </li>
        <li role="presentation"><?= $this->Html->link(__('Afficher la liste'), ['action' => 'index']) ?> </li>
        <li role="presentation"><?= $this->Html->link(__('Nouveau matériel'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="items view large-9 medium-8 columns content">
    <h3><?= h($item->id) ?></h3>
    <table class="table table-striped">

        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($item->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Date d\'achat') ?></th>
            <td><?= h($item->date_in) ?></td>
        </tr>
        <tr>
            <th><?= __('Date de sortie') ?></th>
            <td><?= h($item->date_out) ?></td>
        </tr>
        <tr>
            <th><?= __('Prix') ?></th>
            <td><?= $this->Number->format($item->price) ?></td>
        </tr>
        <tr>
            <th><?= __('Note') ?></th>
            <td><?= h($item->note) ?></td>
        </tr>
        <tr>
            <th><?= __('Id Equipments') ?></th>
            <td><?= $this->Number->format($item->id_equipments) ?></td>
        </tr>
    </table>
</div>
