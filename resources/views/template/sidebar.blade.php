<!-- START SIDEBAR-->
<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                <img src="/admin/img/admin-avatar.png" width="45px" />
            </div>
            <div class="admin-info">
                <div class="font-strong">Lentera</div>
                <small>Administrator</small>
                <small>Guru</small>
            </div>
        </div>
        <ul class="side-menu metismenu">
            <li>
                <a class="{{ Request::is('') ? 'active' : '' }}" href="/guru">
                    <i class="sidebar-item-icon fa fa-bar-chart" aria-hidden="true"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li class="heading">MASTER GURU</li>
            <li>
                <a class="{{ Request::is('user') ? 'active' : '' }}" href="/user">
                    <i class="sidebar-item-icon fa fa-male" aria-hidden="true"></i>
                    <span class="nav-label">Data User</span>
                </a>
            </li>
            <li>
                <a class="{{ Request::is('guru') ? 'active' : '' }}" href="/guru">
                    <i class="sidebar-item-icon fa fa-users" aria-hidden="true"></i>
                    <span class="nav-label">Data Guru</span>
                </a>
            </li>
            <li class="heading">MASTER PENILAIAN</li>
            <li>
                <a class="{{ Request::is('periode') ? 'active' : '' }}" href="/periode">
                    <i class="sidebar-item-icon fa fa-calendar" aria-hidden="true"></i>
                    <span class="nav-label">Data Periode</span>
                </a>
            </li>
            <li>
                <a class="{{ Request::is('kriteria') ? 'active' : '' }}" href="/kriteria">
                    <i class="sidebar-item-icon fa fa-book" aria-hidden="true"></i>
                    <span class="nav-label">Data Kriteria</span>
                </a>
            </li>
            <li>
                <a class="{{ Request::is('ketnilai') ? 'active' : '' }}" href="/ketnilai">
                    <i class="sidebar-item-icon fa fa-info" aria-hidden="true"></i>
                    <span class="nav-label">Keterangan Nilai</span>
                </a>
            </li>
            <li class="heading">MENU PENILAIAN</li>
            <li>
                <a class="{{ Request::is('inputnilai') ? 'active' : '' }}" href="/inputnilai">
                    <i class="sidebar-item-icon fa fa-user-plus" aria-hidden="true"></i>
                    <span class="nav-label">Input Nilai Kinerja</span>
                </a>
            </li>
            <li>
                <a class="{{ Request::is('') ? 'active' : '' }}" href="/guru">
                    <i class="sidebar-item-icon fa fa-list" aria-hidden="true"></i>
                    <span class="nav-label">Hasil Penilaian</span>
                </a>
            </li>
            <li>
                <a class="{{ Request::is('') ? 'active' : '' }}" href="/guru">
                    <i class="sidebar-item-icon fa fa-check-square-o" aria-hidden="true"></i>
                    <span class="nav-label">Persetujuan</span>
                </a>
            </li>
            <li class="heading">MENU PENELITIAN</li>
            <li>
                <a class="{{ Request::is('') ? 'active' : '' }}" href="/guru">
                    <i class="sidebar-item-icon fa fa-search" aria-hidden="true"></i>
                    <span class="nav-label">Perhitungan topsis</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
<!-- END SIDEBAR-->