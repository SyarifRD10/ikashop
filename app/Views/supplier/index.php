<?= $this->extend('layout') ?>
<?= $this->section('content') ?>


<h1>Daftar Supplier</h1>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<a href="supplier/tambah" class="btn btn-primary mb-3">Tambah Supplier</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Supplier</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($supplier as $i => $p): ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td><?= $p['nama_supplier'] ?></td>
                <td><?= $p['alamat'] ?></td>
                <td><?= $p['telepon'] ?></td>
                <td>
                    <a href="/supplier/edit/<?= $p['id_supplier'] ?>" class="btn btn-warning">Edit</a>
                    <a href="/supplier/delete/<?= $p['id_supplier'] ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>