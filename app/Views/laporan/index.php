<?=$this->extend('layout')?>
<?=$this->section('content')?>


<h1>Filter Laporan Stok</h1>

<form action="/stok_barang/report" method="post" class="p-3">
<div class="form-group">
        <label for="start_date">Tanggal Awal:</label>
        <input type="date" name="start_date" id="start_date" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="end_date">Tanggal Akhir:</label>
        <input type="date" name="end_date" id="end_date" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary mt-2">Tampilkan Laporan</button>
</form>


<?=$this->endSection()?>