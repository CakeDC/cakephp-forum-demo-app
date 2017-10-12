<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="jumbotron">
    <h1>Welcome!</h1>
    <p>This is a demo app of CakeDC/Forum plugin for CakePHP.</p>
    <p>Users available:</p>
    <ul>
        <li>Username <strong>admin</strong>, password <strong>password123</strong></li>
        <li>Username <strong>moderator</strong>, password <strong>password123</strong></li>
        <li>Username <strong>user</strong>, password <strong>password123</strong></li>
    </ul>
    <p>
        <?= $this->Html->link(__('View Forum »'), '/forum', ['class' => 'btn btn-lg btn-success']) ?>
        <?= $this->Html->link(__('View on GitHub »'), 'https://github.com/cakedc/cakephp-forum-demo-app', ['class' => 'btn btn-lg btn-primary', 'target' => '_blank']) ?>
        <?= $this->Html->link(__('View CakeDC/Forum plugin on Github »'), 'https://github.com/cakedc/cakephp-forum', ['class' => 'btn btn-lg btn-primary', 'target' => '_blank']) ?>
    </p>
</div>
