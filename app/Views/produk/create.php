<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h1>Tambah Barang</h1>

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

    <form action="<?= site_url('produk/create') ?>" method="post">
        <?= csrf_field() ?> <!-- CSRF Protection -->
        <table class="table table-striped">
            <tbody>
                <tr>
                    <td>
                        <label for="nama_produk">Nama Barang:</label>
                        <input type="text" name="nama_produk" id="nama_produk" class="form-control" required>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="harga">Harga:</label>
                        <input type="number" name="harga" id="harga" class="form-control" step="0.01" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="deskripsi">Deskripsi:</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" required></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="kategori_produk">Kategori:</label>
                        <select name="id_kategori" id="kategori_produk" class="form-control" required>
                            <option value="">Pilih Kategori</option>
                            <?php if (!empty($kategori)): ?>
                                <?php foreach ($kategori as $k): ?>
                                    <option value="<?= esc($k['id_kategori']) ?>"><?= esc($k['nama_kategori']) ?></option>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <option value="">Tidak ada kategori tersedia</option>
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