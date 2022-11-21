<?= $this->extend('partials/template'); ?>
<?= $this->section('content-container'); ?>
<?= $this->include('partials/topbar'); ?>

<div class="row">
  <?= $this->include('partials/sidebar'); ?>

  <main class="container col-10 pl-10">
    <h1 class="my-4">Perubahan Kontrak</h1>

    <form action="/contract/update/<?= $contract['id']; ?>" method="POST">
      <?= csrf_field(); ?>

      <input type="hidden" name="id" value="<?= $contract['id']; ?>">

      <section class="form-group row mb-3">
        <label for="no_kontrak" class="col-sm-2 col-form-label">No. Kontrak</label>

        <div class="col-sm-8">
          <input type="number" class="form-control w-75 <?= ($validation->hasError('no_kontrak')) ? 'is-invalid' : ''; ?>" id="no_kontrak" name="no_kontrak" value="<?= $contract['no_kontrak']; ?>"
                 autofocus>

          <div class="invalid-feedback">
            <?= $validation->getError('no_kontrak'); ?>
          </div>
        </div>
      </section>

      <section class="form-group row mb-3">
        <label for="nama_kontrak" class="col-sm-2 col-form-label">Nama Kontrak</label>

        <div class="col-sm-8">
          <input type="text" class="form-control w-75 <?= ($validation->hasError('nama_kontrak')) ? 'is-invalid' : ''; ?>" id="nama_kontrak" name="nama_kontrak"
                 value="<?= $contract['nama_kontrak']; ?>">

          <div class="invalid-feedback">
            <?= $validation->getError('nama_kontrak'); ?>
          </div>
        </div>
      </section>

      <section class="form-group row mb-3">
        <label for="durasi" class="col-sm-2 col-form label">Durasi</label>

        <div class="col-sm-8">
          <input type="date" class="form-control w-75 <?= ($validation->hasError('durasi')) ? 'is-invalid' : ''; ?>" id="durasi" name="durasi" value="<?= $contract['durasi']; ?>">

          <div class="invalid-feedback">
            <?= $validation->getError('durasi'); ?>
          </div>
        </div>
      </section>

      <section class="form-group row mb-3">
        <label for="perusahaan" class="col-sm-2 col-form-label">Perusahaan</label>

        <div class="col-sm-8">
          <input type="text" class="form-control w-75 <?= ($validation->hasError('perusahaan')) ? 'is-invalid' : ''; ?>" id="perusahaan" name="perusahaan" value="<?= $contract['perusahaan']; ?>">

          <div class="invalid-feedback">
            <?= $validation->getError('perusahaan'); ?>
          </div>
        </div>
      </section>

      <section class="form-group row mb-3">
        <label for="nilai_kontrak" class="col-sm-2 col-form-label">Nilai Kontrak</label>

        <div class="col-sm-8">
          <input type="number" class="form-control w-75 <?= ($validation->hasError('nilai_kontrak')) ? 'is-invalid' : ''; ?>" id="nilai_kontrak" name="nilai_kontrak"
                 value="<?= $contract['nilai_kontrak']; ?>">

          <div class="invalid-feedback">
            <?= $validation->getError('nilai_kontrak'); ?>
          </div>
        </div>
      </section>

      <button type="submit" class="btn btn-primary">Ubah Data</button>
    </form>
  </main>
</div>

<?= $this->endSection(); ?>