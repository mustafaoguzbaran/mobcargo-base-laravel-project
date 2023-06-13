@extends("layouts.admin")
@section("css")
@endsection

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12">
                <x-admin.layouts.card>
                    @foreach($userData as $item)
                    <x-slot name="title">{{$item->username}} Kullanıcısı Düzenle</x-slot>
                            <x-slot name="content">
                                <form method="POST" action="{{route("backoffice.useredit", ['id' => $item->id])}}">
                                    @csrf
                                    @method("PATCH")
                                    <label class="form-label">Yetki Ver</label>
                                    <select class="form-select" name="role" aria-label="Default select example">
                                        @foreach($test as $role)
                                        <option value="{{$role->name}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                    <label class="form-label">İsim Soyisim Değiştir</label>
                                    <x-admin.elements.input :name="'name_edit'" :value="$item->name" :placeholder="'isim yazınız...'" class="form-control"></x-admin.elements.input>
                                    <label class="form-label">Kullanıcı Adı Değiştir</label>
                                    <x-admin.elements.input :name="'username_edit'" :value="$item->username" :placeholder="'kullanıcı adı yazınız...'" class="form-control"></x-admin.elements.input>
                                    <label class="form-label">E-posta Değiştir</label>
                                    <x-admin.elements.input :name="'email_edit'" :value="$item->email" :placeholder="'e-posta adresini yazın...'" class="form-control"></x-admin.elements.input>
                                    <label class="form-label">Telefon Numarası Değiştir</label>
                                    <x-admin.elements.input :name="'phone_edit'" :value="$item->phone_number" :placeholder="'telefon numarası yazın...'" class="form-control"></x-admin.elements.input>
                                    <label class="form-label">Parola Değiştir</label>
                                    <x-admin.elements.input :name="'password_edit'" :placeholder="'yeni parola yazın...'" class="form-control"></x-admin.elements.input>
                                    <x-front.elements.input :type="'submit'" :name="'edit_user'" :value="'Bilgileri Güncelle!'" class="btn btn-warning" style="padding: 10px; margin-top: 20px"></x-front.elements.input>
                                </form>
                            </x-slot>
                    @endforeach
                </x-admin.layouts.card>

            </div>
        </div>
    </div>
@endsection

@section("js")
@endsection
