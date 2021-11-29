<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?><?= lang('ClassRegistrations.new_classRegistration') ?><?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php $currentPage='classRegistration' ?>

<div class="container">

  <div class="col-12">
      <div class="card">
        <h3 class="card-header">Klassenanmeldung</h3>

        <div clas="row">
          <?php if (session()->has('errors')): ?>
              <ul>
                  <?php foreach(session('errors') as $error): ?>
                      <li><?= $error ?></li>
                  <?php endforeach; ?>
              </ul>
          <?php endif ?>

        </div>
        <div class="card-body">
        <?= form_open("/classRegistrations/create") ?>

            <?= $this->include('ClassRegistrations/form') ?>

            <div class="form-group row">
              <div class="col-md-12">
                    <button type="submit" class="btn btn-outline-success">Speichern</button>
                    <a class="btn btn-outline-secondary" href="<?= site_url("/classRegistrations") ?>">Abbrechen</a>

              </div>
            </div>

        <?=form_close();?>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
