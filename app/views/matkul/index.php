<div class="container mt-3">

    <div class="row">
      <div class="col-lg-6">
        <?php Flasher::flash(); ?>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-lg-6">
        <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
          Tambah Data Matkul
        </button>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-lg-6">
        <form action="<?= BASEURL; ?>/matkul/cari" method="post">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="cari Matkul.." name="keyword" id="keyword" autocomplete="off">
            <div class="input-group-append">
              <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  
    <div class="row">
        <div class="col-lg-6">
          <h3>Daftar Matkul</h3>
          <ul class="list-group">
            <?php foreach( $data['mat'] as $mat ) : ?>
              <li class="list-group-item">
                  <?= $mat['nama']; ?>
                  <a href="<?= BASEURL; ?>/matkul/hapus/<?= $mat['id']; ?>" class="badge badge-danger float-right" onclick="return confirm('yakin?');">hapus</a>
                  <a href="<?= BASEURL; ?>/matkul/ubah/<?= $mat['id']; ?>" class="badge badge-success float-right tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $mat['id']; ?>">ubah</a>
                  <a href="<?= BASEURL; ?>/matkul/detail/<?= $mat['id']; ?>" class="badge badge-primary float-right">detail</a>
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
        <h5 class="modal-title" id="formModalLabel">Tambah Data Matkul</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form action="<?= BASEURL; ?>/matkul/tambah" method="post">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label for="nama">Nama Mata Kuliah</label>
            <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required>
          </div>

          <div class="form-group">
            <label for="nrp">Kapasitas</label>
            <input type="number" class="form-control" id="kapasitas" name="kapasitas" autocomplete="off">
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

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
    $(function() {

$('.tombolTambahData').on('click', function() {
    $('#formModalLabel').html('Tambah Data Matkul');
    $('.modal-footer button[type=submit]').html('Tambah Data');
    $('#nama').val('');
    $('#kapasitas').val('');
});


$('.tampilModalUbah').on('click', function() {

    $('#formModalLabel').html('Ubah Data Matkul');
    $('.modal-footer button[type=submit]').html('Ubah Data');

    
    $('.modal-body form').attr('action', '<?= BASEURL; ?>/matkul/ubah');

    const id = $(this).data('id');

    $.ajax({
        url: '<?= BASEURL; ?>/matkul/getubah',
        data: {
            id: id
        },
        method: 'post',
        dataType: 'json',
        success: function(data) {
            $('#nama').val(data.nama);
            $('#kapasitas').val(data.kapasitas);
        }
    });

});

});
</script>


