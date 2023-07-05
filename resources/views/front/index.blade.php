@extends("layouts.front")
@section("css")

@endsection

@section("content")
    @foreach($systemInfos as $item) @endforeach
    <div class="container">
        <div class="row">
            <div class="col-12">
                <x-front.layouts.card>
                    <x-slot name="title">{{$item->main_header}}</x-slot>
                </x-front.layouts.card>
            </div>
            <div class="col-lg-4">
                <x-front.layouts.card>
                    <x-slot name="content">
                        <i class="bi bi-check-square"></i>Muhteşem Hız!
                    </x-slot>
                </x-front.layouts.card>
            </div>
            <div class="col-lg-4">
                <x-front.layouts.card>
                    <x-slot name="content">
                        <i class="bi bi-check-square"></i>Muhteşem Güvenirlik!
                    </x-slot>
                </x-front.layouts.card>
            </div>
            <div class="col-lg-4">
                <x-front.layouts.card>
                    <x-slot name="content">
                        <i class="bi bi-check-square"></i>Minimum Endişe
                    </x-slot>
                </x-front.layouts.card>
            </div>
            <div class="col-12">
                <x-front.layouts.card>
                    <x-slot name="title">Kargo Durumunuzu Sorgulayın</x-slot>
                    <x-slot name="content">
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                {{$error}}
                            @endforeach
                        @endif
                        <form action="{{route("checkCargo")}}" method="POST">
                            @csrf
                            @method("POST")
                        <label class="form-label">Takip Numaranızı Giriniz:</label>
                        <x-front.elements.input :name="'checkCargo'" :placeholder="'takip numaranızı giriniz...'" class="form-control"></x-front.elements.input>
                        <x-front.elements.input :type="'submit'" class="btn btn-warning" :value="'Kargo Durumunu Sorgula!'" :name="'check'" style="padding: 10px; margin-top: 20px"></x-front.elements.input>
                        </form>
                    </x-slot>
                </x-front.layouts.card>
            </div>
            <div class="col-12">
                <x-front.layouts.card>
                    <x-slot name="title">{{$item->main_info_title}}</x-slot>
                    <x-slot name="content">{{$item->main_info_content}}</x-slot>
                </x-front.layouts.card>
            </div>
        </div>
    </div>
@endsection

@section("js")
@endsection
