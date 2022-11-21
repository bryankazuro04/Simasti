<?= $this->extend('partials/template'); ?>
<?= $this->section('content-container'); ?>

<div class="text-center">
  <?= view('Myth\Auth\Views\_message_block') ?>
</div>

<main class="container container__main">
  <h1 class="text-center mb-5"><?=lang('Auth.loginTitle')?></h1>

  <form action="<?= url_to('login') ?>" method="POST" class="form__login mx-auto">
    <?= csrf_field() ?>

    <section class="form-group justify-content-evenly">
      <label for="login" class="form__login-label col-sm-2"><?=lang('Auth.email')?></label>

      <input type="email" class="form__login-input w-50 <?= (session('errors.login')) ? 'is-invalid' : '' ?>" id="email" name="login" aria-label="E-Mail field" autofocus>

      <div class="invalid-feedback">
        <?= session('errors.login') ?>
      </div>
    </section>

    <section class="form-group justify-content-evenly align-items-center">
      <label for="password" class="form__login-label col-sm-2"><?=lang('Auth.password')?></label>

      <input type="password" class="form__login-input w-50 <?= (session('errors.password')) ? 'is-invalid' : '' ?>" id="password" name="password" aria-label="Password field">

      <div class="invalid-feedback">
        <?= session('errors.password') ?>
      </div>
    </section>

    <section class="form__login-button mt-3 justify-content-around">
      <button type="submit" class="btn btn-primary align-self-end"><?=lang('Auth.loginAction')?></button>
    </section>
  </form>
</main>

<?= $this->endSection(); ?>