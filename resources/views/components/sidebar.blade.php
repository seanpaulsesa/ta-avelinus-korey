<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
  <div class="sidebar-logo">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="dark">
      <a href="{{ route('admin.dasbor') }}" class="logo">
        <img src="{!! $siteLogo ?? '' !!}" alt="navbar brand" class="navbar-brand" height="20" />
        <span class="text-light ps-2">{!! $siteTitle ?? 'site title' !!}</span>
      </a>
      <div class="nav-toggle">
        <button class="btn btn-toggle toggle-sidebar">
          <i class="gg-menu-right"></i>
        </button>
        <button class="btn btn-toggle sidenav-toggler">
          <i class="gg-menu-left"></i>
        </button>
      </div>
      <button class="topbar-toggler more">
        <i class="gg-more-vertical-alt"></i>
      </button>
    </div>
    <!-- End Logo Header -->
  </div>
  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <ul class="nav nav-secondary">




        <li class="nav-item active">
          <a data-bs-toggle="collapse" href="#dasbor" class="collapsed" aria-expanded="false">
            <i class="fas fa-home"></i>
            <p>Dasbor</p>
            <span class="caret"></span>
          </a>
          <div class="collapse @if(Request::segment(2) == 'dasbor' || Request::segment(2) == '') show @endif" id="dasbor">
            <ul class="nav nav-collapse">
              <li @if(Request::segment(2) == 'dasbor' || Request::segment(2) == '') class="active" @endif>
                <a href="{{ route('admin.dasbor') }}">
                  <span class="sub-item">Dasbor</span>
                </a>
              </li>
            </ul>
          </div>
        </li>





        <li class="nav-section">
          <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
          </span>
          <h4 class="text-section">Statistik</h4>
        </li>


      

        <!-- Ringkasan Statistik -->
        <li class="nav-item @if(Request::segment(2) == 'statistik') active @endif">
          <a data-bs-toggle="collapse" href="#ringkasan-statistik" class="collapsed" aria-expanded="false">
            <i class="fas fa-chart-bar"></i>
            <p>Ringkasan Statistik</p>
            <span class="caret"></span>
          </a>
          <div class="collapse @if(Request::segment(2) == 'statistik') show @endif" id="ringkasan-statistik">
            <ul class="nav nav-collapse">
              
              <li @if(Request::segment(2) == 'statistik' && Request::segment(3) == 'anggota') class="active" @endif">
                <a href="{{ route('statistik.anggota') }}">
                  <span class="sub-item">Statistik Anggota Berdasarkan Status</span>
                </a>
              </li>
              
              <li @if(Request::segment(2) == 'statistik' && Request::segment(3) == 'alumni') class="active" @endif">
                <a href="{{ route('statistik.alumni') }}">
                  <span class="sub-item">Statistik Alumni</span>
                </a>
              </li>
              
              <li @if(Request::segment(2) == 'statistik' && Request::segment(3) == 'program-studi') class="active" @endif">
                <a href="{{ route('statistik.programstudi') }}">
                  <span class="sub-item">Statistik Program Studi, Fakultas & Universitas</span>
                </a>
              </li>

            </ul>
          </div>
        </li>






        
        <li class="nav-section">
          <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
          </span>
          <h4 class="text-section">Manajemen Data</h4>
        </li>


      

        <!-- anggota -->
        <li class="nav-item submenu @if(Request::segment(2) == 'anggota') active @endif" ">
          <a data-bs-toggle="collapse" href="#anggota" class="collapsed" aria-expanded="false">
            <i class="fas fa-users"></i>
            <p>Anggota</p>
            <span class="caret"></span>
          </a>
          <div class="collapse @if(Request::segment(2) == 'anggota') show @endif" id="anggota">
            <ul class="nav nav-collapse">
              
              <li @if(Request::segment(2) == 'anggota' && Request::segment(3) == '') class="active" @endif>
                <a href="{{ route('admin.anggota') }}">
                  <span class="sub-item">Semua Anggota</span>
                </a>
              </li>

              <li @if(Request::segment(3) == 'baru') class="active" @endif>
                <a href="{{ route('admin.anggota.baru') }}">
                  <span class="sub-item">Anggota Baru</span>
                </a>
              </li>

              <li @if(Request::segment(3) == 'pindahmasuk') class="active" @endif>
                <a href="{{ route('admin.anggota.pindahMasuk') }}">
                  <span class="sub-item">Pindah Masuk</span>
                </a>
              </li>

              <li @if(Request::segment(3) == 'pindahkeluar') class="active" @endif>
                <a href="{{ route('admin.anggota.pindahKeluar') }}">
                  <span class="sub-item">Pindah Keluar</span>
                </a>
              </li>

              <li @if(Request::segment(3) == 'draft') class="active" @endif>
                <a href="{{ route('admin.anggota.draft') }}">
                  <span class="sub-item">Draft</span>
                </a>
              </li>

              <li @if(Request::segment(3) == 'alumni') class="active" @endif>
                <a href="{{ route('admin.anggota.alumni') }}">
                  <span class="sub-item">Alumni</span>
                </a>
              </li>

            </ul>
          </div>
        </li>


      

        <!-- data master -->
        <li class="nav-item @if(Request::segment(2) == 'kampus' || Request::segment(2) == 'fakultas' || Request::segment(2) == 'programstudi') active @endif">
          <a data-bs-toggle="collapse" href="#data-master" class="collapsed" aria-expanded="false">
            <i class="fas fa-box"></i>
            <p>Data Master</p>
            <span class="caret"></span>
          </a>
          <div class="collapse @if(Request::segment(2) == 'kampus' || Request::segment(2) == 'fakultas' || Request::segment(2) == 'programstudi') show @endif" id="data-master">
            <ul class="nav nav-collapse">
              
              <li @if(Request::segment(2) == 'kampus') class="active" @endif>
                <a href="{{ route('admin.kampus.index') }}">
                  <span class="sub-item">Kampus</span>
                </a>
              </li>

              <li @if(Request::segment(2) == 'fakultas') class="active" @endif>
                <a href="{{ route('admin.fakultas.index') }}">
                  <span class="sub-item">Fakultas</span>
                </a>
              </li>

              <li @if(Request::segment(2) == 'programstudi') class="active" @endif>
                <a href="{{ route('admin.programstudi.index') }}">
                  <span class="sub-item">Program Studi</span>
                </a>
              </li>

            </ul>
          </div>
        </li>



           
            
      </ul>
    </div>
  </div>
</div>
<!-- End Sidebar -->