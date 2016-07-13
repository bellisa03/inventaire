<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $equipment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $equipment->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Equipments'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="equipments form large-9 medium-8 columns content">
    <?= $this->Form->create($equipment) ?>
    <fieldset>
        <legend><?= __('Edit Equipment') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('version');
            echo $this->Form->input('description');
            echo $this->Form->input('quantity');
            echo $this->Form->input('barcode');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
