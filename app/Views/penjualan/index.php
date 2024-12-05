<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h1>Daftar Penjualan</h1>
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>
<a href="penjualan/create" class="btn btn-primary mb-3">Tambah Penjualan</a>
<a href="laporan_penjualan/cetak" class="btn btn-primary mb-3">Cetak Laporan</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal Pembelian</th>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $currentCustomer = null;
        foreach ($penjualan as $index => $p):
            if ($currentCustomer !== $p['id_pelanggan']):
                $currentCustomer = $p['id_pelanggan'];
        ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $p['nama_pelanggan'] ?></td>
                    <td><?php
                        $date = new \DateTime($p['tanggal_penjualan']);
                        echo $date->format("d M, Y");
                        ?></td>
                    <td><?= $p['nama_produk'] ?></td>
                    <td><?= $p['kuantitas'] ?></td>
                    <td>
                        <a href="/penjualan/edit/<?= $p['id_penjualan'] ?>" class="btn btn-danger">Edit</a>
                        <a href="/penjualan/detail/<?= $p['id_penjualan'] ?>" class="btn btn-info mr-3">Detail</a>
                        <a href="/penjualan/delete/<?= $p['id_penjualan'] ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>