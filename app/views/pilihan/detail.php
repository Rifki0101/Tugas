<div class="container mt-5">
    
    <div class="card" style="width: 18rem;">
      <div class="card-body">
      <?php 
        $n=0;
        foreach( $data['mhs'] as $mhs ) : ?>
        <h5 class="card-title"><?= $mhs['nama']; ?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?= $mhs['nrp']; ?></h6>
        <p class="card-text" >Mata Kuliah Yang Dikuti : </p>
        <?php foreach( $data['mhs'] as $mhs ) : ?>
        <p class="card-text"><?= $mhs['matakuliah']; ?></p>
        <?php endforeach; ?>
        <?php
        $n++; 
        if ($n==1){break;}
        endforeach; ?>
        <a href="<?= BASEURL; ?>/pilihan" class="card-link">Kembali</a>
      </div>
    </div>

</div>