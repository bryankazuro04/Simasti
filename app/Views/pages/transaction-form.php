<?= $this->extend('partials/template'); ?>
<?= $this->section('content-container'); ?>
<?= $this->include('partials/topbar'); ?>

<div class="row">
  <?= $this->include('partials/sidebar'); ?>

  <main class="container col-10 pl-10">
    <h1 class="my-4">Penambahan Transaksi</h1>

    <form action="/transaction/history" method="POST">
      <?= csrf_field(); ?>

      <section class="form-group row mb-3">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>

        <div class="col-sm-8">
          <input type="text" name="nama" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>  w-75" id="nama" autofocus value="<?= old('nama'); ?>">

          <div class="invalid-feedback">
            <?= $validation->getError('nama'); ?>
          </div>
        </div>
      </section>

      <section class="form-group row mb-3">
        <label for="garansi" class="col-sm-2 col-form-label">Garansi</label>

        <div class="col-sm-8">
          <input type="text" name="garansi" class="form-control <?= ($validation->hasError('garansi')) ? 'is-invalid' : ''; ?> w-75" id="garansi" value="<?= old('garansi'); ?>">

          <div class="invalid-feedback">
            <?= $validation->getError('garansi'); ?>
          </div>
        </div>
      </section>

      <section class="form-group row mb-3">
        <label for="nilai_perolehan" class="col-sm-2 col-form-label">Nilai Perolehan</label>

        <div class="col-sm-8">
          <input type="text" name="nilai_perolehan" class="form-control <?= ($validation->hasError('nilai_perolehan')) ? 'is-invalid' : ''; ?> w-75" id="nilai_perolehan"
                 value="<?= old('nilai_perolehan'); ?>">

          <div class="invalid-feedback">
            <?= $validation->getError('nilai_perolehan'); ?>
          </div>
        </div>
      </section>

      <section class="form-group row mb-3">
        <label for="status" class="col-sm-2 col-form-label">Status</label>

        <div class="col-sm-8">
          <input type="text" name="status" class="form-control <?= ($validation->hasError('status')) ? 'is-invalid' : ''; ?> w-75" id="status" value="<?= old('status'); ?>">

          <div class="invalid-feedback">
            <?= $validation->getError('status'); ?>
          </div>
        </div>
      </section>

      <section class="form-group row mb-3">
        <label for="nama_user" class="col-sm-2 col-form-label">User</label>

        <div class="col-sm-8">
          <select name="nama_user" class="form-select fs-6 w-75" id="nama_user" aria-label="Default select">
            <option selected disabled></option>
            <?php foreach($users as $user) : ?>
            <option value="<?= $user->username; ?>"><?= $user->username; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </section>

      <section class="form-group row mb-3">
        <label for="no_kontrak" class="col-sm-2 col-form-label">Nomor Kontrak</label>

        <div class="col-sm-8">
          <select name="no_kontrak" class="form-select fs-6 w-75 <?= ($validation->hasError('no_kontrak')) ? 'is-invalid' : ''; ?>" id="no_kontrak" aria-label="Default select example">
            <option selected disabled></option>
            <?php foreach($contract as $contract) : ?>
            <option value="<?= $contract['no_kontrak']; ?>"><?= $contract['no_kontrak']; ?></option>
            <?php endforeach; ?>
          </select>

          <div class="invalid-feedback">
            <?= $validation->getError('no_kontrak'); ?>
          </div>
        </div>
      </section>

      <section class="form-group row mb-3">
        <label for="no_penghapusan" class="col-sm-2 col-form-label">Nomor Penghapusan</label>

        <div class="col-sm-8">
          <input type="number" name="no_penghapusan" class="form-control <?= ($validation->hasError('no_penghapusan')) ? 'is-invalid' : ''; ?> w-75" id="no_penghapusan"
                 value="<?= old('no_penghapusan'); ?>">

          <div class="invalid-feedback">
            <?= $validation->getError('no_penghapusan'); ?>
          </div>
        </div>
      </section>

      <button type="submit" class="btn btn-primary">Tambah Data</button>
    </form>
  </main>
</div>

<?= $this->endSection(); ?>