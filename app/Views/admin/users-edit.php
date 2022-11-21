<?= $this->extend('partials/template'); ?>
<?= $this->section('content-container'); ?>
<?= $this->include('partials/topbar'); ?>

<div class="row">
  <?= $this->include('partials/sidebar'); ?>

  <main class="container col-10 pl-10">
    <h1 class="my-4">Perubahan Data User</h1>

    <form action="/admin/user/update/<?= $user->id; ?>" method="POST">
      <?= csrf_field(); ?>

      <input type="hidden" name="id" value="<?= $user->userid; ?>">

      <section class="form-group row mb-3">
        <label for="email" class="col-sm-2 col-form-label">E-Mail</label>

        <div class="col-sm-8">
          <input type="email" name="email" class="form-control w-75 <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" value="<?= $user->email; ?>">

          <div class="invalid-feedback">
            <?= $validation->getError('email'); ?>
          </div>
        </div>
      </section>

      <section class="form-group row mb-3">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>

        <div class="col-sm-8">
          <input type="text" name="username" class="form-control w-75 <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="nama" value="<?= $user->username; ?>">

          <div class="invalid-feedback">
            <?= $validation->getError('username'); ?>
          </div>
        </div>
      </section>

      <section class="form-group row mb-3">
        <label for="telp" class="col-sm-2 col-form-label">No. Telepon</label>

        <div class="col-sm-8">
          <input type="telp" name="no_telepon" class="form-control w-75 <?= ($validation->hasError('no_telepon')) ? 'is-invalid' : ''; ?>" id="telp" value="" autofocus>

          <div class="invalid-feedback">
            <?= $validation->getError('no_telepon'); ?>
          </div>
        </div>
      </section>

      <button type="submit" class="btn btn-primary">Ubah Data</button>
    </form>
  </main>
</div>

<?= $this->endSection(); ?>