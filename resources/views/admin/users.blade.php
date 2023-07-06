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
                    <div class="col-3">
                        <form action="{{route("backoffice.users")}}" method="GET" class="d-flex">
                            @csrf
                            @method("GET")
                            <input class="form-control me-2" type="search" name="searchUserBackoffice" placeholder="kullanıcı ara..." aria-label="Search">
                            <button class="btn btn-outline-warning" type="submit">Ara</button>
                        </form>
                    </div>
                    <table style="text-align: center;">
                        <tr>
                            <th>Kullanıcı ID</th>
                            <th>Kullanıcının Adı Soyadı</th>
                            <th>Kullanıcı E-postası</th>
                            <th>Kullanıcı Adı</th>
                            <th>Rol</th>
                            <th>Tel. No</th>
                        </tr>
                        @foreach($getUsersList as $item)
                            <tr style="border-bottom: white 1px solid">
                                <td>{{$item->id}}</td>

                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->username}}</td>
                                <td>{{$item->getRoleNames()->implode(', ')}}</td>
                                <td>{{$item->phone_number}}</td>
                                <td>
                                    <form action="{{route('backoffice.user.edit', ['id' => $item->id])}}" method="GET">
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
