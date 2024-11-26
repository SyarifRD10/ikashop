<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h1>Tambah Detail Pembelian</h1>
<form action="/penjualan/store" method="post">
    <div class="form-group">
        <label>Nama Pelanggan:</label>
        <input type="text" name="nama_pelanggan" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Email:</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Telepon:</label>
        <input type="text" name="telepon" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Alamat:</label>
        <textarea name="alamat" class="form-control" required></textarea>
    </div>

    <div class="form-group">
        <label>Pilih Produk:</label><br>
        <?php foreach ($produk as $p): ?>
            <div>
                <input type="checkbox" name="produk[]" value="<?= $p['id_produk']; ?>" class="produk-checkbox my-2" data-produk-id="<?= $p['id_produk']; ?>">
                <?= $p['nama_produk']; ?> - Harga: <?= $p['harga']; ?>
                <div id="kuantitas-<?= $p['id_produk']; ?>" class="kuantitas-field my-2" style="display:none;">
                    <label for="kuantitas">Kuantitas:</label>
                    <input type="number" name="kuantitas[<?= $p['id_produk']; ?>]" class="form-control" min="1" value="1">
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <button type="submit" class="btn btn-success mr-3">Simpan</button>
    <a href="<?= site_url('/penjualan') ?>" class="btn btn-secondary">Kembali</a>
</form>

<script>
    document.querySelectorAll('.produk-checkbox').forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            var produkId = this.getAttribute('data-produk-id');
            var kuantitasField = document.getElementById('kuantitas-' + produkId);

            if (this.checked) {
                kuantitasField.style.display = 'block';
            } else {
                kuantitasField.style.display = 'none';
            }
        });
    });
</script>


<?= $this->endSection() ?>