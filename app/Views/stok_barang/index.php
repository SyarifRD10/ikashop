<?=$this->extend('layout')?>
<?=$this->section('content')?>

<h1>Daftar Stok Barang</h1>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?=session()->getFlashdata('success')?>
    </div>
<?php endif;?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Jumlah Barang Masuk</th>
            <th>Jumlah Barang Keluar</th>
            <th>Stok Tersedia</th>
            <th>Supplier</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($stok_barang)): ?>
            <?php foreach ($stok_barang as $index => $stok): ?>
                <tr>
                    <td><?=$index + 1?></td>
                    <td><?=esc($stok['nama_produk'])?></td>
                    <td><?=number_format($stok['harga'], 2, ',', '.')?> IDR</td>
                    <td><?=$stok['jumlah_barang_masuk']?></td>
                    <td><?=$stok['jumlah_barang_keluar']?></td>
                    <td><?=$stok['stok_tersedia']?></td>
                    <td><?=esc($stok['nama_supplier'])?></td>
                    <td><?=date('d-m-Y', strtotime($stok['tanggal']))?></td>
                    <td>
                        <a href="/stok_barang/create/<?=$stok['id_produk']?>" class="btn btn-info">Detail</a>
                    </td>
                </tr>
            <?php endforeach;?>
        <?php else: ?>
            <tr>
                <td colspan="9" class="text-center">Tidak ada data stok barang tersedia</td>
            </tr>
        <?php endif;?>
    </tbody>
</table>

<?=$this->endSection()?>
