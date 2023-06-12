@extends("layouts.front")

@section("css")
@endsection

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12">
                <x-front.layouts.card>
                    <x-slot name="title">Arama Sonucu</x-slot>
                    <x-slot name="content">
                        <table style="text-align: center;">
                            <tr>
                                <th>Kullanıcı ID</th>
                                <th>Kullanıcının Adı Soyadı</th>
                                <th>Kullanıcı E-postası</th>
                                <th>Kullanıcı Adı</th>
                                <th>Rol</th>
                                <th>Tel. No</th>
                            </tr>
                            @foreach($searchResult as $item)
                                <tr style="border-bottom: white 1px solid">
                                    <td>{{$item->id}}</td>

                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->username}}</td>
                                    <td>{{$item->auth}}</td>
                                    <td>{{$item->phone_number}}</td>
                                        </form>

                                </tr>
                            @endforeach
                        </table>
                    </x-slot>
                </x-front.layouts.card>
            </div>
        </div>
    </div>
@endsection

@section("js")
@endsection
