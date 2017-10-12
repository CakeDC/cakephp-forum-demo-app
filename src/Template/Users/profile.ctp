<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

$this->assign('title', h($user->full_name));
?>
<h1><?= $this->fetch('title') ?> <em>(<?= h($user->username) ?>)</em></h1>
<p><strong><?= __('Posts count:') ?></strong> <?= $this->Number->format($user->posts_count) ?></p>
