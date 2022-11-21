<?= $this->extend('partials/template'); ?>
<?= $this->section('content-container'); ?>
<?= $this->include('partials/topbar'); ?>

<div class="row">
  <?= $this->include('partials/sidebar'); ?>

  <main class="container col-10">
    <h1 class="my-4"><?= $title; ?></h1>

    <div class="row gap-1 px-2 justify-content-around">
      <?php foreach($users as $user) : ?>

      <div class="card col-4 mb-4 <?= ($user->deleted_at != null) ? 'd-none' : ''; ?>" style="width: 16rem;">
        <div class="card-body">
          <div class="card-header ">
            <h2 class="card-title text-truncate fs-4 d-inline" style="max-width: 10rem;"><?= $user->username; ?></h2>
            <span class="badge card-role text-bg-<?= ($user->name == 'admin') ? 'success' : 'primary';?> p-2"><?= $user->name; ?></span>
            <img class="user__picture card-image rounded-circle" width="40" src="<?= base_url(); ?>/images/<?= $user->profile_picture; ?>" alt="">
          </div>

          <h3 class="card-subtitle mb-2  text-muted fs-6"><?= $user->email; ?></h3>

          <p class="card-text <?= ($user->no_telepon == null) ? 'invisible' : ''; ?>"><?= ($user->no_telepon != null) ? $user->no_telepon : '000'; ?></p>

          <div class="button gap-2">
            <a href="/admin/user/<?= $user->userid; ?>/edit" class="button-action text-bg-secondary">
              <i class="fa-solid fa-pen"></i>
            </a>

            <form action="/admin/user/<?= $user->userid; ?>/delete" method="POST" class="d-inherit">
              <?= csrf_field(); ?>
              <input type="hidden" name="_method" value="DELETE">
              <button type="submit" class="button-action text-bg-secondary" onclick="return confirm('Apakah Anda yakin ingin menghapus user?')"> <i class="fa-solid fa-trash"></i>
              </button>
            </form>

            <a href="#" class="button-action text-bg-secondary btn-change-group" data-id="<?= $user->userid;?>" title="Ubah Grup">
              <i class="fa-solid fa-tasks"></i>
            </a>
          </div>
        </div>
      </div>

      <?php endforeach; ?>
    </div>

    <form action="<?= base_url(); ?>/admin/user/changeGroup" method="post">
      <div class="modal fade" id="changeGroupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ubah Grup</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <div class="list-group-item p-3">
                <div class="row align-items-start">
                  <div class="col-md-4 mb-8pt mb-md-0">
                    <div class="media align-items-left">
                      <div class="d-flex flex-column media-body media-middle">
                        <span class="card-title">Grup</span>
                      </div>
                    </div>
                  </div>

                  <div class="col mb-8pt mb-md-0">
                    <select name="group_id" class="form-control" data-toggle="select">
                      <?php foreach($roles as $role) : ?>
                      <option value="<?= $role->roleid; ?>"><?= $role->name; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal-footer">
              <input type="hidden" name="id" class="id">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </main>
</div>

<?= $this->endSection(); ?>