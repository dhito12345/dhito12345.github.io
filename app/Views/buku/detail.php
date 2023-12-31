<?= $this->extend('layout/template');?>
<?= $this->section('content');?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Detail Buku</h1>
            <div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="/img/<?= $buku['sampul']; ?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?= $buku['judul'];?></h5>
        <p class="card-text"><b>Kelas :</b><?= $buku['kelas'];?></p>
        <p class="card-text"><small class="text-muted"><b>Penulis : </b><?= $buku['penulis'];?></small></p>
        <p class="card-text"><small class="text-muted"><b>Penerbit : </b><?= $buku['penerbit'];?></small></p>
<a href="/buku/edit/<?= $buku['slug']; ?>" class="btn btn-outline-warning">Edit</a>
<a href="/buku/delete/<?= $buku['id']; ?>" class="btn btn-outline-danger">Delete</a>
<a href="/buku" class="btn btn-outline-primary">Kembali Ke Daftar Buku</a>
    </div>
    </div>
  </div>
</div>
        </div>
    </div>
</div>
<?= $this->endSection();?>