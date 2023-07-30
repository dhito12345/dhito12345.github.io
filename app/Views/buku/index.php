<?= $this->extend('layout/template'); ?>
<?= $this->section('content') ;?>
<div class="container">
    <div class="row">
        <div class="col">
            <a href="create"class="btn btn-outline-primary mt-4">Tambah Data Buku</a>          
            <h2>Daftar Buku</h2>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
</div>
                <?php endif; ?>  
            <table class="table">
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari Judul" name="keyword">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" name="submit">Cari</button>
                        </div>
                    </div>
                </form>
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Sampul</th>
            <th scope="col">Judul</th>
            <th scope="col">Aksi</th>
        </tr>
        </thead>
        <tbody>
            <?php $i = 1+(5*($currentPage - 1)); ?>
            <?php foreach($buku as $coll): ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><img src="/img/<?= $coll['sampul']; ?>"alt="" class="sampul"></td>
                    <td><?= $coll['judul']; ?></td>
                    <td>
                        <a href="/buku/<?= $coll['slug']; ?>" class="btn btn-outline-success">Detail</a>
                    </td>
                </tr>
                <?php endforeach;?>
        </tbody>
            </table>
            <?= $pager->links('buku', 'bs_pagination') ?>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>