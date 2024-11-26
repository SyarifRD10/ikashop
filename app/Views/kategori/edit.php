<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h1>Ubah Kategori</h1>

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

    <form action="/kategori/update/<?= $kategori['id_kategori'] ?>" method="post">
        <?= csrf_field() ?> <!-- CSRF Protection -->
        <table class="table table-striped">
            <tbody>
                <tr>
                    <td>
                        <label for="nama_kategori">Nama Kategori:</label>
                        <input type="text" name="nama_kategori" id="nama_kategori" value="<?= $kategori['nama_kategori'] ?>" class="form-control" required>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="deskripsi">Deskripsi:</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" required><?= $kategori['deskripsi'] ?></textarea>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="mt-4 mx-2">
            <button type="submit" class="btn btn-success mr-3">Simpan</button>
            <a href="/kategori" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>

<?= $this->endSection() ?>