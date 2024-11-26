<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 8px 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .total-row td {
            font-weight: bold;
            background-color: #f2f2f2;
        }

        .text-center {
            text-align: center;
        }

        .page-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .btn-print {
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-print:hover {
            background-color: #0056b3;
        }

        @media print {
            .btn-print {
                display: none;
            }

            body {
                margin: 0;
                padding: 0;
            }

            table {
                width: 100%;
                margin-top: 20px;
                border: 1px solid black;
            }

            th,
            td {
                border: 1px solid black;
                padding: 5px;
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <div class="page-header">
        <h1>Laporan Penjualan</h1>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Tanggal Pembelian</th>
                <th>Nama Produk</th>
                <th>Kuantitas</th>
                <th>Harga Satuan</th>
                <th>Sub Total</th>
                <th>Total Pembelian</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $index = 1;
            foreach ($penjualanGrouped as $penjualan) {
                $totalPembelian = 0; // untuk menghitung total per penjualan
                $rowspan = count($penjualan['details']); // Hitung jumlah detail penjualan

                // Tampilkan baris pertama untuk nama pelanggan, tanggal pembelian, dan total pembelian
                echo "<tr>";
                echo "<td rowspan='" . $rowspan . "' class='text-center'>" . $index++ . "</td>";
                echo "<td rowspan='" . $rowspan . "'>" . $penjualan['penjualan']['nama_pelanggan'] . "</td>";
                echo "<td rowspan='" . $rowspan . "'>" . date('d M Y', strtotime($penjualan['penjualan']['tanggal_penjualan'])) . "</td>";

                // Perulangan untuk setiap detail penjualan
                foreach ($penjualan['details'] as $key => $detail) {
                    if ($key != 0) {
                        echo "<tr>";
                    }

                    // Tampilkan baris detail produk
                    echo "<td>" . $detail['nama_produk'] . "</td>";
                    echo "<td>" . $detail['kuantitas'] . "</td>";
                    echo "<td>Rp " . number_format($detail['harga_satuan'], 0, ',', '.') . "</td>";
                    echo "<td>Rp " . number_format($detail['sub_total'], 0, ',', '.') . "</td>";

                    $totalPembelian += $detail['sub_total'];

                    if ($key == 0) {
                        // Tampilkan total pembelian di baris pertama
                        echo "<td rowspan='" . $rowspan . "' class='text-center'>Rp " . number_format($totalPembelian, 0, ',', '.') . "</td>";
                    }
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>

    <script>
        // Fungsi untuk memicu print preview saat halaman dimuat
        window.onload = function() {
            window.print();
        };
    </script>
</body>

</html>