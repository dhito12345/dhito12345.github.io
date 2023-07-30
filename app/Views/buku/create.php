<?= $this->extend('layout/template');  ?>
<?= $this->section('content');  ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Form Tambah Data Buku</h2>

            <form action="/buku/save" method="post" enctype="multipart/form-data">
              <?= csrf_field() ; ?>
  <div class="form-group row">
    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
    <div class="col-sm-10 mb-2">
      <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 
      'is-invalid': ''; ?>" id="judul" name="judul" autofocus value="<?= old('judul'); ?>">
      <div class="invalid-feedback">
      <?= $validation->getError('judul');?>
    </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
    <div class="col-sm-10 mb-2">
      <input type="text" class="form-control <?= ($validation->hasError('kelas')) ? 
      'is-invalid': ''; ?>" id="kelas" name="kelas" autofocus value="<?= old('kelas'); ?>">
      <div class="invalid-feedback">
      <?= $validation->getError('kelas');?>
    </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
    <div class="col-sm-10 mb-2">
      <input type="text" class="form-control <?= ($validation->hasError('penulis')) ? 
      'is-invalid': ''; ?>" id="penulis" name="penulis"value="<?= old('penulis'); ?>">
   <div class="invalid-feedback">
      <?= $validation->getError('penulis');?>
    </div>  
  </div>
  </div>
  <div class="form-group row">
    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
    <div class="col-sm-10 mb-2">
      <input type="text" class="form-control <?= ($validation->hasError('penerbit')) ? 
      'is-invalid': ''; ?>" id="penerbit" name="penerbit"value="<?= old('penerbit'); ?>">
   <div class="invalid-feedback">
      <?= $validation->getError('penerbit');?>
    </div>  
  </div>
  </div>
  <div class="form-group row">
    <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
    <div class="col-sm-2">
      <img src="/img/download.jpg" class="img-thumbnail img-Preview">
    </div>
    <div class="col-sm-8 mb-2">
    <div class="custom-file">
  <input type="file" class="custom-file-input" id="sampul" name="sampul" onchange="previewImg()">
  <label class="custom-file-label" for="sampul">Choose file</label>
</div>
  </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10  mt-3">
      <button type="submit" class="btn btn-outline-primary">Tambah Data</button>
      <a href="/buku" class="btn btn-outline-primary">Kembali Ke Daftar Buku</a>
    </div>
  </div>
</form>

        </div>
    </div>
</div>


<?= $this->endSection();  ?>