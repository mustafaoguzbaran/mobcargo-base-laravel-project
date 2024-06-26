@php($get_logo = (\App\Models\Settings::query()->value("logo")))

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route("home")}}">{{$get_logo}}<b> : Backoffice</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{Route::is("backoffice") ? "active" : ""}}" aria-current="page"
                       href="{{route("backoffice")}}">Anasayfa</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{Route::is("backoffice.settings") ? "active" : "" }}" href="{{route("backoffice.settings")}}">Genel Ayarlar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Route::is("cargos.index") ? "active" : ""}}" href="{{route("cargos.index")}}">Kargo İşlemleri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Route::is("backoffice.users") ? "active" : "" }}" href="{{route("backoffice.users")}}">Kullanıcılar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Route::is("backoffice.logs") ? "active" : "" }}" href="{{route("backoffice.logs")}}">Hata Logları</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Route::is("backoffice.user.logs") ? "active" : "" }}" href="{{route("backoffice.userlogs")}}">User Logları</a>
                </li>
            </ul>
            @if(isset(auth()->user()->username))
                <div class="text-light" style="margin-right: 10px; "><a style="text-decoration: none" class="text-light" href="#" onclick="event.preventDefault(); document.getElementById('logout').submit()">Çıkış Yap</a></div>
            @else
                {{""}}
            @endif
            <form action="{{route("logout")}}" method="POST" id="logout">@csrf</form>
        </div>
    </div>
</nav>
