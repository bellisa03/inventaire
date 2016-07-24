<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Item'), ['action' => 'edit', $item->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Item'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="items view large-9 medium-8 columns content">
    <h3><?= h($item->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Note') ?></th>
            <td><?= h($item->note) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($item->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Price') ?></th>
            <td><?= $this->Number->format($item->price) ?></td>
        </tr>
        <tr>
            <th><?= __('Id Equipments') ?></th>
            <td><?= $this->Number->format($item->id_equipments) ?></td>
        </tr>
        <tr>
            <th><?= __('Date In') ?></th>
            <td><?= h($item->date_in) ?></td>
        </tr>
        <tr>
            <th><?= __('Date Out') ?></th>
            <td><?= h($item->date_out) ?></td>
        </tr>
    </table>
</div>
