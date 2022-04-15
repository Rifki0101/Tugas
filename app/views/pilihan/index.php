<div class="container mt-3">

    <div class="row">
      <div class="col-lg-6">
        <?php Flasher::flash(); ?>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-lg-6">
        <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
          Tambah Data pilihan
        </button>
      </div>
    </div>
  
    <div class="row">
        <div class="col-lg-6">
          <h3>Daftar pilihan</h3>
          <ul class="list-group">
            <?php foreach( $data['mhs'] as $mhs ) : ?>
              <li class="list-group-item">
                  <?=$mhs['nama'].'_'.$mhs['nrp']; ?>
                  <p>Jumlah Pelajaran <?= $mhs['jumlah']; ?></p>
                  <a href="<?= BASEURL; ?>/pilihan/detail/<?= $mhs['nrp']; ?>" class="badge badge-primary float-right">detail</a>
              </li>
            <?php endforeach; ?>
          </ul>      
        </div>
    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Tambah Data pilihan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form action="<?= BASEURL; ?>/pilihan/tambah" method="post">
        <input type="hidden" name="id" id="id">
        <div class="form-group">
            <label for="nrp">NRP</label>
            <input type="number" class="form-control" id="nrp" name="nrp" autocomplete="off">
          </div>
  
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required>
          </div>
          
          <div class="form-group">
            <label for="matakuliah">Mata Kuliah</label>
            <input type="Text" class="form-control" id="matakuliah" name="matakuliah">
          </div>

      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>
