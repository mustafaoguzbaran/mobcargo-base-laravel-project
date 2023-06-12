@extends("layouts.admin")
@section("css")
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <x-admin.layouts.card>
                    <x-slot name="title">Kargo Ekle</x-slot>
                    <x-slot name="content">
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger">{{$error}}</div>
                            @endforeach
                        @endif
                        <form action="{{route('backoffice.cargooperations.store')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Gönderen Kullanıcı Adı </label>
                                <x-admin.elements.input :name="'gonderen_username'" :placeholder="'gönderen kullanıcı adı...'"
                                                        class="form-control"></x-admin.elements.input>
                                <p>
                                    @if($errors->has("gonderen_username"))
                                        {{$errors->first("gonderen_username")}}
                                    @endif
                                </p>
                                <label class="form-label">Gönderilen Kullanıcı Adı </label>
                                <x-admin.elements.input :name="'gonderilen_username'" :placeholder="'gönderilen kullanıcı adı...'"
                                                        class="form-control"></x-admin.elements.input>
                                <p>
                                    @if($errors->has("gonderilen_username"))
                                        {{$errors->first("gonderilen_username")}}
                                    @endif
                                </p>
                                <label class="form-label">Verici Şube: </label>
                                <select class="form-select" name="verici_sube">
                                    <option value="" selected disabled>Lütfen Verici Şube Seçiniz</option>
                                    <option value="Kağıthane Şube">Kağıthane Şube</option>
                                    <option value="Sultangazi Şube">Sultangazi Şube</option>
                                    <option value="Pazarcık Şube">Pazarcık Şube</option>
                                </select>
                                <p>
                                    @if($errors->has("verici_sube"))
                                        {{$errors->first("verici_sube")}}
                                    @endif
                                </p>
                                <label class="form-label">Alıcı Şube: </label>
                                <select class="form-select" name="alici_sube" aria-label="Default select example">
                                    <option value="" selected disabled>Lütfen Alıcı Şube Seçiniz</option>
                                    <option value="Kağıthane Şube">Kağıthane Şube</option>
                                    <option value="Sultangazi Şube">Sultangazi Şube</option>
                                    <option value="Pazarcık Şube">Pazarcık Şube</option>
                                </select>
                                <p>
                                    @if($errors->has("alici_sube"))
                                        {{$errors->first("alici_sube")}}
                                    @endif
                                </p>
                                <label class="form-label">Gönderilen İl: </label>
                                <select class="form-select" name="gonderilen_il" aria-label="Default select example">
                                    <option value="" selected disabled>Lütfen Gönderilen İl Seçiniz</option>
                                    <option value="İstanbul">İstanbul</option>
                                    <option value="Ankara">Ankara</option>
                                    <option value="Kahramanmaraş">Kahramanmaraş</option>
                                </select>
                                <p>
                                    @if($errors->has("gonderilen_il"))
                                        {{$errors->first("gonderilen_il")}}
                                    @endif
                                </p>
                                <label class="form-label">Gönderilen İlçeyi Yazınız: </label>
                                <x-admin.elements.input :name="'gonderilen_ilce'" :placeholder="'gönderilen ilçe...'"
                                                        class="form-control"></x-admin.elements.input>
                                <p>
                                    @if($errors->has("gonderilen_ilce"))
                                        {{$errors->first("gonderilen_ilce")}}
                                    @endif
                                </p>
                                <label class="form-label">Tam Adresi Giriniz: </label>
                                <x-admin.elements.input :name="'tam_adres'" :placeholder="'tam adresi giriniz...'"
                                                        class="form-control"></x-admin.elements.input>
                                <p>
                                    @if($errors->has("tam_adres"))
                                        {{$errors->first("tam_adres")}}
                                    @endif
                                </p>
                                <x-admin.elements.input :type="'submit'" :name="'cargoCreate'" class="btn btn-warning"
                                                        style="padding: 10px; margin-top: 20px"></x-admin.elements.input>
                            </div>
                        </form>
                    </x-slot>
                </x-admin.layouts.card>

            </div>
            <div class="col-sm-12">
                <x-admin.layouts.card>
                    <x-slot name="title">Kargolar</x-slot>
                    <x-slot name="content">

                        <table style="text-align: center;">
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
                            @foreach($list as $item)
                                <tr style="border-bottom: white 1px solid">

                                    <td>{{$item->id}}</td>
                                    <td>{{$item->kargo_durum}}</td>
                                    <td>{{$item->gonderen_username}}</td>
                                    <td>{{$item->gonderilen_username}}</td>
                                    <td>{{$item->verici_sube}}</td>
                                    <td>{{$item->alici_sube}}</td>
                                    <td>{{$item->gonderilen_il}}</td>
                                    <td>{{$item->gonderilen_ilce}}</td>
                                    <td>{{$item->tam_adres}}</td>
                                    <td>
                                        <form action="{{route("cargoedit", ['id'=>$item->id])}}" method="GET">
                                            @csrf
                                            @method("GET")
                                            <button type="submit" class="btn btn-warning" style="margin-top:5px;">
                                                Düzenle
                                            </button>
                                        </form>
                                        <form action="{{route("backoffice.cargooperations.destroy", ['id'=>$item->id])}}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger"
                                                    style="margin-top:5px; margin-bottom: 5px;">Sil
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        </table>
                    </x-slot>
                </x-admin.layouts.card>
            </div>

        </div>
    </div>
@endsection

@section('js')
@endsection
