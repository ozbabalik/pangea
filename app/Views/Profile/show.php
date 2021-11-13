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

  <div class="container">
      <div class="col-10">
          <div class="card">
          <h1 class="card-header"><?= lang('Profile.title') ?></h1>

          <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3"><?= lang('Profile.salutation') ?></dt>
                <?php $salutations=array(''=>lang('Anrede'), 'male'=>lang('Signup.male'), 'female'=>lang('Signup.female'), 'others'=>lang('Signup.others')); ?>
                <dd class="col-sm-9"><?= lang($salutations[esc($user->salutation)]) ?></dd>
                <dt class="col-sm-3"><?= lang('Profile.name') ?></dt>
                <dd class="col-sm-9"><?= esc($user->name) ?></dd>
                <dt class="col-sm-3"><?= lang('Profile.email') ?></dt>
                <dd class="col-sm-9"><?= esc($user->email) ?></dd>
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
