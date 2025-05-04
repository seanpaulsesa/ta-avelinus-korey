@extends('layouts.app')

@section('additionalHeadScripts')
    <!-- ApexChart JS -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
@endsection

@section('content')

        <!-- main content -->
        <div class="container">
            <div class="page-inner">

                <x-page-header 
                    :pageTitle="$pageTitle" 
                    :pageDescription="$pageDescription" 
                />

                <div class="page-category">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <p class="fs-1">Selamat datang!</p>
                                    <p class="fs-4 text-muted">Sistem Informasi Perhimpunan Mahasiswa Katolik Indonesia Cabang Jayapura. Aplikasi ini hadir untuk memudahkan pengelolaan data anggota dan kegiatan organisasi secara efisien dan terintegrasi.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .row end -->

                    <div class="row">
                        <div class="col-lg-2">
                            <div class="card bg-success">
                                <div class="card-body text-center">
                                    <span class="d-block text-light text-uppercase">Semua Anggota</span>
                                    <div class="display-3 text-white">{{ $anggotaTotal ?? '' }}</div>
                                    <a href="{{ route('admin.anggota') }}" class="text-white"><i class="fas fa-arrow-right"></i> Tampilkan</a>
                                </div>
                            </div>
                        </div>
                        <!-- .col end -->
                        <div class="col-lg-2">
                            <div class="card">
                                <div class="card-body text-center">
                                    <span class="d-block text-muted text-uppercase">Anggota Baru</span>
                                    <div class="display-3 text-primary">{{ $anggotaBaru ?? '' }}</div>
                                    <a href="{{ route('admin.anggota.baru') }}"><i class="fas fa-arrow-right"></i> Tampilkan</a>
                                </div>
                            </div>
                        </div>
                        <!-- .col end -->
                        <div class="col-lg-2">
                            <div class="card">
                                <div class="card-body text-center">
                                    <span class="d-block text-muted text-uppercase">Pindah Masuk</span>
                                    <div class="display-3 text-primary">{{ $anggotaPindahMasuk ?? '' }}</div>
                                    <a href="{{ route('admin.anggota.pindahMasuk') }}"><i class="fas fa-arrow-right"></i> Tampilkan</a>
                                </div>
                            </div>
                        </div>
                        <!-- .col end -->
                        <div class="col-lg-2">
                            <div class="card">
                                <div class="card-body text-center">
                                    <span class="d-block text-muted text-uppercase">Pindah Keluar</span>
                                    <div class="display-3 text-primary">{{ $anggotaPindahKeluar ?? '' }}</div>
                                    <a href="{{ route('admin.anggota.pindahKeluar') }}"><i class="fas fa-arrow-right"></i> Tampilkan</a>
                                </div>
                            </div>
                        </div>
                        <!-- .col end -->
                        <div class="col-lg-2">
                            <div class="card">
                                <div class="card-body text-center">
                                    <span class="d-block text-muted text-uppercase">Alumni</span>
                                    <div class="display-3 text-primary">{{ $anggotaAlumni ?? '' }}</div>
                                    <a href="{{ route('admin.anggota.alumni') }}"><i class="fas fa-arrow-right"></i> Tampilkan</a>
                                </div>
                            </div>
                        </div>
                        <!-- .col end -->
                        <div class="col-lg-2">
                            <div class="card">
                                <div class="card-body text-center">
                                    <span class="d-block text-muted text-uppercase">Draft</span>
                                    <div class="display-3 text-primary">{{ $anggotaDraft ?? '' }}</div>
                                    <a href="{{ route('admin.anggota.draft') }}"><i class="fas fa-arrow-right"></i> Tampilkan</a>
                                </div>
                            </div>
                        </div>
                        <!-- .col end -->
                    </div>
                    <!-- .row end -->

                    <div class="row">
                        <div class="col-lg-2">
                            <div class="card">
                                <div class="card-body text-center">
                                    <span class="d-block text-muted text-uppercase">Kampus</span>
                                    <div class="display-3 text-muted">{{ $totalKampus ?? '' }}</div>
                                    <a href="{{ route('admin.kampus.index') }}" class="text-muted"><i class="fas fa-arrow-right"></i> Tampilkan</a>
                                </div>
                            </div>
                        </div>
                        <!-- .col end -->
                        <div class="col-lg-2">
                            <div class="card">
                                <div class="card-body text-center">
                                    <span class="d-block text-muted text-uppercase">Fakultas</span>
                                    <div class="display-3 text-muted">{{ $totalFakultas ?? '' }}</div>
                                    <a href="{{ route('admin.fakultas.index') }}" class="text-muted"><i class="fas fa-arrow-right"></i> Tampilkan</a>
                                </div>
                            </div>
                        </div>
                        <!-- .col end -->
                        <div class="col-lg-2">
                            <div class="card">
                                <div class="card-body text-center">
                                    <span class="d-block text-muted text-uppercase">Program Studi</span>
                                    <div class="display-3 text-muted">{{ $totalProgramStudi ?? '' }}</div>
                                    <a href="{{ route('admin.programstudi.index') }}" class="text-muted"><i class="fas fa-arrow-right"></i> Tampilkan</a>
                                </div>
                            </div>
                        </div>
                        <!-- .col end -->
                    </div>
                    <!-- .row end -->

                </div>

            </div>
            <!-- end page-inner -->
        </div>
        <!-- end container -->

@stop

@push('scripts')



@endpush
