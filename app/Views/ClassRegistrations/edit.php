<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?><?= lang('ClassRegistrations.edit_classRegistration') ?><?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1 class="title"><?= lang('ClassRegistrations.edit_classRegistration') ?></h1>

<?php if (session()->has('errors')): ?>
    <ul>
        <?php foreach(session('errors') as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif ?>

<div class="container">

    <?= form_open("/classRegistrations/update/" . $classRegistration->id) ?>

        <?= $this->include('ClassRegistrations/form') ?>

        <div class="field is-grouped">
            <div class="control">
                <button class="button is-primary"><?= lang('ClassRegistrations.save') ?></button>
            </div>

            <div class="control">
                <a class="button" href="<?= site_url("/classRegistrations/show/" . $classRegistration->id) ?>"><?= lang('ClassRegistrations.cancel') ?></a>
            </div>
        </div>

    </form>

</div>

<?= $this->endSection() ?>
