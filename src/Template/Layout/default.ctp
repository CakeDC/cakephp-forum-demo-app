<?php
/**
 * @var \App\View\AppView $this
 * @var array $currentUser
 */

$this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', ['block' => true]);
$this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js', ['block' => true]);
$this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', ['block' => true]);
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->fetch('title') ?></title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only"><?= __('Toggle navigation') ?></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?= $this->Html->link(__('CakeDC Forum Plugin'), '/', ['class' => 'navbar-brand']) ?>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><?= $this->Html->link(__('Forum'), '/forum') ?></li>
                    <?php if ($currentUser): ?>
                        <li role="presentation" class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> <?= __('User menu') ?> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <?php if ($currentUser['is_superuser']): ?>
                                    <li><?= $this->Html->link(__('Forum Admin'), '/forum/admin') ?></li>
                                    <li role="separator" class="divider"></li>
                                <?php endif; ?>
                                <li><?= $this->Html->link(__('Sign Out'), ['controller' => 'Users', 'action' => 'logout', 'prefix' => false, 'plugin' => false]) ?></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li><?= $this->Html->link(__('Sign In'), ['controller' => 'Users', 'action' => 'login', 'prefix' => false, 'plugin' => false]) ?></li>
                    <?php endif; ?>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

    <div class="container">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>

    <?= $this->fetch('script') ?>
</body>
</html>
