<?=$this->extend('layout')?>
<?=$this->section('content')?>

<h1>Daftar Penjualan</h1>
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?=session()->getFlashdata('success')?>
    </div>
<?php endif;?>
<a href="penjualan/create" class="btn btn-primary mb-3">Tambah Penjualan</a>
<a href="laporan_penjualan/cetak" class="btn btn-primary mb-3">Cetak Laporan</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal Pembelian</th>
            <th>Detail Penjualan</th>
            <th>Total Tagihan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($penjualan as $index => $p): ?>
        <tr>
            <td><?=$index + 1?></td>
            <td><?=$p['nama_pelanggan']?></td>
            <td><?=(new \DateTime($p['tanggal_penjualan']))->format('d M, Y')?></td>
            <td>
                <ul>
                    <?php foreach ($p['detail_penjualan'] as $detail): ?>
                        <li><?=$detail['nama_produk']?> (<?=$detail['kuantitas']?>)</li>
                    <?php endforeach;?>
                </ul>
            </td>
            <td>Rp. <?= number_format($p['total_harga'], 0, ',', '.'); ?></td>
            <td>
                <a href="/penjualan/detail/<?=$p['id_penjualan']?>" class="btn btn-info mr-3">Detail</a>
                <a href="/penjualan/delete/<?=$p['id_penjualan']?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>




<?=$this->endSection()?>