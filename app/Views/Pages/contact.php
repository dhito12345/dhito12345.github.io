<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
        <h1> Perpustakaan Skanic</h1>
       

<?php foreach ($alamat as $gibran) :?>
    <ul>
        <li><?= $gibran['tipe'] ?></li>
        <li><?= $gibran['alamat'] ?></li>
        <li><?= $gibran['kab'] ?></li>
        <li><?= $gibran['provinsi'] ?></li>
    </ul>
    <?php endforeach; ?>
    </div>
    </div>
</div>
    <?= $this->endsection(); ?>
