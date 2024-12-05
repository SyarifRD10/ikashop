<?=$this->extend('layout')?>
<?=$this->section('content')?>

<?php if (!empty($produk)): ?>
<h1>Edit Stok</h1>
<?php endif;?>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?=session()->getFlashdata('success')?>
    </div>
<?php endif;?>

<form action="/stok_barang/update/<?=esc($stok['id_stok'])?>" method="post"> <!-- Action untuk update stok -->
    <?=csrf_field()?> <!-- CSRF protection -->

    <input type="text" name="id_produk" value="<?=esc($stok['id_produk']);?>" hidden>
    <div class="form-group">
        <label for="id_supplier">Supplier:</label>
        <select name="id_supplier" id="id_supplier" class="form-control">
            <option value="">Pilih Supplier</option>
            <?php if (!empty($supplier)): ?>
                <?php foreach ($supplier as $k): ?>
                    <option value="<?=esc($k['id_supplier'])?>"
                        <?=($stok['id_supplier'] == $k['id_supplier']) ? 'selected' : ''?>>
                        <?=esc($k['nama_supplier'])?>
                    </option>
                <?php endforeach;?>
            <?php else: ?>
                <option value="">Tidak ada supplier tersedia</option>
            <?php endif;?>
        </select>
    </div>

    <div class="form-group">
        <label for="jumlah_barang_masuk">Barang Masuk:</label>
        <input type="text" name="jumlah_barang_masuk" id="jumlah_barang_masuk" class="form-control" step="0.01"
               value="<?=esc($stok['jumlah_barang_masuk'])?>">
    </div>

    <div class="form-group">
        <label for="jumlah_barang_keluar">Barang Keluar:</label>
        <input type="text" name="jumlah_barang_keluar" id="jumlah_barang_keluar" class="form-control" step="0.01"
               value="<?=esc($stok['jumlah_barang_keluar'])?>">
    </div>

    <div class="row">
        <div class="col text-left">
            <a href="/produk" class="btn btn-outline-warning">Back</a>
        </div>
        <div class="col text-right">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>

<?=$this->endSection()?>
