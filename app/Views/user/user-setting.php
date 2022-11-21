<?= $this->extend('partials/template'); ?>
<?= $this->section('content-container'); ?>
<?= $this->include('partials/topbar'); ?>

<div class="row">
  <?= $this->include('partials/sidebar'); ?>

  <div class="container col-10 pl-10">
    <h1 class="my-4">Settings</h1>

    <form action="/user/update/<?= user()->id; ?>" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="gambarLama" value="<?= user()->profile_picture; ?>">
      <section class="form-group row mb-3">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>

        <div class="col-sm-8">
          <input type="text" class="form-control w-75" id="nama" name="username" value="<?= user()->username; ?>">
        </div>
      </section>

      <section class="form-group row mb-3">
        <label for="email" class="col-sm-2 col-form-label">E-Mail</label>

        <div class="col-sm-8">
          <input type="email" class="form-control w-75" id="email" name="email" value="<?= user()->email; ?>">
        </div>
      </section>

      <section class="form-group row mb-3">
        <label for="telepon" class="col-sm-2 col-form-label">No. Telepon</label>

        <div class="col-sm-8">
          <input type="tel" class="form-control w-75" id="telepon" name="no_telepon" value="<?= user()->no_telepon; ?>">
        </div>
      </section>

      <section class="form-group row mb-3">
        <label for="picture" class="col-sm-2 col-form-label">Gambar Profil</label>

        <div class="col-sm-2">
          <img src="<?= base_url(); ?>/images/<?= user()->profile_picture; ?>" alt="" class="img-thumbnail img-preview">
        </div>

        <div class="col-sm-6">
          <input type="file" class="form-control w-75" id="picture" name="profile_picture" value="<?= user()->profile_picture; ?>" accept=".jpg, .jpeg, .png" onchange="previewImg()">
        </div>
      </section>

      <div class="mt-4">
        <a href="<?= base_url(); ?>/user/changePassword/<?= user()->id;?>" title="Ubah Password"><small>Change Password</small></a>

        <button type="submit" class="mt-2 d-block btn btn-primary">Simpan Perubahaan</button>
      </div>
    </form>
  </div>
</div>


<?= $this->endSection(); ?>