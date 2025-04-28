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
                                    <h3>Grafik Total Alumni per Tahun</h3>
                                    <div id="alumniPieChart"></div>
                                </div>
                            </div>
                        </div>
                        <!-- .col end -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h3>Tabel Total Anggota Alumni per Tahun</h3>
                                    @include('statistik.include.totalAnggotaBerdasarkanStatusAlumniPerTahun')
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
        const alumniData = @json($alumniPerTahun);

        const labels = alumniData.map(item => item.alumni);
        const series = alumniData.map(item => item.total);

        const options = {
            chart: {
                type: 'pie'
            },
            series: series,
            labels: labels,
        };

        const chart = new ApexCharts(document.querySelector("#alumniPieChart"), options);
        chart.render();
    });
</script>


@endpush
