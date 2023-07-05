@extends("layouts.front")
@section("css")
@endsection

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12">
                <x-front.layouts.card>
                    <x-slot name="title">Kargo Sorgu Sonuçları</x-slot>
                    <x-slot name="content">
                        <table style="text-align: center">
                            <tr>
                                <th>Takip Numarası</th>
                                <th>Kargo Durumu</th>
                                <th>Gönderen Kullanıcı Adı</th>
                                <th>Gönderilen Kullanıcı Adı</th>
                                <th>Verici Şube</th>
                                <th>Alıcı Şube</th>
                                <th>Gönderilen İl</th>
                                <th>Gönderilen İlçe</th>
                                <th>Tam Adres</th>
                            </tr>
                            <tr>
                                @foreach($getCheckCargo as $item)
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->kargo_durum}}</td>
                                    <td>{{"@".$item->gonderen_username}}</td>
                                    <td>{{"@".$item->gonderilen_username}}</td>
                                    <td>{{$item->verici_sube}}</td>
                                    <td>{{$item->alici_sube}}</td>
                                    <td>{{$item->gonderilen_il}}</td>
                                    <td>{{$item->gonderilen_ilce}}</td>
                                    <td>{{$item->tam_adres}}</td>
                                @endforeach
                            </tr>
                        </table>

                    </x-slot>
                </x-front.layouts.card>
            </div>
        </div>
    </div>
@endsection

@section("js")
@endsection
