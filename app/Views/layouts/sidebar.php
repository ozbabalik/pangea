<?php if (current_user()): ?>
  <nav class="offcanvas offcanvas-start show" tabindex="-1" id="offcanvas" data-bs-keyboard="false" data-bs-backdrop="true" data-bs-scroll="true">
  <div class="offcanvas-header border-bottom">
    <a href="/" class="d-flex align-items-center text-decoration-none offcanvas-title d-sm-block">
      <span class="fs-4"><img src="/images/logo_lq.png" class="img-fluid"></span>
    </a>
  </div>
  <div class="offcanvas-body px-0">
    <ul class="list-unstyled ps-0">

      <li class="mb-1">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
            <li><a href="/"
            <?php if(isset($currentPage)&&$currentPage== 'home'):?>
               class="rounded active"

            <?php else:?> class="rounded"
            <?php endif; ?> >

              <img class="bi me-2" width="20" height="20" src="/fa/svgs/solid/tachometer-alt.svg"></img>
              Dashboard
            </a></li>
            <li><a href="<?= site_url("/admin/users") ?>"
              <?php if(isset($currentPage)&&$currentPage== 'users'):?>
                 class="rounded active"

              <?php else:?> class="rounded"
              <?php endif; ?> >
              <img class="bi me-2" width="20" height="20" src="/fa/svgs/solid/users.svg"></img>
              Users</a></li>
            <li><a href="<?= site_url("/classRegistrations") ?>"
              <?php if(isset($currentPage)&&$currentPage== 'classRegistrations'):?>
                 class="rounded active"

              <?php else:?> class="rounded"
              <?php endif; ?> >
              <img class="bi me-2" width="20" height="20" src="/fa/svgs/solid/users.svg"></img>
              Anmeldungen</a></li>
          </ul>
      </li>

      <li class="border-top my-2"></li>
      <li class="mb-1">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
            <li><a href="<?= site_url("/profile/show") ?>"
              <?php if(isset($currentPage)&&$currentPage== 'profile'):?>
                 class="rounded active"

              <?php else:?> class="rounded"
              <?php endif; ?> >
              <img class="bi me-2" width="20" height="20" src="/fa/svgs/solid/user.svg"></img>
              Profile</a></li>
            <li><a href="<?= site_url("/logout") ?>" class="rounded">
              <img class="bi me-2" width="20" height="20" src="/fa/svgs/solid/sign-out-alt.svg"></img>
              Sign out</a></li>
          </ul>

      </li>
    </ul>
  </div>
</nav>
<?php endif; ?>
