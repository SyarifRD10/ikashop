<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h1>Detail Pembelian</h1>
    <a href="/penjualan" class="btn btn-secondary my-2">Kembali</a>
    <div class="card">
        <h5 class="card-header">Data Pelanggan</h5>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-start align-items-center">
                    <strong>Nama Pelanggan: </strong> <?= $pelanggan['nama_pelanggan'] ?>
                </li>
                <li class="list-group-item d-flex justify-content-start align-items-center">
                    <strong>Email: </strong> <?= $pelanggan['email'] ?>
                </li>
                <li class="list-group-item d-flex justify-content-start align-items-center">
                    <strong>Telepon: </strong> <?= $pelanggan['telepon'] ?>
                </li>
                <li class="list-group-item d-flex justify-content-start align-items-center">
                    <strong>Alamat: </strong> <?= $pelanggan['alamat'] ?>
                </li>
            </ul>
        </div>
    </div>

    <div class="card mt-4">
        <h5 class="card-header">Detail Pembelian</h5>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Produk</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Kuantitas</th>
                            <th scope="col">Harga Satuan</th>
                            <th scope="col">Sub Total</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $totalHarga = 0; ?>
                        <?php foreach ($penjualan as $i => $p): ?>
                            <tr>
                                <td><?= $i + 1 ?></td>
                                <td><?= $p['nama_produk'] ?></td>
                                <td><?= $p['deskripsi'] ?></td>
                                <td><?= $p['kuantitas'] ?></td>
                                <td> <?= number_format($p['harga_satuan'], 0, ',', '.')?> IDR</td>
                                <td> <?= number_format($p['sub_total'], 0, ',', '.')?> IDR</td>
                                <td>
                                    <a href="/detail_penjualan/edit/<?= $p['id_detail']; ?>" class="btn btn-outline-warning">Ubah</a>
                                    <a href="/detail_penjualan/delete/<?= $p['id_detail']; ?>" class="btn btn-outline-danger">Hapus</a>
                                </td>
                            </tr>
                            <?php $totalHarga += $p['sub_total']; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between">
                <h5><strong>Total Pembelian:</strong></h5>
                <h5><strong> <?= number_format($totalHarga, 0, ',', '.') ?> IRD</strong></h5>
            </div>
        </div>
    </div>

    <div class="text-center mt-4">
        <button id="printButton" onclick="showPrintPreview()" class="btn btn-primary">Print Tagihan</button>
    </div>
</div>

<script>
    function showPrintPreview() {
        document.getElementById('printButton').style.display = 'none';

        document.body.style.overflow = 'hidden';

        window.print();

        window.onafterprint = function() {
            document.body.style.overflow = 'auto';
        };

        window.onbeforeprint = function() {
            document.body.style.overflow = 'auto';
        };
    }
</script>

<?= $this->endSection() ?>