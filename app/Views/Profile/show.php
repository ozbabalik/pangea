<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?><?= lang('Profile.title') ?><?= $this->endSection() ?>

<?= $this->section('content') ?>

<!--h1 class="title"><!?= lang('Profile.title') ?></h1>

<!--?php if ($user->profile_image): ?>

    <img src="<!?= site_url('/profile/image') ?>" width="200" height="200" alt="<!?= lang('Profile.profile_image') ?>">

    <div>
        <a class="button is-danger is-light" href="<!?= site_url('/profileimage/delete') ?>"><!?= lang('Profile.delete_profile_image') ?></a>
    </div>

<!?php else: ?>

    <img src="<!?= site_url('/images/blank_profile.png') ?>" width="200" height="200" alt="<!?= lang('Profile.profile_image') ?>">

<!?php endif; ?-->
<?php $currentPage='profile' ?>
  <div class="container">

      <div class="col-8">
          <div class="card">
          <h1 class="card-header"><?= lang('Profile.title') ?></h1>

          <div class="card-body ">
            <dl class="row">
                <dt class="col-md-3"><?= lang('Profile.salutation') ?></dt>
                <?php $salutations=array(''=>lang('Anrede'), 'male'=>lang('Signup.male'), 'female'=>lang('Signup.female'), 'others'=>lang('Signup.others')); ?>
                <dd class="col-md-9"><?= lang($salutations[esc($user->salutation)]) ?></dd>
                <dt class="col-md-3"><?= lang('Profile.acad_title') ?></dt>
                <dd class="col-md-9"><?= esc($user->acad_title) ?></dd>
                <dt class="col-md-3"><?= lang('Profile.name') ?></dt>
                <dd class="col-md-9"><?= esc($user->name) ?></dd>
                <dt class="col-md-3"><?= lang('Profile.lastname') ?></dt>
                <dd class="col-md-9"><?= esc($user->lastname) ?></dd>
                <dt class="col-md-3"><?= lang('Profile.email') ?></dt>
                <dd class="col-md-9"><?= esc($user->email) ?></dd>
                <div class="form-group row" style="padding-top:20px;">
                  <h4 class="heading">Schulinfo</h4>
                </div>
                <dt class="col-md-3"><?= lang('Profile.teacher_phone') ?></dt>
                <dd class="col-md-9"><?= esc($user->teacher_phone) ?></dd>
                <dt class="col-md-3"><?= lang('Profile.school_phone') ?></dt>
                <dd class="col-md-9"><?= esc($user->school_phone) ?></dd>
                <dt class="col-md-3"><?= lang('Profile.school_name') ?></dt>
                <dd class="col-md-9"><?= esc($user->school_name) ?></dd>
                <dt class="col-md-3"><?= lang('Profile.school_code') ?></dt>
                <dd class="col-md-9"><?= esc($user->school_code) ?></dd>
                <dt class="col-md-3"><?= lang('Profile.school_address') ?></dt>
                <dd class="col-md-9"><?= esc($user->school_street)." ".esc($user->school_house_nr).", ".esc($user->school_zip)." ".esc($user->school_city)?></dd>
            </dl>
            <div class="col-md-12" style="padding-top:20px;">
              <a class="btn btn-outline-primary" href="<?= site_url("/profile/edit") ?>"><?= lang('Profile.edit') ?></a>

              <a class="btn btn-outline-primary" href="<?= site_url("/profile/editpassword") ?>"><?= lang('Profile.change_password') ?></a>

            </div>
          </div>

        </div>
      </div>

    </div>

<!--

<a class="button is-link" href="<!?= site_url("/profile/edit") ?>"><!?= lang('Profile.edit') ?></a>

<a class="button is-link" href="<!?= site_url("/profile/editpassword") ?>"><!?= lang('Profile.change_password') ?></a>

<a class="button is-link" href="<!?= site_url("/profileimage/edit") ?>"><!?= lang('Profile.change_profile_image') ?></a-->

<?= $this->endSection() ?>
