<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h1>Edit Supplier</h1>

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

<form action="/supplier/update/<?= $supplier['id_supplier'] ?>" method="post">
    <div class="form-group">
        <label>Nama Supplier:</label>
        <input type="text" value="<?= $supplier['nama_supplier'] ?>" name="nama_supplier" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Alamat Supplier:</label>
        <input type="text" value="<?= $supplier['alamat'] ?>" name="alamat" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Telepon:</label>
        <input type="number" value="<?= $supplier['telepon'] ?>" name="telepon" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success mr-3">Simpan</button>
    <a href="/supplier" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>