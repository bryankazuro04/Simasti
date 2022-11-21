<?= $this->extend('partials/template'); ?>
<?= $this->section('content-container'); ?>
<?= $this->include('partials/topbar'); ?>

<div class="row">
  <?= $this->include('partials/sidebar'); ?>
  <main class="container col-md-10">
    <div class="row">
      <div class="col-lg-6">
        <h1 class="h3 my-4">Tabel Kontrak</h1>

        <table class="table table-striped table-hover text-center py-3">
          <thead class="table-dark">
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Nama Kontrak</th>
              <th scope="col">Durasi</th>
              <th scope="col">status</th>
            </tr>
          </thead>

          <tbody class="table-group-divider">
            <?php 
            $i = 1;
            if($contracts == null){
              echo '<td colspan=4>Tidak ada masa kontrak yang segera selesai</td>';
            }
            foreach($contracts as $contract) : 
            $now = date('d-m-Y');
            $hari = new DateTime($now);
            $endContract = new DateTime($contract['durasi']);
            $durasi = $hari->diff($endContract);
            $durasiHari =  $durasi->d;
            if($durasiHari <= 7) :
          ?>

            <tr>
              <th scope="row"><?= $i++; ?></th>
              <td><?= $contract['nama_kontrak']; ?></td>
              <td><?= $contract['durasi']; ?></td>
              <td><?= ($durasiHari < 1) ? 'masa kontrak telah habis' : 'masa kontrak segera selesai' ; ?></td>
            </tr>

            <?php endif; endforeach; ?>
          </tbody>
        </table>
      </div>

      <div class="col-lg-6">
        <h1 class="h3 my-4">Tabel Transaksi</h1>

        <table class="table table-striped table-hover text-center py-3">
          <thead class="table-dark">
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Nama</th>
              <th scope="col">Status</th>
              <th scope="col">No. Kontrak</th>
            </tr>
          </thead>

          <tbody class="table-group-divider">
            <?php 
            $i = 1;
            if($transactions == null){
              echo '<td colspan=4>Data tidak ditemukan</td>';
            }
            foreach($transactions as $t) : 
          ?>
            <tr>
              <th scope="row"><?= $i++; ?></th>
              <td><?= $t['nama']; ?></td>
              <td><?= $t['status']; ?></td>
              <td><?= $t['no_kontrak']; ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>
</div>

<?= $this->endSection(); ?>