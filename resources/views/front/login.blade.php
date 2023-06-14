@extends("layouts.front")
@section("css")

@endsection

@section("content")
    @csrf
    <div class="container">
        <div class="col-12">
            <x-front.layouts.card>
                <x-slot name="title">Sisteme Giriş Yapın</x-slot>
                <x-slot name="content">
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{$error}}</div>
                        @endforeach
                    @endif
                    <form method="POST" action="{{route("login")}}">
                        @csrf
                        @method("POST")
                    <label class="form-label">Kullanıcı Adı</label>
                    <x-front.elements.input :name="'username'" :placeholder="'kullanıcı adınızı girin...'" class="form-control" value="{{old('username')}}"></x-front.elements.input>
                    <label class="form-label">Parola</label>
                    <x-front.elements.input :type="'password'" :name="'password'" :placeholder="'parolanızı girin...'" class="form-control"></x-front.elements.input>
                    <label class="form-label">Beni Hatırla</label>
                        <x-front.elements.input :type="'checkbox'" :value="1" :name="'remember'"></x-front.elements.input>


                    <x-front.elements.input :type="'submit'" :name="'login'" :value="'Giriş Yap'" class="btn btn-warning" style="padding: 10px; margin-top: 20px"></x-front.elements.input>
                    </form>
                </x-slot>
            </x-front.layouts.card>
        </div>
    </div>
@endsection

@section("js")
@endsection

@section("footer")
@endsection
