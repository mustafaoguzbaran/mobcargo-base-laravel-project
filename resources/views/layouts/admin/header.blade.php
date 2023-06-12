<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route("home")}}">MOBCARGO<b> : Backoffice</b></a>
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
                    <a class="nav-link {{Route::is("backoffice.cargooperations.show") ? "active" : ""}}" href="{{route("backoffice.cargooperations.show")}}">Kargo İşlemleri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Route::is("backoffice.users") ? "active" : "" }}" href="{{route("backoffice.users")}}">Kullanıcılar</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Ara" aria-label="Search">
                <button class="btn btn-outline-warning" type="submit">Ara</button>
            </form>
        </div>
    </div>
</nav>