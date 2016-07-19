<h1>Connexion</h1>
<?php echo $this->Form->create() ?>
<?php echo $this->Form->input('login', ['label' => 'Login']); ?>
<?php echo $this->Form->input('password' , ['label' => 'Mot de passe']) ?>
<?php echo $this->Form->button('Se connecter') ?>
<?php echo $this->Form->end() ?>