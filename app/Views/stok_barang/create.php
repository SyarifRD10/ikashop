<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h1>Stok Barang</h1>

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

    <form action="<?= site_url('stok_barang/create') ?>" method="post">
        <?= csrf_field() ?> <!-- CSRF Protection -->
        <table class="table table-striped">
            <tbody>
                <tr>
                    <td>
                        <label for="nama_produk">Nama Produk:</label>
                        <input type="text" name="id_produk" id="nama_produk" class="form-control" required>
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
                <tr>
                    <td>
                        <label for="stok_barang">Stok Barang:</label>
                        <select name="id_kategori" id="kategori_produk" class="form-control" required>
                            <option value="">Stok BArang</option>
                            <?php if (!empty($stok_barang)): ?>
                                <?php foreach ($stok_barang as $k): ?>
                                    <option value="<?= esc($k['id_barang']) ?>"><?= esc($k['stok_barang']) ?></option>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <option value="">Stok Habis</option>
                            <?php endif; ?>
                        </select>
                    </td>
                </tr>

            </tbody>
        </table>
        <div class="mt-4 mx-2">
            <button type="submit" class="btn btn-success mr-3">Simpan</button>
            <a href="<?= site_url('/produk') ?>" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>

<?= $this->endSection() ?>