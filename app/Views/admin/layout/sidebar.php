<?php helper('MenuHelper'); ?>
<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="/">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= isActive('/'); ?>" href="/" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= isActive(['/supplier', '/penjualan']) ? 'active' : ''; ?>" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-credit-card"></i>Transaksi</a>
                        <div id="submenu-2" class="collapse submenu">
                            <ul class="nav flex-column">
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="pembelian">Pembelian</a>
                                </li> -->
                                <li class="nav-item">
                                    <a class="nav-link" href="/penjualan">Penjualan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/supplier">Supplier</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link <?= isActive(['/kategori', '/produk', '/stok_barang']) ? 'active' : ''; ?>" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fab fa-fw fa-wpforms"></i>Bagian Barang</a>
                        <div id="submenu-3" class="collapse submenu">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="/kategori">Kategori Produk</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/produk">Produk</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/stok_barang">Stok Barang</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= isActive('/stok_barang/report'); ?>" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fas fa-fw fa-table"></i>Laporan</a>
                        <div id="submenu-4" class="collapse submenu">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="/stok_barang/report">Laporan Stok Barang</a>
                                </li>

                            </ul>
                        </div>
                    </li>



                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-9" aria-controls="submenu-9"><i class="fas fa-fw fa-map-marker-alt"></i>Maps</a>
                        <div id="submenu-9" class="collapse submenu">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="map-google.html">Google Maps</a>
                                </li>

                            </ul>
                        </div>
                    </li> -->



        </nav>
    </div>
</div>