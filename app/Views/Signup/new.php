<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?><?= lang('Signup.title') ?><?= $this->endSection() ?>

<?= $this->section('content') ?>





<div class="container">
    <div class="col-10">
        <div class="card">
        <h1 class="card-header"><?= lang('Signup.title') ?></h1>
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
        <?php $attributes = array('class' => 'row g-3', 'style' => 'padding-top: 20px');?>
        <!--form action="/$locale/signup/create" method="post" class="row g-3" style='padding-top: 20px'-->
        <!--form class="row g-3"-->
              <?= form_open("/$locale/signup/create", $attributes) ?>
              <div class="form-group row">
                <div class="col-md-6">
                  <?php $salutations=array(''=>lang('Anrede'), 'male'=>lang('Signup.male'), 'female'=>lang('Signup.female'), 'others'=>lang('Signup.others')); ?>
                  <!--label class="form-label"  for="salutation"><!?= lang('Signup.salutation') ?></label-->
                  <?= form_dropdown('salutation', $salutations,'', 'class="form-select", required="required"'); ?>
                </div>
                <div class="col-md-6">
                  <!--label  class="form-label" for="acad_title"><!?= lang('Signup.acad_title') ?></label-->
                  <input class="form-control" type="text" name="acad_title" id="acad_title" value="<?= old('acad_title') ?>" placeholder="<?= lang('Signup.acad_title') ?>" >
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-6">
                  <!--label class="form-label" for="name"><!?= lang('Signup.name') ?></label-->
                      <input class="form-control" type="text" name="name" id="name" value="<?= old('name') ?>" placeholder="<?= lang('Signup.name') ?>" required>
                </div>
                <div class="col-md-6">
                  <!--label class="form-label" for="lastname"><!?= lang('Signup.lastname') ?></label-->
                      <input class="form-control" type="text" name="lastname" id="lastname" value="<?= old('lastname') ?>" placeholder="<?= lang('Signup.lastname') ?>" required>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-4">
                  <!--label class="label" for="email"><!?= lang('Signup.email') ?></label-->
                  <input class="form-control" type="text" name="email" id="email" value="<?= old('email') ?>" placeholder="<?= lang('Signup.email') ?>" required>
                </div>
                <div class="col-md-4">
                  <!--label class="label" for="password"><!?= lang('Signup.password') ?></label-->
                    <input class="form-control" type="password" name="password" placeholder="<?= lang('Signup.password') ?>" required>
                </div>
                <div class="col-md-4">
                  <!--label class="label" for="password_confirmation"><!?= lang('Signup.repeat_password') ?></label-->
                  <input class="form-control" type="password" name="password_confirmation" placeholder="<?= lang('Signup.repeat_password') ?>">
                </div>
              </div>

              <div class="form-group row">
                <h4 class="heading">Informationen über Ihre Schule</h4>
              </div>

              <div class="form-group row">
                <div class="col-md-6">
                  <!--label class="form-label" for="teacher_phone"><!?= lang('Signup.teacher_phone') ?></label-->
                      <input class="form-control" type="text" name="teacher_phone" id="teacher_phone" value="<?= old('teacher_phone') ?>" placeholder="<?= lang('Signup.teacher_phone') ?>" required>
                </div>
                <div class="col-md-6">
                  <!--label class="form-label" for="school_phone"><!?= lang('Signup.school_phone') ?></label-->
                      <input class="form-control" type="text" name="school_phone" id="school_phone" value="<?= old('school_phone') ?>" placeholder="<?= lang('Signup.school_phone') ?>" required>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-6">
                  <!--label class="form-label" for="school_name"><!?= lang('Signup.school_name') ?></label-->
                      <input class="form-control" type="text" name="school_name" id="school_name" value="<?= old('school_name') ?>" placeholder="<?= lang('Signup.school_name') ?>" required>
                </div>
                <div class="col-md-3">
                  <!--label class="form-label" for="school_code"><!?= lang('Signup.school_code') ?></label-->
                      <input class="form-control" type="text" name="school_code" id="school_code" value="<?= old('school_code') ?>" placeholder="<?= lang('Signup.school_code') ?>" required>
                </div>

                <div class="col-md-3">
                  <?php $schoolTypes=array (''=> lang('Schulform'), 'NMS'  => 'NMS', 'VMS' => 'VMS',
                                        'KMS' => 'KMS', 'AHS' => 'AHS', 'HTL' => 'HTL', 'HAK' => 'HAK', 'BAKIP' => 'BAKIP',
                                        'HLWB' => 'HLWB', 'HBLA' => 'HBLA', 'VS' => 'VS', 'HS' => 'HS', 'Andere'=> 'Andere')?>
                  <!--label class="form-label" for="school_type"><!?= lang('Signup.school_type') ?></label-->
                      <?=form_dropdown('school_type', $schoolTypes, '' , 'class="form-select", required="required"');?>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-9">
                  <!--label for="school_street" class="form-label"><!?= lang('Signup.school_street') ?></label-->
                  <input class="form-control" type="text" id="school_street" name="school_street" value="<?= old('school_street') ?>" placeholder="<?= lang('Signup.school_street') ?>" required>
                </div>
                <div class="col-md-3">
                  <!--label for="school_house_nr" class="form-label"><!?= lang('Signup.houseNr') ?></label-->
                  <input class="form-control" type="text" id="school_house_nr" name="school_house_nr" value="<?= old('school_house_nr') ?>" placeholder="<?= lang('Signup.houseNr') ?>" required>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-3">
                  <!--label for="zip" class="form-label"><!?= lang('Signup.zip') ?></label-->
                  <input class="form-control" type="text" id="zip" name="school_zip" value="<?= old('zip') ?>" placeholder="<?= lang('Signup.zip') ?>" required>
                </div>
                <div class="col-md-4">
                  <!--label for="city" class="form-label"><!?= lang('Signup.city') ?></label-->
                  <input class="form-control" type="text" id="city" name="school_city" value="<?= old('city') ?>" placeholder="<?= lang('Signup.city') ?>" required>
                </div>
                <div class="col-md-5">
                  <?php $states=array (''=> lang('Bundesland auswählen'), 'burgenland'=>'Burgenland',
                                                  'kaernten' => 'Kärnten', 'niederoesterreich' => 'Niederösterreich', 'oberoesterreich' => 'Oberösterreich',
                                                  'salzburg' => 'Salzburg', 'steiermark' => 'Steiermark', 'tirol' => 'Tirol', 'vorarlberg' => 'Vorarlberg', 'wien' => 'Wien')?>
                  <!--label  for="state" class="form-label"><!?=lang('Signup.state')?></label-->
                  <?=form_dropdown('school_state', $states, '' , 'class="form-select", required="required"');?>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="tou_confirmed" name="tou_confirmed" value="1">
                    <label class="form-check-label" for="tou_confirmed">
                      Ich habe die <a target="_blank" href="http://www.pangea-wettbewerb.at/agb/"><strong>AGBs</strong></a> gelesen und akzeptiert
                    </label>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="privacy_policy" name="privacy_policy" value="1">
                    <label class="form-check-label" for="privacy_policy">
                      Ich habe die <a target="_blank" href="http://www.pangea-wettbewerb.at/datenschutz/"><strong>Datenschutzerklärung</strong></a> gelesen und akzeptiert
                    </label>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-outline-primary"><?= lang('Signup.sign_up') ?></button>
                    <a class="btn btn-outline-secondary" href="<?= site_url("/") ?>"><?= lang('Signup.cancel') ?></a>
                </div>
              </div>

            <?=form_close();?>

          </div>
        </div>
      </div>
</div>



<?= $this->endSection() ?>
