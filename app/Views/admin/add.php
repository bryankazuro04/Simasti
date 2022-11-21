<?= $this->extend('partials/template'); ?>
<?= $this->section('content-container'); ?>
<?= $this->include('partials/topbar'); ?>

<div class="row">
  <?= $this->include('partials/sidebar'); ?>

  <div class="col-10 pl-10">
    <h1 class="text-gray-900 my-4"><?= $title ?></h1>

    <?= view('\Myth\Auth\Views\_message_block') ?>

    <form action="<?= base_url(); ?>/admin/user/save" class="user" method="post">
      <?= csrf_field() ?>

      <div class="form-group row mb-3">
        <label for="email" class="col-sm-2 col-form-label">Email</label>

        <div class="col-sm-8">
          <input type="email" id="email" class="form-control form-control-user w-75 <?= (session('errors.email')) ? 'is-invalid' : ''; ?>" name="email" aria-describedby="emailHelp"
                 placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>">
        </div>
      </div>

      <div class="form-group row mb-3">
        <label for="username" class="col-sm-2 col-form-label">Username</label>

        <div class="col-sm-8">
          <input type="text" id="username" class="form-control form-control-user w-75 <?= (session('errors.username')) ? 'is-invalid' : ''; ?>" name="username" placeholder="<?=lang('Auth.username')?>"
                 value="<?= old('username') ?>">
        </div>
      </div>

      <div class="form-group row mb-3">
        <label for="password" class="col-sm-2 col-form-label">Password</label>

        <div class="col-sm-8">
          <input type="password" id="password" name="password" class="form-control form-control-user w-75 <?= (session('errors.password')) ? 'is-invalid' : ''; ?>"
                 placeholder="<?=lang('Auth.password')?>" autocomplete="off">
        </div>
      </div>

      <div class="form-group row mb-3">
        <label for="pass_confirm" class="col-sm-2 col-form-label">Confirm Password</label>

        <div class="col-sm-8">
          <input type="password" id="pass_confirm" name="pass_confirm" class="form-control form-control-user w-75 <?= (session('errors.pass_confirm')) ? 'is-invalid' : ''; ?>"
                 placeholder="<?=lang('Auth.repeatPassword')?>" autocomplete="off">
        </div>
      </div>

      <button type="submit" class="btn btn-primary btn-user btn-block">Tambah</button>
    </form>
  </div>
</div>

<?= $this->endSection(); ?>