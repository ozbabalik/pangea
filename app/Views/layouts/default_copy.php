<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->renderSection("title") ?></title>
    <link rel="stylesheet" href="<?php echo base_url('/css/bootstrap.css')?>" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php echo base_url('/js/bootstrap.js')?>"></script>
    
</head>
<body>

<section class="section">

    <nav class="navbar navbar-expand-lg navbar-light bg-light" role="navigation" aria-label="main navigation">

        <div class="container-fluid">

            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                <a class="nav-link active" href="<?= site_url('/') ?>"><?= lang('App.nav.home') ?></a>

                <a class="nav-link" href="<?= site_url('/en') ?>">English</a>

                <a class="nav-link" href="<?= site_url('/de') ?>">Deutsch</a>
              </div>
            </div>

            <div class="navbar-nav"">

                <?php if (current_user()): ?>

                    <div class="navbar-item">
                        <?= lang('App.nav.hello') ?>, <?= esc(current_user()->name) ?>
                    </div>

                    <a class="nav-link" href="<?= site_url("/profile/show") ?>"><?= lang('App.nav.profile') ?></a>

                    <?php if (current_user()->is_admin): ?>

                        <a class="nav-link" href="<?= site_url("/admin/users") ?>"><?= lang('App.nav.users') ?></a>

                    <?php endif; ?>

                    <a class="nav-link" href="<?= site_url("/tasks") ?>"><?= lang('App.nav.tasks') ?></a>
                    <a class="nav-link" href="<?= site_url("/classRegistrations") ?>"><?= lang('App.nav.classRegistrations') ?></a>
                    <a class="nav-link" href="<?= site_url("/logout") ?>"><?= lang('App.nav.logout') ?></a>

                <?php else: ?>

                    <a class="nav-link" href="<?= site_url("/$locale/signup") ?>"><?= lang('App.nav.signup') ?></a>

                    <a class="nav-link" href="<?= site_url("/$locale/login") ?>"><?= lang('App.nav.login') ?></a>

                <?php endif; ?>

            </div>
        </div>
    </nav>

    <?php if (session()->has('warning')): ?>
        <div class="notification is-warning is-light">
            <button class="delete"></button>
            <?= session('warning') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->has('info')): ?>
        <div class="notification is-info is-light">
            <button class="delete"></button>
            <?= session('info') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->has('error')): ?>
        <div class="notification is-danger is-light">
            <button class="delete"></button>
            <?= session('error') ?>
        </div>
    <?php endif; ?>

    <?= $this->renderSection("content") ?>

</section>

<script src="<?= site_url('/js/app.js') ?>"></script>

</body>
</html>
