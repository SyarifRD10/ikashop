<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h1>Edit Detail Pesanan</h1>
<form action="<?= site_url('pembelian/update/' . $pembelian['id_pembelian']) ?>" method="post">
    <div class="form-group">
        <label>ID pembelian:</label>
        <input type="number" name="id_pembelian" class="form-control" value="<?= $pembelian['id_pembelian'] ?>" required>
    </div>
    <div class="form-group">
        <label>Nama Supplier:</label>
        <input type="number" name="id_supplier" class="form-control" value="<?= $pembelian['id_supplier'] ?>" required>
    </div>
    <div class="form-group">
        <label>Tanggal Pembelian:</label>
        <input type="number" name="tgl_pembelian" class="form-control" value="<?= $pembelian['tgl_pembelian'] ?>" required>
    </div>
    <div class="form-group">
        <label>ID Produk:</label>
        <input type="number" name="id_produk" class="form-control" value="<?= $pembelian['id_produk'] ?>" required>
    </div>

    <div class="form-group">
        <label>Jumlah:</label>
        <input type="number" name="total_harga" class="form-control" value="<?= $pembelian['total_harga'] ?>" step="0.01" required>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="<?= site_url('pembelian$pembelian') ?>" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>