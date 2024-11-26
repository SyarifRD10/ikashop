<?= $this->extend('layout') ?>
<?= $this->section('content') ?>


<h1>Daftar Kategori Produk</h1>
<a href="kategori/tambah" class="btn btn-primary mb-3">Tambah Kategori Produk</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama kategori</th>
            <th>Deskripsi Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($kategori as $index => $k): ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><?= $k['nama_kategori'] ?></td>
                <td><?= $k['deskripsi'] ?></td>
                <td>
                    <a href="<?= site_url('kategori/edit/' . $k['id_kategori']); ?>" class="btn btn-warning">Edit</a>
                    <a href="<?= site_url('kategori/delete/' . $k['id_kategori']) ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>