<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h1>Ubah Stok Barangn</h1>

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

    <!-- Tampilkan pesan sukses jika ada -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <form action="/stok_barang/update/<?= $stok_barang['id_stok'] ?>" method="post">
        <?= csrf_field() ?> <!-- CSRF Protection -->
        <table class="table table-striped">
            <tbody>
                <tr>
                    <td>
                        <label for="id_produk">Nama Produk:</label>
                        <input type="text" name="nama_produk" id="id_produk" value="<?= $stok_barang['id_produk'] ?>" class="form-control" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="jumlah_barang_masuk">Barang Masuk:</label>
                        <input type="number" name="jumlah_barang_masuk" id="harga" class="form-control" step="0.01" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="jumlah_barang_keluar">Barang Keluar:</label>
                        <textarea name="number" id="jumlah_barang_keluar" class="form-control" required></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="tanggal">Tanggal:</label>
                        <input type="date" name="tanggal" id="harga" class="form-control" step="0.01" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="nama_supplier">Nama Supplier:</label>
                        <textarea name="text" id="nama_supplier" class="form-control" required></textarea>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="mt-4 mx-2">
            <button type="submit" class="btn btn-success mr-3">Simpan</button>
            <a href="/stok_barang" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>

<?= $this->endSection() ?>