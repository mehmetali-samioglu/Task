@extends('panel.master')

@section('content')
    <div class="row">
        <figure class="highcharts-figure">
            <div id="container"></div>
        </figure>
    </div>
    <hr>
    <div class="row">
        <figure class="highcharts-figure">
            <div id="container1"></div>
        </figure>
    </div>
@endsection

@push('extra_script')

    <script>
        Highcharts.chart('container', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: '{{__("general.grafik_1")}}'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [
                    {
                    name: 'Super Admin',
                        y: {{ $superAdmin }}
                    },
                    {
                    name: 'Kullanıcı',
                        y: {{ $user }}
                    }
                ]
            }]
        });

    </script>

    <script>
        const chart = Highcharts.chart('container1', {
            title: {
                text: '{{__("general.grafik_2")}}'
            },
            xAxis: {
                categories: [
                    @foreach ($daily_register as $date)
                        '{{ $date->created_at->format('d m Y') }}',
                    @endforeach
                ]
            },
            series: [{
                type: 'column',
                colorByPoint: true,
                data: [
                    @foreach ($daily_register as $date)
                        {{ $date->sayi }},
                    @endforeach
                ],
                showInLegend: false
            }]
        });
    </script>

@endpush
