<?= $this->extend('partials/template'); ?>
<?= $this->section('content-container'); ?>
<?= $this->include('partials/topbar'); ?>

<div class="row me-0">
  <?= $this->include('partials/sidebar'); ?>

  <main class="container col-10 pt-md-2">
    <table id="table_id" class="table table-striped table-hover text-center py-3">
      <thead class="table-dark">
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Nama</th>
          <th scope="col">Garansi</th>
          <th scope="col">Nilai Perolehan</th>
          <th scope="col">Status</th>
          <th scope="col">Pemilik</th>
          <th scope="col">No. Kontrak</th>
          <th scope="col">No. Penghapusan</th>

          <?php if(in_groups('admin')) : ?>
          <th scope="col">Action</th>
          <?php endif; ?>
        </tr>
      </thead>

      <tbody class="table-group-divider">
        <?php 
          $i = 1;
          foreach($transaction as $t) : 
        ?>
        <tr>
          <th scope="row"><?= $i++; ?></th>
          <td><?= $t['nama']; ?></td>
          <td><?= $t['garansi']; ?></td>
          <td><?= $t['nilai_perolehan']; ?></td>
          <td><?= $t['status']; ?></td>
          <td><?= $t['nama_user']; ?></td>
          <td><?= $t['no_kontrak']; ?></td>
          <td><?= $t['no_penghapusan']; ?></td>

          <?php if(in_groups('admin')) : ?>
          <td>
            <section class="d-flex justify-content-center gap-2">
              <a href="/transaction/<?= $t['id']; ?>/edit" class="button-action text-bg-secondary">
                <i class="fa-solid fa-pen"></i>
              </a>

              <form action="/transaction/<?= $t['id']; ?>" method="POST" class="button-action text-bg-secondary">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus user?')"> <i class="fa-solid fa-trash"></i>
                </button>
              </form>
            </section>
          </td>
          <?php endif; ?>

        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </main>
</div>

<?= $this->endSection(); ?>