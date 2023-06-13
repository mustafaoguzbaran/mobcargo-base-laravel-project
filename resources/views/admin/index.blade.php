@extends("layouts.admin")
@section("css")
@endsection

@section("content")
    <?php
    date_default_timezone_set('Europe/Istanbul')
    ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <x-admin.layouts.card>
                    <x-slot name="title">Hoşgeldin, {{auth()->user()->name}}</x-slot>
                    <x-slot name="content">
                        <h2><b>Yetki: </b>@foreach(auth()->user()->getRoleNames() as $role) {{$role}}@endforeach</h2>
                        <a><b>Sistem Tarihi: </b>{{date('d.m.Y H:i:s')}}</a>
                    </x-slot>

                </x-admin.layouts.card>
             <div id="chart" style="margin-top: 90px; margin-bottom: 90px"></div>
            </div>
        </div>
    </div>
@endsection

@section("js")
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>  var options = {
            series: [{
                name: "Desktops",
                data: [10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
            }],
            chart: {
                height: 350,
                type: 'line',
                zoom: {
                    enabled: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'straight'
            },
            title: {
                text: 'Aylara göre tamamlanan kargolanmalar',
                align: 'left'
            },
            grid: {
                row: {
                    colors: ['transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                },
            },
            xaxis: {
                categories: ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'],
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();</script>
@endsection
