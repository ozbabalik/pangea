<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?><?= lang('ClassRegistrations.title_classRegistration') ?><?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1 class="title"><?= lang('ClassRegistrations.title_classRegistration') ?></h1>

<a href="<?= site_url("/classRegistrations") ?>">&laquo; <?= lang('ClassRegistrations.back_to_index') ?></a>

<div class="content">

    <dl>
        <dt class="has-text-weight-bold"><?= lang('ClassRegistrations.class') ?></dt>
        <dd><?= $classRegistration->class ?></dd>

        <dt class="has-text-weight-bold"><?= lang('ClassRegistrations.class_description') ?></dt>
        <dd><?= esc($classRegistration->class_description) ?></dd>

        <dt class="has-text-weight-bold"><?= lang('ClassRegistrations.number_of_students') ?></dt>
        <dd><?= esc($classRegistration->number_of_students) ?></dd>

    </dl>

</div>

<a class="button is-link" href="<?= site_url('/classRegistrations/edit/' . $classRegistration->id) ?>"><?= lang('ClassRegistrations.edit') ?></a>
<a class="button is-link" href="<?= site_url('/classRegistrations/delete/' . $classRegistration->id) ?>"><?= lang('ClassRegistrations.delete') ?></a>

<?= $this->endSection() ?>
