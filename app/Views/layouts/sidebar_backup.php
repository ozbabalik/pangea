<main>
<?php if (current_user()): ?>
  <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">

      <span class="fs-4"><img src="/images/logo_lq.png" class="img-fluid"></span>
    </a>
    <hr>


    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">

        <a href="/"
        <?php if(isset($currentPage)&&$currentPage== 'home'):?>
           class="nav-link active" aria-current="page"

        <?php else:?> class="nav-link link-dark"
        <?php endif; ?> >

          <img class="bi me-2" width="16" height="16" height="16" src="/fa/svgs/solid/home.svg"></img>
          <?= lang('App.nav.home') ?>
        </a>
      </li>

      <?php if (current_user()->is_admin): ?>
        <li>
          <a href="<?= site_url("/admin/users") ?>"
            <?php if(isset($currentPage)&&$currentPage== 'users'):?>
               class="nav-link active" aria-current="page"
            <?php else:?> class="nav-link link-dark" <?php endif; ?>>
              <img class="bi me-2" width="16" height="16" src="/fa/svgs/solid/users.svg"></img>
              <?= lang('App.nav.users') ?>
          </a>
        </li>
      <?php endif; ?>

      <li>
        <a href="<?= site_url("/classRegistrations") ?>"
          <?php if(isset($currentPage)&&$currentPage=='classRegistrations'):?>
             class="nav-link active" aria-current="page"
          <?php else:?> class="nav-link link-dark" <?php endif; ?>>
          <img class="bi me-2" width="16" height="16" src="/fa/svgs/solid/users.svg"></img>
          <?= lang('App.nav.classRegistrations') ?>
        </a>
      </li>

    <hr>

    <ul class="nav nav-pills flex-column mb-auto">
        <li>
          <a href="<?= site_url("/profile/show") ?>"

            <?php if(isset($currentPage)&&$currentPage== 'profile'):?>
              class="nav-link active" aria-current="page"
             <?php else:?> class="nav-link link-dark"
             <?php endif; ?>>
            <img class="bi me-2" width="16" height="16" src="/fa/svgs/regular/user.svg"></img>
            <?= lang('App.nav.profile') ?>
          </a>
        </li>
        <li>
          <a href="<?= site_url("/logout") ?>" class="nav-link link-dark">
            <img class="bi me-2" width="16" height="16" src="/fa/svgs/solid/sign-out-alt.svg"></img>
            <?= lang('App.nav.logout') ?>
          </a>
        </li>
          <strong><?= lang('App.nav.hello') ?>, <?= esc(current_user()->name) ?></strong>
      </ul>

  </div>
  <?php endif; ?>
</main>
