<aside class="sidebar__navigation col-4 col-md-2">
  <button type="button" class="wrap__navigation" aria-label="Wrapper sidebar">
    <i class="fa-solid fa-bars arrow fs-3"></i>
  </button>

  <nav class="navigation__content pt-3">
    <ul class="row g-3">
      <li class="section__list">
        <section class="section__list-header">
          <h2 class="section__list-profile mb-0">
            <a href="/user/profile" class="text-dark">
              <i class="fa-solid fa-user icon me-2"></i>
              <span>Profile</span>
            </a>
          </h2>
        </section>
      </li>

      <li class="section__list mt-0">
        <section class="section__list-header">
          <h2 class="section__list-profile mb-0">
            <a href="/user/setting" class="text-dark">
              <i class="fa-solid fa-gear icon me-2"></i>
              <span>Settings</span>
            </a>
          </h2>
        </section>
      </li>

      <?php if(in_groups('user')) : ?>

      <li class="section__list mt-0">
        <section class="section__list-header">
          <h2 class="section__list-profile mb-0">
            <a href="/transaction" class="text-dark">
              <i class="fa-solid fa-money-check icon me-2"></i>
              <span>Transaction</span>
            </a>
          </h2>
        </section>
      </li>

      <li class="section__list mt-0">
        <section class="section__list-header">
          <h2 class="section__list-profile mb-0">
            <a href="/contract" class="text-dark">
              <i class="fa-solid fa-file-contract icon me-2"></i>
              <span>Contract</span>
            </a>
          </h2>
        </section>
      </li>
      <?php endif; ?>

      <?php if(in_groups('admin')) :  ?>

      <li class="section__list hide">
        <section class="section__list-header wrap d-flex align-items-center">
          <i class="fa-solid fa-money-check icon me-2"></i>
          <h2 class="section__list-title mb-0">Transaction</h2>
          <i class="fa-solid fa-chevron-down arrow ms-auto"></i>
        </section>

        <section class="section__list-item transaction-section">
          <a href="/admin/transaction/add">Input Transaction</a>
          <a href="/transaction">List Transaction</a>
        </section>
      </li>

      <li class="section__list hide">
        <section class="section__list-header wrap d-flex align-items-center">
          <i class="fa-regular fa-user icon me-2"></i>
          <h2 class="section__list-title mb-0">Users</h2>
          <i class="fa-solid fa-chevron-down arrow ms-auto"></i>
        </section>

        <section class="section__list-item user-section">
          <a href="/admin/user/add">Input User</a>
          <a href="/admin/users">List User</a>
        </section>
      </li>

      <li class="section__list hide">
        <section class="section__list-header wrap d-flex align-items-center">
          <i class="fa-solid fa-file-contract icon me-2"></i>
          <h2 class="section__list-title mb-0">Contract</h2>
          <i class="fa-solid fa-chevron-down arrow ms-auto"></i>
        </section>

        <section class="section__list-item contract-section">
          <a href="/admin/contract/add">Input Contract</a>
          <a href="/contract">List Contract</a>
        </section>
      </li>
      <?php endif; ?>

      <?php if(logged_in()) :  ?>
      <hr>
      <li class="section__list">
        <h2 class="section__list-title">
          <a href="/logout" class="section__list-logout">
            <i class="fa-solid fa-right-from-bracket icon-logout me-2"></i>
            <span>Logout</span>
          </a>
        </h2>
      </li>
      <?php endif; ?>
    </ul>

    <div class="copyright fw-semibold">&copy 2022, Developed by SIMASTI</div>
  </nav>
</aside>