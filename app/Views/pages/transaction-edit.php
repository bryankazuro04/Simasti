<?= $this->extend('partials/template'); ?>
<?= $this->section('content-container'); ?>
<?= $this->include('partials/topbar'); ?>

<div class="row">
  <?= $this->include('partials/sidebar'); ?>

  <div class="container col-10 pl-10">
    <h1 class="my-4">Perubahan Transaksi</h1>

    <form action="/transaction/update/<?= $transaction['id']; ?>" method="POST">
      <?= csrf_field(); ?>
      <input type="hidden" name="id" value="<?= $transaction['id']; ?>">

      <section class="form-group row mb-3">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>

        <div class="col-sm-8">
          <input type="text" name="nama" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>  w-75" id="nama" autofocus value="<?= $transaction['nama']; ?>">

          <div class="invalid-feedback">
            <?= $validation->getError('nama'); ?>
          </div>
        </div>
      </section>

      <section class="form-group row mb-3">
        <label for="garansi" class="col-sm-2 col-form-label">Garansi</label>

        <div class="col-sm-8">
          <input type="text" name="garansi" class="form-control <?= ($validation->hasError('garansi')) ? 'is-invalid' : ''; ?> w-75" id="garansi" value="<?= $transaction['garansi']; ?>">

          <div class="invalid-feedback">
            <?= $validation->getError('garansi'); ?>
          </div>
        </div>
      </section>

      <section class="form-group row mb-3">
        <label for="nilai_perolehan" class="col-sm-2 col-form-label">Nilai Perolehan</label>

        <div class="col-sm-8">
          <input type="text" name="nilai_perolehan" class="form-control <?= ($validation->hasError('nilai_perolehan')) ? 'is-invalid' : ''; ?> w-75" id="nilai_perolehan"
                 value="<?= $transaction['nilai_perolehan']; ?>">

          <div class="invalid-feedback">
            <?= $validation->getError('nilai_perolehan'); ?>
          </div>
        </div>
      </section>

      <section class="form-group row mb-3">
        <label for="status" class="col-sm-2 col-form-label">Status</label>

        <div class="col-sm-8">
          <input type="text" name="status" class="form-control <?= ($validation->hasError('status')) ? 'is-invalid' : ''; ?> w-75" id="status" value="<?= $transaction['status']; ?>">

          <div class="invalid-feedback">
            <?= $validation->getError('status'); ?>
          </div>
        </div>
      </section>

      <section class="form-group row mb-3">
        <label for="nama_user" class="col-sm-2 col-form-label">Pemilik</label>

        <div class="col-sm-8">
          <input type="text" class="form-control w-75" id="nama_user" name="nama_user" value="<?= $transaction['nama_user']; ?>" readonly>
        </div>
      </section>

      <section class="form-group row mb-3">
        <label for="no_kontrak" class="col-sm-2 col-form-label">Nomor Kontrak</label>

        <div class="col-sm-8">
          <input type="number" name="no_kontrak" class="form-control <?= ($validation->hasError('no_kontrak')) ? 'is-invalid' : ''; ?> w-75" id="no_kontrak" value="<?= $transaction['no_kontrak']; ?>"
                 readonly>

          <div class="invalid-feedback">
            <?= $validation->getError('no_kontrak'); ?>
          </div>
        </div>
      </section>

      <section class="form-group row mb-3">
        <label for="no_penghapusan" class="col-sm-2 col-form-label">Nomor Penghapusan</label>

        <div class="col-sm-8">
          <input type="number" name="no_penghapusan" class="form-control <?= ($validation->hasError('no_penghapusan')) ? 'is-invalid' : ''; ?> w-75" id="no_penghapusan"
                 value="<?= $transaction['no_penghapusan']; ?>">

          <div class="invalid-feedback">
            <?= $validation->getError('no_penghapusan'); ?>
          </div>
        </div>
      </section>

      <button type="submit" class="btn btn-primary">Ubah Data</button>
    </form>
  </div>
</div>

<?= $this->endSection(); ?>