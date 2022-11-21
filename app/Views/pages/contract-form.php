<?= $this->extend('partials/template'); ?>
<?= $this->section('content-container'); ?>
<?= $this->include('partials/topbar'); ?>

<div class="row">
  <?= $this->include('partials/sidebar'); ?>

  <main class="container col-10 pl-10">
    <h1 class="my-4">Penambahan Kontrak</h1>

    <form action="/contract/save" method="POST">
      <?= csrf_field(); ?>

      <section class="form-group row mb-3">
        <label for="no_contract" class="col-sm-2 col-form-label">No. Kontrak</label>

        <div class="col-sm-8">
          <input type="number" name="no_kontrak" class="form-control w-75 <?= ($validation->hasError('no_kontrak')) ? 'is-invalid' : ''; ?>" id="no_contract" value="<?= old('no_kontrak'); ?>"
                 autofocus>

          <div class="invalid-feedback">
            <?= $validation->getError('no_kontrak'); ?>
          </div>
        </div>
      </section>

      <section class="form-group row mb-3">
        <label for="name_contract" class="col-sm-2 col-form-label">Nama Kontrak</label>

        <div class="col-sm-8">
          <input type="text" name="nama_kontrak" class="form-control w-75 <?= ($validation->hasError('nama_kontrak')) ? 'is-invalid' : ''; ?>" id="name_contract" value="<?= old('nama_kontrak'); ?>"
                 autofocus>

          <div class="invalid-feedback">
            <?= $validation->getError('nama_kontrak'); ?>
          </div>
        </div>
      </section>

      <section class="form-group row mb-3">
        <label for="duration" class="col-sm-2 col-form-label">Durasi</label>

        <div class="col-sm-8">
          <input type="date" name="durasi" class="form-control w-75 <?= ($validation->hasError('durasi')) ? 'is-invalid' : ''; ?>" id="duration" value="<?= old('durasi'); ?>" autofocus>

          <div class="invalid-feedback">
            <?= $validation->getError('durasi'); ?>
          </div>
        </div>
      </section>

      <section class="form-group row mb-3">
        <label for="perusahaan" class="col-sm-2 col-form-label">Perusahaan</label>

        <div class="col-sm-8">
          <input type="text" name="perusahaan" class="form-control w-75 <?= ($validation->hasError('perusahaan')) ? 'is-invalid' : ''; ?>" id="perusahaan" value="<?= old('perusahaan'); ?>" autofocus>

          <div class="invalid-feedback">
            <?= $validation->getError('perusahaan'); ?>
          </div>
        </div>
      </section>

      <section class="form-group row mb-3">
        <label for="nilai_kontrak" class="col-sm-2 col-form-label">Nilai Kontrak</label>

        <div class="col-sm-8">
          <input type="number" name="nilai_kontrak" class="form-control w-75 <?= ($validation->hasError('nilai_kontrak')) ? 'is-invalid' : ''; ?>" id="nilai_kontrak"
                 value="<?= old('nilai_kontrak'); ?>" autofocus>

          <div class="invalid-feedback">
            <?= $validation->getError('nilai_kontrak'); ?>
          </div>
        </div>
      </section>

      <button type="submit" class="btn btn-primary">Tambah Data</button>
    </form>
  </main>
</div>

<?= $this->endSection(); ?>