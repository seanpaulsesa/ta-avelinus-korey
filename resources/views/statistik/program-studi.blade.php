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
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h3>Jumlah Anggota per Program Studi</h3>
                                    <div id="anggotaPieChart" class="mb-4"></div>
                                </div>
                            </div>
                        </div>
                        <!-- .col end -->
                        <div class="col-8">
                            <div class="card">
                                <div class="card-body">
                                    <h3>Tabel Total Anggota Berdasarkan Program Studi Pada Fakultas dan Universitas</h3>
                                    @include('statistik.include.totalAnggotaBerdasarkanProgramStudi')
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

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const anggotaData = @json($anggotaKampus);

        const labels = anggotaData.map(item => item.programstudi?.nama_program_studi ?? 'Tidak Diketahui');
        const series = anggotaData.map(item => item.total);

        const options = {
            chart: {
                type: 'pie'
            },
            series: series,
            labels: labels,
            legend: {
                position: 'bottom'
            }
        };

        const chart = new ApexCharts(document.querySelector("#anggotaPieChart"), options);
        chart.render();
    });
</script>



@endpush
