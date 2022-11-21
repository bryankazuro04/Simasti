<?= $this->extend('partials/template'); ?>
<?= $this->section('content-container'); ?>
<?= $this->include('partials/topbar'); ?>

<div class="row">
  <?= $this->include('partials/sidebar'); ?>

  <div class=" col-8 col-md-6 pl-10">
    <h1 class="my-4">My Profile</h1>

    <section class="form-group mb-3">
      <label for="nama" class="col-form-label">Nama</label>
      <input type="text" class="form-control form__control-input w-75" id="nama" name="username" value="<?= user()->username; ?>" disabled>
    </section>

    <section class="form-group mb-3">
      <label for="email" class="col-form-label">E-Mail</label>
      <input type="email" class="form-control form__control-input w-75" id="email" name="email" value="<?= user()->email; ?>" disabled>
    </section>

    <section class="form-group mb-3">
      <label for="no_telepon" class="col-form-label">No. Telepon</label>
      <input type="telp" class="form-control form__control-input w-75" id="no_telepon" name="no_telepon" value="<?= user()->no_telepon; ?>" disabled>
    </section>
  </div>

  <div class="col-md-3 mt-5">
    <img src="<?= base_url(); ?>/images/<?= user()->profile_picture; ?>" alt="<?= user()->fullname; ?>" class="user__picture img-fluid rounded-circle mb-4 w-75" draggable="false">

  </div>
</div>

<?= $this->endSection(); ?>