<!DOCTYPE html>
<html>

<head>
    <title>LAPORAN</title>

</head>

<body>

    <?php

    include('tampilan/header.php');
    include('tampilan/footer.php');
    include('tampilan/sidebar.php');
    ?>

    <!-- Main Content -->
    <div class="main-content bg-primary">
        <section class="section">
            <div class="section-header">
                <h1>LAPORAN</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item text-primary">Laporan</div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>LAPORAN TRANSAKSI</h4>
                        <div class="card-header-form">
                        </div>
                    </div>
                    <form method="POST" action="ekspor.php" enctype="multipart/form-data">
                        <div>
                            <label>Total Penjualan</label>
                            <input type="text" name="dtotal_penjualan" autofocus="" required="" />
                        </div>
                        <div>
                            <label>Jumlah Transaksi</label>
                            <input type="text" name="jumlah_transaksi" autofocus="" required="" />
                        </div>
                        <div>
                            <label>Jumlah Produk Terjual</label>
                            <input type="text" name="jumlah_produk_terjual autofocus="" required="" />
                        </div>
                        <div>
                            <label>Stok</label>
                            <input type=" date" name="id_stok" required="" />
                        </div>

                        <div>
                            <button type="submit">Ekspor ke Word</button>
                        </div>
        </section>
        </form>
</body>

</html>