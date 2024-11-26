<?= $this->extend('layout') ?>
<?= $this->section('content') ?>


<h1>Daftar Stok <?= $produk['nama_produk'] ?></h1>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<form action="/stok_barang/store" method="post">
    <table>
        <tbody>
            <tr>
                <td>
                    <label for="kategori_produk">Supplier:</label>
                    <select name="id_supplier" id="kategori_produk" class="form-control" required>
                        <option value="">Pilih Supplier</option>
                        <?php if (!empty($supplier)): ?>
                            <?php foreach ($supplier as $k): ?>
                                <option value="<?= esc($k['id_supplier']) ?>"><?= esc($k['nama_supplier']) ?></option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="">Tidak ada supplier tersedia</option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="harga">Barang Masuk:</label>
                    <input type="number" name="jumlah_barang_masuk" id="jumlah_barang_masuk" class="form-control" step="0.01" required>
                </td>
            </tr>
        </tbody>
    </table>
    <button type="submit" class="btn btn-primary mb-3">Tambah Stok</button>

</form>

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
        <?php foreach ($produk as $index => $p): ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><?= $p['jumlah_barang_masuk'] ?></td>
                <td><?= $p['jumlah_barang_keluar'] ?></td>
                <td><?= $p['tanggal'] ?></td>
                <td><?= $p['nama_supplier'] ?></td>
                <td>
                    <a href="/stok_barang/edit/<?= $p['id_produk'] ?>" class="btn btn-warning">Edit</a>
                    <a href="/stok_barang/delete/<?= $p['id_produk'] ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>