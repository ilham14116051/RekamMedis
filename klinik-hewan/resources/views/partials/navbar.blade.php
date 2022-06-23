<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">

            <li><a><i class="fa fa-home"></i> Beranda <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ url('dashboard') }}">Dashboard</a></li>
                </ul>
            </li>


                        @if (Auth::check())

                            @if (Auth::user()->role == 'resepsionis')
                                <li><a><i class="fa fa-github-alt"></i> Pasien <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ url('pasiens') }}">Daftar Pasien</a></li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-medkit"></i> SMS gateway <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="#">Daftar SMS Gateway</a></li>
                                    </ul>
                                </li>


                            @endif


                        @endif

                        @if (Auth::check())

                            @if (Auth::user()->role == 'dokter')
                                <li><a><i class="fa fa-shopping-cart"></i> Manajemen Obat <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ url('kategori_products') }}">Kategori</a></li>
                                        <li><a href="{{ url('kelas_products') }}">Kelas</a></li>
                                        <li><a href="{{ url('products') }}">Master Obat</a></li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-calendar"></i> Jadwal <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ route('event.index') }}">Jadwal kontrol</a></li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-medkit"></i> Rekam Medis <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ url('rekam_medis') }}">Daftar Rekam Medis</a></li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-edit"></i> Transaksi <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ url('transactions') }}">Daftar Transaksi</a></li>
                                    </ul>
                                </li>

                            @endif

                         @endif

        </ul>
    </div>

                        @if (Auth::check())

                        @if (Auth::user()->role == 'admin')
                        <div class="menu_section">
                            <h3>Setting</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-bug"></i> Users <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ url('users') }}">User</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                        @endif

                        @endif

</div>
