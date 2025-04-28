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
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h3>Grafik Total Anggota Berdasarkan Status</h3>
                                    <div id="anggotaBarChart"></div>
                                </div>
                            </div>
                        </div>
                        <!-- .col end -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h3>Grafik Anggota Berdasarkan Status</h3>
                                    <div id="anggotaPieChart"></div>
                                </div>
                            </div>
                        </div>
                        <!-- .col end -->
                    </div>
                    <!-- .row end -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h3>Tabel Total Anggota Berdasarkan Status</h3>
                                    @include('statistik.include.totalAnggotaBerdasarkanStatus')
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
    var options = {
        chart: {
            type: 'bar',
            height: 350
        },
        series: [{
            name: 'Jumlah Anggota',
            data: [
                {{ $anggotaTotal ?? 0 }},
                {{ $anggotaBaru ?? 0 }},
                {{ $anggotaPindahMasuk ?? 0 }},
                {{ $anggotaPindahKeluar ?? 0 }},
                {{ $anggotaDraft ?? 0 }},
                {{ $anggotaAlumni ?? 0 }}
            ]
        }],
        xaxis: {
            categories: [
                'Total Anggota',
                'Anggota Baru',
                'Pindah Masuk',
                'Pindah Keluar',
                'Draft',
                'Alumni'
            ]
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '50%',
                endingShape: 'rounded'
            }
        },
        dataLabels: {
            enabled: true
        }
    };

    var chart = new ApexCharts(document.querySelector("#anggotaBarChart"), options);
    chart.render();
</script>


<script>
    var pieOptions = {
        chart: {
            type: 'donut',
            height: 350
        },
        labels: [
            'Anggota Baru',
            'Pindah Masuk',
            'Pindah Keluar',
            'Draft',
            'Alumni'
        ],
        series: [
            {{ $anggotaBaru ?? 0 }},
            {{ $anggotaPindahMasuk ?? 0 }},
            {{ $anggotaPindahKeluar ?? 0 }},
            {{ $anggotaDraft ?? 0 }},
            {{ $anggotaAlumni ?? 0 }}
        ],
        legend: {
            position: 'bottom'
        },
        dataLabels: {
            enabled: true
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 300
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var pieChart = new ApexCharts(document.querySelector("#anggotaPieChart"), pieOptions);
    pieChart.render();
</script>



@endpush
