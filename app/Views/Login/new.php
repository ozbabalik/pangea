<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?><?= lang('Login.title') ?><?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container col-md-10">
  <div class="card">
    <h1 class="card-header"><?= lang('Login.title') ?></h1>
    <div class="card-body">
    <?= form_open("/$locale/login/create") ?>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label" for="email"><?= lang('Login.email') ?></label>
            <div class="col-sm-9">
            <input class="form-control" type="text" name="email" id="email" value="<?= old('email') ?>">
          </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label" for="password"><?= lang('Login.password') ?></label>
            <div class="col-sm-9">
            <input class="form-control" type="password" name="password">
          </div>
        </div>

        <div class="row mb-3">
            <label class="form-check-label" for="remember_me">
                <input class="form-check-input" type="checkbox" id="remember_me" name="remember_me"
                    <?php if (old('remember_me')): ?>checked<?php endif; ?>> <?= lang('Login.remember_me') ?>
            </label>
        </div>

        <div class="row mb-3">
            <div class="control">
                <button type="submit" class="btn btn-outline-success"><?= lang('Login.log_in') ?></button>

                <a href="<?= site_url("/$locale/signup") ?>" class="btn btn-outline-success">
                  Neue Registrierung
                </a>
            </div>

            <a href="<?= site_url("/$locale/password/forgot") ?>" style="color:#610B0B;"><?= lang('Login.forgot_password') ?></a>
        </div>

    </form>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
