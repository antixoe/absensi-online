<!-- sidebar -->
<aside class="sidebar">
    <ul class="sidebar__nav">
        <li class="sidebar__item sidebar__item--header">
            <span class="fa fa-dashboard" style="margin-right: 8px;"></span>Dashboard
        </li>
        <li class="sidebar__item">
            <a href="{{ route('admin') }}">
                <span class="fa fa-home"></span>
                <span>Home</span>
            </a>
        </li>
        <li class="sidebar__item sidebar__item--header mt-3">
            <span class="fa fa-cogs" style="margin-right: 8px;"></span>Manajemen
        </li>
        <li class="sidebar__item">
            <a href="{{ route('tambah.absensi') }}">
                <span class="fa fa-plus"></span>
                <span>Buat Presensi</span>
            </a>
        </li>
        <li class="sidebar__item">
            <a href="{{ route('admin.cek_riwayat') }}">
                <span class="fa fa-history"></span>
                <span>Riwayat Presensi</span>
            </a>
        </li>
        <li class="sidebar__item">
            <a class="sidebar__btn-dropdown" href="#" onclick="return false;">
                <span class="fa fa-user"></span>
                <span>User</span>
                <span class="fa fa-chevron-down" style="margin-left: auto; font-size: 12px;"></span>
            </a>
            <ul class="sidebar__dropdown">
                <li class="sidebar__dropdown-item">
                    <a href="{{route('tambah.user')}}">
                        <span class="fa fa-plus" style="margin-right: 8px; font-size: 12px;"></span>Tambah User
                    </a>
                </li>
                <li class="sidebar__dropdown-item">
                    <a href="{{ route('action.user') }}">
                        <span class="fa fa-sliders" style="margin-right: 8px; font-size: 12px;"></span>Aksi User
                    </a>
                </li>
            </ul>
        </li>
        <li class="sidebar__item sidebar__item--header mt-3">
            <span class="fa fa-sliders" style="margin-right: 8px;"></span>Sistem
        </li>
        <li class="sidebar__item">
            <a href="{{ route('admin.logout') }}">
                <span class="fa fa-sign-out"></span>
                <span>Logout</span>
            </a>
        </li>
    </ul>
</aside>
    </ul>
</aside>
