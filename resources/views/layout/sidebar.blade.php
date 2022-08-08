@if (Auth::user()->level == 'admin')
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header">NAVIGATION</li>
            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                        <i class="right fas fa-angle-righ"></i>
                    </p>
                </a>
            </li>
            <li class="nav-header">PRODUK</li>
            <li class="nav-item">
                <a href="{{ url('produk') }}" class="nav-link">
                    <i class="nav-icon fas fa-store"></i>
                    <p>
                        Produk
                        <i class="right fas fa-angle-righ"></i>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('penjualan') }}" class="nav-link">
                    <i class="nav-icon fas fa-clipboard"></i>
                    <p>
                        Pemesanan
                        <i class="right fas fa-angle-righ"></i>
                    </p>
                </a>
            </li>

            <li class="nav-header">TRANSAKSI</li>
            <li class="nav-item">
                <a href="{{ url('transaksi') }}" class="nav-link">
                    <i class="nav-icon fas fa-file-invoice-dollar"></i>
                    <p>
                        Pembayaran
                        <i class="right fas fa-angle-righ"></i>
                    </p>
                </a>
            </li>
            <li class="nav-header">ACCOUNT</li>
            <li class="nav-item">
                <a href="{{ url('users') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Users
                        <i class="right fas fa-angle-righ"></i>
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
@else
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header">NAVIGATION</li>
            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                        <i class="right fas fa-angle-righ"></i>
                    </p>
                </a>
            </li>
            <li class="nav-header">PRODUK</li>
            <li class="nav-item">
                <a href="{{ url('produk') }}" class="nav-link">
                    <i class="nav-icon fas fa-store"></i>
                    <p>
                        Belanja
                        <i class="right fas fa-angle-righ"></i>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('pesanan.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-clipboard"></i>
                    <p>
                        Pesanan
                        <i class="right fas fa-angle-righ"></i>
                    </p>
                </a>
            </li>

            <li class="nav-header">TRANSAKSI</li>
            <li class="nav-item">
                <a href="{{ route('pembayaran.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-file-invoice-dollar"></i>
                    <p>
                        Pembayaran
                        <i class="right fas fa-angle-righ"></i>
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
@endif
