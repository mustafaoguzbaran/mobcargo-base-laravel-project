@extends("layouts.admin")
@section("css")
@endsection

@section("content")
    <x-admin.layouts.card>
        @foreach($getCargoInfo as $item)
        <x-slot name="title">Takip Numarası {{$item->id}} Olan Kargoyu Düzenle</x-slot>
        <x-slot name="content">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
            @endif
            <form action="{{route('cargos.update', ['id' => $item->id])}}" method="POST">
                @csrf
                @method("PATCH")
                <div class="mb-3">
                    <label class="form-label">Kargo Durum </label>
                    <select class="form-select" name="cargo_status" aria-label="Default select example">
                        <option value="{{$item->kargo_durum}}" selected disabled>{{$item->kargo_durum}}</option>
                        <option value="Verici Şubede">Verici Şubede</option>
                        <option value="Kargo Yola Çıktı">Kargo Yola Çıktı</option>
                        <option value="Alıcı Şubede">Alıcı Şubede</option>
                        <option value="Teslim Edilmek Üzere Yola Çıktı">Teslim Edilmek Üzere Yola Çıktı</option>
                    </select>
                    <label class="form-label">Gönderen Kullanıcı Adı </label>
                    <x-admin.elements.input :name="'posted_by_username'" :value="$item->gonderen_username" :placeholder="'gönderen kullanıcı adı...'" class="form-control" ></x-admin.elements.input>
                    <p>
                        @if($errors->has("posted_by_username"))
                            {{$errors->first("posted_by_username")}}
                        @endif
                    </p>
                    <label class="form-label">Gönderilen Kullanıcı Adı </label>
                    <x-admin.elements.input :name="'sender_by_username'" :value="$item->gonderilen_username" :placeholder="'gönderilen kullanıcı adı...'"
                                            class="form-control"></x-admin.elements.input>
                    <p>
                        @if($errors->has("sender_by_username"))
                            {{$errors->first("sender_by_username")}}
                        @endif
                    </p>
                    <label class="form-label">Verici Şube: </label>
                    <select class="form-select" name="donor_branch">
                        <option value="{{$item->verici_sube}}" selected disabled>{{$item->verici_sube}}</option>
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
                        <option value="{{$item->verici_sube}}" selected disabled>{{$item->alici_sube}}</option>
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
                        <option value="{{$item->gonderilen_il}}" selected disabled>{{$item->gonderilen_il}}</option>
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
                    <x-admin.elements.input :name="'sent_district'" :value="$item->gonderilen_ilce" :placeholder="'gönderilen ilçe...'" class="form-control"></x-admin.elements.input>
                    <p>
                        @if($errors->has("sent_district"))
                            {{$errors->first("sent_district")}}
                        @endif
                    </p>
                    <label class="form-label">Tam Adresi Giriniz: </label>
                    <x-admin.elements.input :name="'full_adress'" :value="$item->tam_adres" :placeholder="'tam adresi giriniz...'" class="form-control"></x-admin.elements.input>
                    <p>
                        @if($errors->has("full_adress"))
                            {{$errors->first("full_adress")}}
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
