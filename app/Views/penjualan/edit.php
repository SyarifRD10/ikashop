<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h1>Edit Penjualan</h1>

<!-- Tampilkan pesan error jika ada -->
<?php if (session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form action="/penjualan/update/<?= $penjualan['id_penjualan'] ?>" method="post">
    <div class="form-group">
        <label>Nama Pelanggan:</label>
        <input type="text" value="<?= $penjualan['nama_pelanggan'] ?>" name="nama_penjualan" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Tanggal Pembelian:</label>
        <input type="text" value="<?= $penjualan['tanggal_penjualan'] ?>" name="alamat" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Nama Produk:</label>
        <input type="text" value="<?= $penjualan['nama_produk'] ?>" name="alamat" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Jumlah:</label>
        <input type="number" value="<?= $penjualan['kuantitas'] ?>" name="telepon" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success mr-3">Simpan</button>
    <a href="/penjualan" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>