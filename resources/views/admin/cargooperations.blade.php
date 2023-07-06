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
                        <form action="{{route('cargos.store')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Gönderen Kullanıcı Adı </label>
                                <x-admin.elements.input :name="'posted_by_username'" :placeholder="'gönderen kullanıcı adı...'" class="form-control"></x-admin.elements.input>
                                <p>
                                    @if($errors->has("posted_by_username"))
                                        {{$errors->first("posted_by_username")}}
                                    @endif
                                </p>
                                <label class="form-label">Gönderilen Kullanıcı Adı </label>
                                <x-admin.elements.input :name="'sender_by_username'" :placeholder="'gönderilen kullanıcı adı...'" class="form-control"></x-admin.elements.input>
                                <p>
                                    @if($errors->has("sender_by_username"))
                                        {{$errors->first("sender_by_username")}}
                                    @endif
                                </p>
                                <label class="form-label">Verici Şube: </label>
                                <select class="form-select" name="donor_branch">
                                    <option value="" selected disabled>Lütfen Verici Şube Seçiniz</option>
                                    <option value="Kağıthane Şube">Kağıthane Şube</option>
                                    <option value="Sultangazi Şube">Sultangazi Şube</option>
                                    <option value="Pazarcık Şube">Pazarcık Şube</option>
                                </select>
                                <p>
                                    @if($errors->has("donor_branch"))
                                        {{$errors->first("donor_branch")}}
                                    @endif
                                </p>
                                <label class="form-label">Alıcı Şube: </label>
                                <select class="form-select" name="receiving_branch" aria-label="Default select example">
                                    <option value="" selected disabled>Lütfen Alıcı Şube Seçiniz</option>
                                    <option value="Kağıthane Şube">Kağıthane Şube</option>
                                    <option value="Sultangazi Şube">Sultangazi Şube</option>
                                    <option value="Pazarcık Şube">Pazarcık Şube</option>
                                </select>
                                <p>
                                    @if($errors->has("receiving_branch"))
                                        {{$errors->first("receiving_branch")}}
                                    @endif
                                </p>
                                <label class="form-label">Gönderilen İl: </label>
                                <select class="form-select" name="sent_province" aria-label="Default select example">
                                    <option value="" selected disabled>Lütfen Gönderilen İl Seçiniz</option>
                                    <option value="İstanbul">İstanbul</option>
                                    <option value="Ankara">Ankara</option>
                                    <option value="Kahramanmaraş">Kahramanmaraş</option>
                                </select>
                                <p>
                                    @if($errors->has("sent_province"))
                                        {{$errors->first("sent_province")}}
                                    @endif
                                </p>
                                <label class="form-label">Gönderilen İlçeyi Yazınız: </label>
                                <x-admin.elements.input :name="'sent_district'" :placeholder="'gönderilen ilçe...'" class="form-control"></x-admin.elements.input>
                                <p>
                                    @if($errors->has("sent_district"))
                                        {{$errors->first("sent_district")}}
                                    @endif
                                </p>
                                <label class="form-label">Tam Adresi Giriniz: </label>
                                <x-admin.elements.input :name="'full_address'" :placeholder="'tam adresi giriniz...'" class="form-control"></x-admin.elements.input>
                                <p>
                                    @if($errors->has("full_address"))
                                        {{$errors->first("full_address")}}
                                    @endif
                                </p>
                                <x-admin.elements.input :type="'submit'" :name="'cargoCreate'" class="btn btn-warning" style="padding: 10px; margin-top: 20px"></x-admin.elements.input>
                            </div>
                        </form>
                    </x-slot>
                </x-admin.layouts.card>
            </div>
            <div class="col-sm-12">
                <x-admin.layouts.card>
                    <x-slot name="title">Kargolar</x-slot>
                    <x-slot name="content">
                        <div class="col-3">
                            <form action="{{route("cargos.index")}}" method="GET" class="d-flex">
                                @csrf
                                @method("GET")
                                <input class="form-control me-2" type="search" name="cargoOperationsSearch" placeholder="kargo ara..." aria-label="Search">
                                <button class="btn btn-outline-warning" type="submit">Ara</button>
                            </form>
                        </div>
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
                            @foreach($getCargoList as $item)
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
                                        <form action="{{route("cargos.edit", ['id'=>$item->id])}}" method="GET">
                                            @csrf
                                            @method("GET")
                                            <button type="submit" class="btn btn-warning" style="margin-top:5px;">
                                                Düzenle
                                            </button>
                                        </form>
                                        <form
                                            action="{{route("cargos.destroy", ['id'=>$item->id])}}"
                                            method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger" style="margin-top:5px; margin-bottom: 5px;">Sil
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
