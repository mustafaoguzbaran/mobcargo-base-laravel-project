@extends("layouts.front")

@section("css")
@endsection

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12">
                <x-admin.layouts.card>
                    <x-slot name="title">Kullanıcı Bilgilerini Düzenle</x-slot>
                    <x-slot name="content">
                        <form method="POST" action="{{route("user.update", auth()->user()->id)}}">
                            @csrf
                            @method("PATCH")
                            <label class="form-label">İsim Soyisim Değiştir</label>
                            <x-admin.elements.input :name="'name_edit'" :value="auth()->user()->name" :placeholder="'İsminizi Soyisminizi yazınız'" class="form-control"></x-admin.elements.input>
                            <label class="form-label">Kullanıcı Adını Değiştir</label>
                            <x-admin.elements.input :name="'username_edit'" :value="auth()->user()->username" :placeholder="'kullanıcı adınız...'" class="form-control"></x-admin.elements.input>
                            <label class="form-label">E-posta Değiştir</label>
                            <x-admin.elements.input :name="'email_edit'" :value="auth()->user()->email" :placeholder="'e-posta adresinizi yazın...'" class="form-control"></x-admin.elements.input>
                            <label class="form-label">E-posta Değiştir</label>
                            <x-admin.elements.input :name="'phone_edit'" :value="auth()->user()->phone_number" :placeholder="'telefon numaranızı yazın...'" class="form-control"></x-admin.elements.input>
                            <label class="form-label">Parola Değiştir</label>
                            <x-admin.elements.input :type="'password'" :name="'password_edit'" :placeholder="'yeni parolanızı yazın...'" class="form-control"></x-admin.elements.input>
                            <x-front.elements.input :type="'submit'" :name="'edit_user'" :value="'Bilgilerimi Güncelle!'" class="btn btn-warning" style="padding: 10px; margin-top: 20px"></x-front.elements.input>
                        </form>
                    </x-slot>
                </x-admin.layouts.card>
            </div>
        </div>
    </div>
@endsection

@section("js")
@endsection
