@extends("layouts.front")
@section("css")
@endsection

@section("content")
    @csrf
    <div class="container">
        <div class="col-12">
                    <div class="mb-3">
                        <x-front.layouts.card>
                            <x-slot name="title">Sisteme Kayıt Ol</x-slot>
                            <x-slot name="content">
                                @if($errors->any())
                                    @foreach($errors->all() as $error)
                                        <div class="alert alert-danger">{{$error}}</div>
                                    @endforeach
                                @endif
                                <form action="{{route("register.store")}}" method="POST">
                                    @csrf
                                    @method("POST")
                                <label class="form-label">Adınız Soyadınız</label>
                                <x-front.elements.input :name="'name_register'" :placeholder="'adınız soyadınız...'" class="form-control"></x-front.elements.input>
                                <label class="form-label">E-Posta Adresiniz</label>
                                <x-front.elements.input :type="'email'" :name="'email_register'" :placeholder="'e-postanızı girin...'" class="form-control"></x-front.elements.input>
                                <label class="form-label">Kullanıcı Adınız</label>
                                <x-front.elements.input :name="'username_register'" :placeholder="'kullanıcı adınız...'" class="form-control"></x-front.elements.input>
                                <label class="form-label">Telefon Numaranız</label>
                                <x-front.elements.input :type="'tel'" :name="'phone_register'" :placeholder="'telefon numaranız...'" class="form-control"></x-front.elements.input>
                                <label class="form-label">Parolanız</label>
                                <x-front.elements.input :type="'password'" :name="'password_register'" :placeholder="'parolanız...'" class="form-control"></x-front.elements.input>
                                <x-front.elements.input :type="'submit'" :name="'register'" :value="'Kayıt Ol!'" class="btn btn-warning" style="padding: 10px; margin-top: 20px"></x-front.elements.input>
                            </form>
                            </x-slot>
                        </x-front.layouts.card>
                    </div>
        </div>
    </div>
@endsection

@section("js")
@endsection
