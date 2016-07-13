<nav role="navigation" style="padding-bottom: 30px">
    <ul class="nav nav-pills">
        <li role="presentation"><?= $this->Form->postLink(
                __('Supprimer'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Etes-vous sûr de vouloir supprimer l\'utilisateur # {0}?', $user->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Liste des utilisateurs'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset style="padding-bottom: 30px">
        <legend><?= __('Modifier l\'utilisateur') ?></legend>
        <?php
            echo $this->Form->input('login', ['label' => 'Login']);
            echo $this->Form->input('password', ['label' => 'Mot de passe']);
            echo $this->Form->input('nom', ['label' => 'Nom']);
            echo $this->Form->input('prenom', ['label' => 'Prénom']);
            echo $this->Form->input('email', ['label' => 'Email']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Sauvegarder')) ?>
    <?= $this->Form->end() ?>
</div>
