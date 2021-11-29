<?= $this->extend("layouts/default") ?>

<?= $this->section('title') ?><?= lang('AdminUsers.title') ?><?= $this->endSection() ?>

<?= $this->section("content") ?>






      <div class="card">
          <h1 class="card-header"><?= lang('AdminUsers.title') ?></h1>
          <div class="card-body">
          <div style="padding:10px 10px;">  <a type="button" class="btn btn-primary" href="<?= site_url("/admin/users/new") ?>"><?= lang('AdminUsers.new') ?></a>
</div>
    <?php if ($users): ?>


        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th><?= lang('AdminUsers.name') ?></th>
                    <th><?= lang('AdminUsers.email') ?></th>
                    <th><?= lang('AdminUsers.active') ?></th>
                    <th><?= lang('AdminUsers.administrator') ?></th>
                    <th><?= lang('AdminUsers.created_at') ?></th>
                    <th><?= lang('Summe') ?></th>

                    <th><?= lang('AdminUsers.class_registrations') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user): ?>

                    <tr>
                        <td>
                            <a style="background-color: 'blue';" href="<?= site_url("/admin/users/show/" . $user->id) ?>">
                                <?= esc($user->name) ?>
                            </a>
                        </td>
                        <td><?= esc($user->email) ?></td>
                        <td><?= $user->is_active ? lang('AdminUsers.yes') : lang('AdminUsers.no') ?></td>
                        <td><?= $user->is_admin ? lang('AdminUsers.yes') : lang('AdminUsers.no') ?></td>
                        <td><?= $user->created_at ?></td>
                        <td><?=$classRegistrations->getSumOfStudentsByUserID($user->id)?></td>
                        <td style="text-align: center; vertical-align: middle;"><a class="btn btn-secondary" href="<?= site_url("admin/users/classRegistrations/" . $user->id) ?>">
                            <?= lang("Anmeldungen") ?>
                        </a></td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>

        <?= $pager->simpleLinks() ?>

    <?php else: ?>

        <p><?= lang('AdminUsers.no_users_found') ?>.</p>

    <?php endif; ?>
  </div>
</div>
<?= $this->endSection() ?>
