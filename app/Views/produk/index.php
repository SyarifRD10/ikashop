<?=$this->extend('layout')?>
<?=$this->section('content')?>


<h1>Daftar Produk</h1>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?=session()->getFlashdata('success')?>
    </div>
<?php endif;?>

<a href="/produk/tambah" class="btn btn-primary mb-3">Tambah Produk</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Deskripsi</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($produk as $index => $p): ?>
            <tr>
                <td><?=$index + 1?></td>
                <td><?=$p['nama_produk']?></td>
                <td>Rp. <?=number_format($p['harga'], 0, ',', '.');?></td>
                <td><?=$p['deskripsi']?></td>
                <td><?=$p['nama_kategori']?></td>
                <?php if (!empty($p['stok'])): ?>
                    <td><?=$p['stok']?></td>
                <?php else: ?>
                    <td>Tidak ada stok</td>
                <?php endif;?>
                <td>
                    <a href="/produk/edit/<?=$p['id_produk']?>" class="btn btn-warning">Edit</a>
                    <a href="/produk/delete/<?=$p['id_produk']?>" class="btn btn-danger">Delete</a>
                    <a href="/stok_barang/create/<?=$p['id_produk']?>" class="btn btn-primary">Kelola Stok</a>
                </td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>

<?=$this->endSection()?>