<?= $this->extend('partials/template'); ?>
<?= $this->section('content-container'); ?>

<div class="text-center">
  <?= view('Myth\Auth\Views\_message_block') ?>
</div>

<main class="container container__main">
  <h1 class="text-center my-4"><?=lang('Auth.register'); ?></h1>

  <form action="<?= url_to('register'); ?>" class="form__login user mx-auto" method="POST">
    <?= csrf_field(); ?>

    <section class="form-group row mb-1">
      <label for="email" class="col-sm-4 form__login-label"><?=lang('Auth.email')?></label>

      <div class="col-sm-8">
        <input type="email" class="form__login-input <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" id="email" name="email">
      </div>
    </section>

    <section class="form-group row mb-1">
      <label for="username" class="col-sm-4 form__login-label">Nama User</label>

      <div class="col-sm-8">
        <input type="text" class="form__login-input <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" id="username" name="username">
      </div>
    </section>

    <section class="form-group row mb-1">
      <label for="password" class="col-sm-4 form__login-label"><?=lang('Auth.password')?></label>

      <div class="col-sm-8">
        <input type="password" class="form__login-input <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" id="password" name="password">
      </div>
    </section>

    <section class="form-group row mb-1">
      <label for="pass_confirm" class="col-sm-4 form__login-label"><?=lang('Auth.repeatPassword')?></label>

      <div class="col-sm-8">
        <input type="password" class="form__login-input <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" id="pass_confirm" name="pass_confirm">
      </div>
    </section>

    <button type="submit" class="btn btn-primary"><?=lang('Auth.register')?></button>
  </form>
</main>

<?= $this->endSection(); ?>