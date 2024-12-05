<?=$this->extend('layout')?>
<?=$this->section('content')?>


<?php if (!empty($produk)): ?>
<h1>Daftar Stok <?=$produk['nama_produk']?></h1>
<?php endif;?>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?=session()->getFlashdata('success')?>
    </div>
<?php endif;?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<form action="/stok_barang/store" method="post">
    <input type="text" name="id_produk" value="<?=$produk['id_produk'];?>" hidden>
    <div class="form-group">
        <label for="id_supplier">Supplier:</label>
        <select name="id_supplier" id="id_supplier" class="form-control">
            <option value="">Pilih Supplier</option>
            <?php if (!empty($supplier)): ?>
                <?php foreach ($supplier as $k): ?>
                    <option value="<?=esc($k['id_supplier'])?>"><?=esc($k['nama_supplier'])?></option>
                <?php endforeach;?>
            <?php else: ?>
                <option value="">Tidak ada supplier tersedia</option>
            <?php endif;?>
        </select>
    </div>

    <div class="form-group">
        <label for="jumlah_barang_masuk">Barang Masuk:</label>
        <input type="text" name="jumlah_barang_masuk" id="jumlah_barang_masuk" class="form-control" step="0.01">
    </div>

    <div class="form-group">
        <label for="jumlah_barang_keluar">Barang Keluar:</label>
        <input type="text" name="jumlah_barang_keluar" id="jumlah_barang_keluar" class="form-control" step="0.01">
    </div>
    <div class="row">
        <div class="col text-left">
            <a href="/produk" class="btn btn-outline-warning ">Back</a>
        </div>
        <div class="col text-right">
            <button type="submit" class="btn btn-primary ">Simpan</button>
        </div>
    </div>
</form>

<h3 class="mb-2 mt-5">History Stok</h3>
<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Jumlah Barang Masuk</th>
            <th>Jumlah Barang Keluar</th>
            <th>Tanggal</th>
            <th>Supplier</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($stok)): ?>
        <?php foreach ($stok as $index => $p): ?>
            <tr>
                <td><?=$index + 1;?></td>
                <td><?=$p['jumlah_barang_masuk']?></td>
                <td><?=$p['jumlah_barang_keluar']?></td>
                <td><?=(new \DateTime($p['tanggal']))->format('d M, Y')?></td>
                <td><?=$p['nama_supplier']?></td>
                <td>
                    <a href="/stok_barang/edit/<?=$p['id_stok']?>" class="btn btn-warning">Edit</a>
                    <a href="/stok_barang/delete/<?=$p['id_stok']?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach;?>
        <?php endif;?>
    </tbody>
</table>

<?=$this->endSection()?>