<header class="navbar navbar-expand-lg bg-primary">
  <nav class="container">
    <a class="navbar-brand text-light" href="/">
      <img src="<?= base_url(); ?>/images/bkkbn.png" alt="Logo" width="100" class="image-logo">
      <span class="brand ps-1">SIMASTI</span>
    </a>

    <div class="hstack gap-3">
      <?php if($title == 'Home') : ?>
      <div class="dropdown">
        <i class="fa-regular fa-bell position-relative text-light fs-5" data-bs-toggle="dropdown">
          <?php 
            $now = date('d-m-Y');
            $hari = new DateTime($now);
          if($contracts == null){
            echo '';
          } else {
          foreach($contracts as $contract){
            $endContract = new DateTime($contract['durasi']);
          }
          $durasi = $hari->diff($endContract);
          $durasiHari =  $durasi->d;
          if($durasiHari < 10) :
         ?>

          <span class="position-absolute p-1 top-0 start-100 translate-middle bg-danger border border-light rounded-circle">
            <span class="visually-hidden">New alerts</span>
          </span>

          <?php endif; }?>
        </i>

        <div class="dropdown-menu dropdown-menu-end" style="min-width: 20rem;">
          <?php 
          if($contracts == null){
            echo '<div class="ms-3">Data tidak ditemukan</div>';
          }
            foreach($contracts as $contract) : 
              $now = date('d-m-Y');
              $hari = new DateTime($now);
              $endContract = new DateTime($contract['durasi']);
              $durasi = $hari->diff($endContract);
              $durasiHari =  $durasi->d;
              if($durasiHari < 1) :
          ?>

          <div class="alert alert-danger mb-1" role="alert">
            Durasi Kontrak <?= $contract['nama_kontrak']; ?> telah selesai
          </div>

          <?php elseif($durasiHari <= 7) : ?>

          <div class="alert alert-warning mb-1" role="alert">
            Durasi Kontrak <?= $contract['nama_kontrak']; ?> segera selesai
          </div>

          <?php endif; endforeach; ?>
        </div>
      </div>
      <?php endif; ?>

      <div class="user hstack">
        <span class="user__name"><?= user()->username; ?></span>
        <img class="user__picture rounded-circle" width="40" src="<?= base_url(); ?>/images/<?= user()->profile_picture; ?>" alt="" draggable="false">
      </div>
    </div>
  </nav>
</header>