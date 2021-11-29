<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?><?= lang('ClassRegistrations.delete_classregistration') ?><?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1 class="title"><?= lang('ClassRegistrations.delete_classregistration') ?></h1>

<p><?= lang('ClassRegistrations.are_you_sure') ?></p>

<?= form_open("/classRegistrations/delete/" . $classRegistration->id) ?>

    <div class="field is-grouped">
        <div class="control">
            <button class="button is-primary"><?= lang('ClassRegistrations.yes') ?></button>
        </div>

        <div class="control">
            <a class="button" href="<?= site_url('/classRegistrations/show/' . $classRegistration->id) ?>"><?= lang('ClassRegistrations.cancel') ?></a>
        </div>
    </div>

</form>

<?= $this->endSection() ?>
