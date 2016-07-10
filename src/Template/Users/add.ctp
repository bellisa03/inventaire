<nav role="navigation" style="padding-bottom: 30px">
    <ul class="nav nav-pills">
        <li role="presentation"><?= $this->Html->link(__('Liste des utilisateurs'), ['action' => 'index']) ?></li>
    </ul>
</nav>


<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset style="padding-bottom: 30px">
        <legend><?= __('Ajouter un utilisateur') ?></legend>
        <?php
            echo $this->Form->input('login', ['class' => 'form-control', 'label' => 'Login']);
            echo $this->Form->input('password', ['class' => 'form-control', 'label' => 'Mot de passe']);
            echo $this->Form->input('nom', ['class' => 'form-control', 'label' => 'Nom']);
            echo $this->Form->input('prenom', ['class' => 'form-control', 'label' => 'Prénom']);
            echo $this->Form->input('email', ['class' => 'form-control', 'label' => 'Email']);
        ?>
    </fieldset>

    <?= $this->Form->button(__('Sauvegarder')) ?>
    <?= $this->Form->end() ?>

</div>
