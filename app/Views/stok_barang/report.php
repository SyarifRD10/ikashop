<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laporan Stok Barang</title>
    <!-- Bootstrap 4 CSS -->
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <style>
      @media print {
        .no-print {
          display: none;
        }
      }
    </style>
  </head>
  <body onload="window.print()">
    <div class="container mt-4">
      <div class="text-center">
        <h3>Laporan Stok Barang</h3>
        <p>
          Periode:
          <?=esc($start_date)?>
          -
          <?=esc($end_date)?>
        </p>
      </div>

      <table class="table table-bordered mt-4">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Nama Supplier</th>
            <th>Jumlah Masuk</th>
            <th>Jumlah Keluar</th>
            <th>Stok Tersedia</th>
            <th>Tanggal</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($stok_barang)): ?>
          <?php foreach ($stok_barang as $index =>
          $stok): ?>
          <tr>
            <td><?=$index + 1?></td>
            <td><?=esc($stok['nama_produk'])?></td>
            <td>
              Rp <?=number_format($stok['harga'], 0, ',', '.')?>
            </td>
            <td><?=esc($stok['nama_supplier'])?></td>
            <td><?=$stok['jumlah_barang_masuk']?></td>
            <td><?=$stok['jumlah_barang_keluar']?></td>
            <td><?=$stok['stok_tersedia']?></td>
            <td><?=date('d-m-Y', strtotime($stok['tanggal']))?></td>
          </tr>
          <?php endforeach;?>
          <?php else: ?>
          <tr>
            <td colspan="8" class="text-center">Data tidak ditemukan.</td>
          </tr>
          <?php endif;?>
        </tbody>
      </table>

      <button onclick="window.print()" class="btn btn-primary no-print">
        Print Ulang
      </button>
      <a href="/stok_barang/report" class="btn btn-secondary no-print">Kembali</a>
    </div>

    <!-- Bootstrap 4 JS (Optional for interactivity) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
