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
                        <h2><b>Yetki: </b>@foreach(auth()->user()->getRoleNames() as $role)
                                {{$role}}
                            @endforeach</h2>
                        <a><b>Sistem Tarihi: </b>{{date('d.m.Y H:i:s')}}</a>
                    </x-slot>

                </x-admin.layouts.card>
            </div>
            <div class="col-6">
                <div id="usersChart" style="margin-top: 90px; margin-bottom: 90px"></div>
            </div>
            <div class="col-6">
                <div id="cargosChart" style="margin-top: 90px; margin-bottom: 90px"></div>
            </div>
        </div>
    </div>
@endsection

@section("js")
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        // Kullanıcı verilerini PHP'den alın
        var userCounts = @json($getUsersData);

        // Ay ve kullanıcı sayıları için dizi oluştur
        var months = [];
        var counts = [];

        userCounts.forEach(function (user) {
            months.push(user.users_month + ". ay");
            counts.push(user.total_user);
        });

        // Grafik ayarlarını yapılandır
        var options = {
            chart: {
                type: 'bar',
                height: 350
            },
            title: {
                text: 'Aylara göre kayıtlı kullancı sayısı',
                align: 'left'
            },
            series: [{
                name: 'Kullanıcı Sayısı',
                data: counts,
                color: '#212529'
            }],
            xaxis: {
                categories: months
            }
        };

        // Grafik nesnesini oluştur
        var chart = new ApexCharts(document.querySelector("#usersChart"), options);

        // Grafik nesnesini render et
        chart.render();
    </script>
    <script>
        // Kullanıcı verilerini PHP'den alın
        var cargoCounts = @json($getCargosData);

        // Ay ve kullanıcı sayıları için dizi oluştur
        var months = [];
        var counts = [];

        cargoCounts.forEach(function (cargo) {
            months.push(cargo.cargo_month + ". ay");
            counts.push(cargo.total_cargo);
        });

        // Grafik ayarlarını yapılandır
        var options = {
            chart: {
                type: 'bar',
                height: 350,
            },
            title: {
                text: 'Aylara göre kargolama sayısı',
                align: 'left'
            },
            series: [{
                name: 'Kullanıcı Sayısı',
                data: counts,
                color: '#212529'
            }],
            xaxis: {
                categories: months
            }
        };

        // Grafik nesnesini oluştur
        var chart = new ApexCharts(document.querySelector("#cargosChart"), options);

        // Grafik nesnesini render et
        chart.render();
    </script>
@endsection
