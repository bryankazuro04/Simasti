<?= $this->extend('partials/template'); ?>
<?= $this->section('content-container'); ?>
<?= $this->include('partials/topbar'); ?>

<div class="row">
  <?= $this->include('partials/sidebar'); ?>

  <div class="col-10 pl-10">
    <?php if (isset($validation)) : ?>
    <div class="col-md-12">
      <?php foreach ($validation->getErrors() as $error) : ?>
      <div class="alert alert-warning" role="alert">
        <i class="mdi mdi-alert-outline me-2"></i>
        <?= esc($error) ?>
      </div>
      <?php endforeach ?>
    </div>
    <?php endif; ?>

    <h1 class="my-4">Change Password</h1>

    <form action="<?= base_url(); ?>/user/setPassword" method="post">
      <input type="hidden" name="id" class="id" value="<?= $id; ?>">

      <div class="form-group row mb-3">
        <label for="password" class="col-sm-2 col-form-label">Password</label>

        <div class="col-sm-8">
          <input type="password" name="password" id="password" class="form-control form-control-user w-75 <?= (session('errors.password')) ? 'is-invalid' : '' ?>"
                 placeholder="<?=lang('Auth.password')?>" autocomplete="off">
        </div>
      </div>

      <div class="form-group row mb-3">
        <label for="pass_confirm" class="col-sm-2 col-form-label">Confirm Password</label>

        <div class="col-sm-8">
          <input type="password" name="pass_confirm" id="pass_confirm" class="form-control form-control-user w-75 <?= (session('errors.pass_confirm')) ? 'is-invalid' : '' ?>"
                 placeholder="<?=lang('Auth.repeatPassword')?>" autocomplete="off">
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</div>

<?= $this->endSection(); ?>