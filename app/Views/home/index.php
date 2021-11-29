<?= $this->extend("layouts/default") ?>

<?= $this->section('title') ?><?= lang('Home.title') ?><?= $this->endSection() ?>

<?= $this->section("content") ?>
<?php $currentPage='home'?>
    <h1 class="h1"><?= lang('Home.welcome') ?></h1>

<?= $this->endSection() ?>
