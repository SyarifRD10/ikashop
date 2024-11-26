<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h1>Tambah Supplier</h1>

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

<form action="/supplier/create" method="post">
    <div class="form-group">
        <label>Nama Supplier:</label>
        <input type="text" name="nama_supplier" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Alamat Supplier:</label>
        <input type="text" name="alamat" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Telepon:</label>
        <input type="number" name="telepon" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success mr-3">Simpan</button>
    <a href="/supplier" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>