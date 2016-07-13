<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Equipment'), ['action' => 'edit', $equipment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Equipment'), ['action' => 'delete', $equipment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equipment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Equipments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Equipment'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="equipments view large-9 medium-8 columns content">
    <h3><?= h($equipment->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($equipment->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Version') ?></th>
            <td><?= h($equipment->version) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($equipment->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($equipment->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($equipment->quantity) ?></td>
        </tr>
        <tr>
            <th><?= __('Barcode') ?></th>
            <td><?= $this->Number->format($equipment->barcode) ?></td>
        </tr>
    </table>
</div>
