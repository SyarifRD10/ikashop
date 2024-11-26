<?= $this->extends('index') ?>
<?= $this->section('content') ?>

<h1>Tambahkan Stok Barang</h1>
<form action="<?= site_url('stok_barang') ?>" method="post">
    <div class="form-group">
        <label>Nama Barang: </label>
        <input type="text" name="stok_barang">
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="<?= site_url('stok_barang') ?>" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>