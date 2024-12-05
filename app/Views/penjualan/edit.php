<?= $this->extend('layout') ?>
<?=$this->section('content')?>

<h1>Edit Detail Penjualan</h1>
<form action="<?= site_url('/detail_penjualan/update/' . $detail['id_detail']) ?>" method="post">
    <?= csrf_field() ?>

    <input name="id_penjualan" value="<?= $detail['id_penjualan']; ?>" hidden>

    <!-- Nama Produk -->
    <div class="form-group">
        <label for="id_produk">Nama Produk:</label>
        <select name="id_produk" id="id_produk" class="form-control" required>
            <option value="">Pilih Produk</option>
            <?php foreach ($produk as $p): ?>
                <option value="<?= $p['id_produk'] ?>"
                    <?= $detail['id_produk'] == $p['id_produk'] ? 'selected' : '' ?>>
                    <?= esc($p['nama_produk']) ?> - <?= number_format($p['harga'],0, ',', '.') ?> IDR</option>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- Quantity -->
    <div class="form-group">
        <label for="kuantitas">Quantity:</label>
        <input type="number" name="kuantitas" id="kuantitas" class="form-control" 
               value="<?= $detail['kuantitas'] ?>" min="1" required>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="<?= site_url('penjualan') ?>" class="btn btn-secondary">Kembali</a>
</form>

<?=$this->endSection()?>
