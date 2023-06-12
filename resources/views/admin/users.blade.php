@extends("layouts.admin")
@section("css")
@endsection

@section("content")
<div class="container">
    <div class="row">
        <div class="col-12">
            <x-admin.layouts.card>
                <x-slot name="title">Kullanıcılar</x-slot>
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
                        @foreach($usersList as $item)
                            <tr style="border-bottom: white 1px solid">
                                <td>{{$item->id}}</td>

                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->username}}</td>
                                <td>{{$item->auth}}</td>
                                <td>{{$item->phone_number}}</td>
                                <td>
                                    <form action="{{route('backoffice.useredit', ['id' => $item->id])}}" method="GET">
                                        @csrf
                                        @method("GET")
                                    <button type="submit" class="btn btn-danger" style="margin-left: 30px">Kullanıcıyı Düzenle</button>
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

@section("js")
@endsection