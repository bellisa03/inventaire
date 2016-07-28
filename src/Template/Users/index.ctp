<nav role="navigation" style="padding-bottom: 30px">
    <ul class="nav nav-pills">
        <li role="presentation"><?= $this->Html->link(__('Nouvel Utilisateur'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">
    <h3><?= __('Utilisateurs') ?></h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('login') ?></th>
                <th><?= $this->Paginator->sort('Mot de passe') ?></th>
                <th><?= $this->Paginator->sort('nom') ?></th>
                <th><?= $this->Paginator->sort('prénom') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $this->Number->format($user->id) ?></td>
                <td><?= $this->Html->link($user->login, ['controller' => 'Attributions', 'action' => 'detail', $user->id])?></td>
                <td><?= h($user->password) ?></td>
                <td><?= h($user->nom) ?></td>
                <td><?= h($user->prenom) ?></td>
                <td><?= h($user->email) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Afficher'), ['action' => 'view', $user->id]) ?>
                    <?= $this->Html->link(__('Modifier'), ['action' => 'edit', $user->id]) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $user->id], ['confirm' => __('Etes-vous sûr de vouloir supprimer l\'utilisateur # {0}?', $user->id)]) ?>
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
