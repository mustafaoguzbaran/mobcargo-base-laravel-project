@extends("layouts.admin")
@section("css")
@endsection

@section("content")
    <x-admin.layouts.card>
        @foreach($cargoInfo as $item)
        <x-slot name="title">Takip Numarası {{$item->id}} Olan Kargoyu Düzenle</x-slot>
        <x-slot name="content">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
            @endif
            <form action="{{route('cargoedit', ['id' => $item->id])}}" method="POST">
                @csrf
                @method("PATCH")
                <div class="mb-3">
                    <label class="form-label">Kargo Durum </label>
                    <select class="form-select" name="kargo_durum" aria-label="Default select example">
                        <option value="{{$item->kargo_durum}}" selected disabled>{{$item->kargo_durum}}</option>
                        <option value="Verici Şubede">Verici Şubede</option>
                        <option value="Kargo Yola Çıktı">Kargo Yola Çıktı</option>
                        <option value="Alıcı Şubede">Alıcı Şubede</option>
                        <option value="Teslim Edilmek Üzere Yola Çıktı">Teslim Edilmek Üzere Yola Çıktı</option>
                    </select>
                    <label class="form-label">Gönderen Kullanıcı Adı </label>
                    <x-admin.elements.input :name="'gonderen_username'" :value="$item->gonderen_username" :placeholder="'gönderen kullanıcı adı...'" class="form-control" ></x-admin.elements.input>
                    <p>
                        @if($errors->has("gonderen_username"))
                            {{$errors->first("gonderen_username")}}
                        @endif
                    </p>
                    <label class="form-label">Gönderilen Kullanıcı Adı </label>
                    <x-admin.elements.input :name="'gonderilen_username'" :value="$item->gonderilen_username" :placeholder="'gönderilen kullanıcı adı...'"
                                            class="form-control"></x-admin.elements.input>
                    <p>
                        @if($errors->has("gonderilen_username"))
                            {{$errors->first("gonderilen_username")}}
                        @endif
                    </p>
                    <label class="form-label">Verici Şube: </label>
                    <select class="form-select" name="verici_sube">
                        <option value="{{$item->verici_sube}}" selected disabled>{{$item->verici_sube}}</option>
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
                        <option value="{{$item->verici_sube}}" selected disabled>{{$item->alici_sube}}</option>
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
                        <option value="{{$item->gonderilen_il}}" selected disabled>{{$item->gonderilen_il}}</option>
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
                    <x-admin.elements.input :name="'gonderilen_ilce'" :value="$item->gonderilen_ilce" :placeholder="'gönderilen ilçe...'" class="form-control"></x-admin.elements.input>
                    <p>
                        @if($errors->has("gonderilen_ilce"))
                            {{$errors->first("gonderilen_ilce")}}
                        @endif
                    </p>
                    <label class="form-label">Tam Adresi Giriniz: </label>
                    <x-admin.elements.input :name="'tam_adres'" :value="$item->tam_adres" :placeholder="'tam adresi giriniz...'" class="form-control"></x-admin.elements.input>
                    <p>
                        @if($errors->has("tam_adres"))
                            {{$errors->first("tam_adres")}}
                        @endif
                    </p>
                    <x-admin.elements.input :type="'submit'" :value="'Kargoyu Düzenle'" :name="'cargoCreate'" class="btn btn-warning" style="padding: 10px; margin-top: 20px"></x-admin.elements.input>
                </div>
            </form>
        </x-slot>
        @endforeach
    </x-admin.layouts.card>
@endsection

@section("js")
@endsection
