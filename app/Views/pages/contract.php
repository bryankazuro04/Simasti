<?= $this->extend('partials/template'); ?>
<?= $this->section('content-container'); ?>
<?= $this->include('partials/topbar'); ?>

<div class="row">
  <?= $this->include('partials/sidebar'); ?>

  <main class="container col-10 pt-md-2">
    <table id="table_id" class="table table-striped table-hover text-center py-3">
      <thead class="table-dark">
        <tr>
          <th scope="col">No.</th>
          <th scope="col">No. Kontrak</th>
          <th scope="col">Nama Kontrak</th>
          <th scope="col">Durasi</th>
          <th scope="col">Perusahaan</th>
          <th scope="col">Nilai Kontrak</th>
          <?php if(in_groups('admin')) : ?>
          <th scope="col">Action</th>
          <?php endif; ?>
        </tr>
      </thead>

      <tbody class="table-group-divider">
        <?php 
          $i = 1;
          foreach($contract as $contract) : 
        ?>

        <tr>
          <th scope="row"><?= $i++; ?></th>
          <td><?= $contract['no_kontrak']; ?></td>
          <td><?= $contract['nama_kontrak']; ?></td>
          <td><?= $contract['durasi']; ?></td>
          <td><?= $contract['perusahaan']; ?></td>
          <td><?= $contract['nilai_kontrak']; ?></td>

          <?php if(in_groups('admin')) : ?>
          <td>
            <section class="d-flex justify-content-center gap-2">
              <a href="/contract/<?= $contract['id']; ?>/edit" class="button-action text-bg-secondary">
                <i class="fa-solid fa-pen"></i>
              </a>

              <form action="/contract/<?= $contract['id']; ?>" method="POST" class="button-action text-bg-secondary">
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