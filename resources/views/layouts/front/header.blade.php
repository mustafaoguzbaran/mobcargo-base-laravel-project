<?php
if(isset(auth()->user()->username)){
   $getUsername = " : " . auth()->user()->username;
} else {
    $getUsername = "";
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route("home")}}">MOBCARGO<b>{{$getUsername}}</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{Route::is("home") ? "active" : ""}}" aria-current="page"
                       href="{{route("home")}}">Anasayfa</a>
                </li>
                @if(!Auth::check())
                    <li class="nav-item">
                        <a class="nav-link {{Route::is("login") ? "active" : ""}}" href="{{route("login")}}">Giriş Yap</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Route::is("register") ? "active" : "" }}" href="{{route("register")}}">Kayıt Ol</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link {{Route::is("useredit") ? "active" : "" }}" href="{{route("useredit")}}">Hesap Ayarları</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Route::is("backoffice") ? "active" : "" }}" href="{{route("backoffice")}}">Backoffice</a>
                    </li>
                @endif

            </ul>
            @if(isset(auth()->user()->username))
            <div class="text-light" style="margin-right: 10px; "><a style="text-decoration: none" class="text-light" href="#" onclick="event.preventDefault(); document.getElementById('logout').submit()">Çıkış Yap</a></div>
            @else
                {{""}}
            @endif
            <form action="{{route("logout")}}" method="POST" id="logout">@csrf</form>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Ara" aria-label="Search">
                <button class="btn btn-outline-warning" type="submit">Ara</button>
            </form>
        </div>
    </div>
</nav>