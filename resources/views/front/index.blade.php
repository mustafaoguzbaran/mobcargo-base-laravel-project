@extends("layouts.front")
@section("css")

@endsection

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12">
                <x-front.layouts.card>
                    <x-slot name="title">MOB Cargo Hız ve Memnuniyet Bizim İşimiz!</x-slot>
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
                        <label class="form-label">6 Haneli Takip Numaranız:</label>
                        <x-front.elements.input :name="'checkCargo'" :placeholder="'takip numaranızı giriniz...'" class="form-control"></x-front.elements.input>
                        <x-front.elements.input :type="'submit'" class="btn btn-warning" :value="'Kargo Durumunu Sorgula!'" :name="'check'" style="padding: 10px; margin-top: 20px"></x-front.elements.input>
                        </form>
                    </x-slot>
                </x-front.layouts.card>
            </div>
            <div class="col-12">
                <x-front.layouts.card>
                    <x-slot name="title">MOB CARGO Kimdir?</x-slot>
                    <x-slot name="content">
                        2023 yılında faaliyete giren MOBCARGO, sizlere daha iyi, çevreci ve HIZLI teslimat amacıyla
                        kuruldu. Yönetim kurulu başkanımız Mustafa Oğuz BARAN'ın sizleri çok sevdiğini de belirtmek
                        istiyoruz. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed magna ultricies,
                        vulputate mauris sed, molestie velit. Etiam semper mauris sit amet enim dignissim mattis sit
                        amet sed ipsum.
                    </x-slot>
                </x-front.layouts.card>
            </div>
        </div>
    </div>
@endsection

@section("js")

@endsection
