<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="robots" content="noindex, nofollow">
  <title>Laravel log viewer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
  <style>

    h1 {
      font-size: 1.5em;
      margin-top: 0;
    }

    #table-log {
        font-size: 0.85rem;
    }

    .sidebar {
        font-size: 0.85rem;
        line-height: 1;
    }

    .btn {
        font-size: 0.7rem;
    }

    .stack {
      font-size: 0.85em;
    }

    .date {
      min-width: 75px;
    }

    .text {
      word-break: break-all;
    }

    a.llv-active {
      z-index: 2;
      background-color: #f5f5f5;
      border-color: #777;
    }

    .list-group-item {
      word-break: break-word;
    }

    .folder {
      padding-top: 15px;
    }

    .div-scroll {
      height: 80vh;
      overflow: hidden auto;
    }
    .nowrap {
      white-space: nowrap;
    }
    .list-group {
            padding: 5px;
        }




    /**
    * DARK MODE CSS
    */

    body[data-theme="dark"] {
      background-color: #151515;
      color: #cccccc;
    }

    [data-theme="dark"] a {
      color: #4da3ff;
    }

    [data-theme="dark"] a:hover {
      color: #a8d2ff;
    }

    [data-theme="dark"] .list-group-item {
      background-color: #1d1d1d;
      border-color: #444;
    }

    [data-theme="dark"] a.llv-active {
        background-color: #0468d2;
        border-color: rgba(255, 255, 255, 0.125);
        color: #ffffff;
    }

    [data-theme="dark"] a.list-group-item:focus, [data-theme="dark"] a.list-group-item:hover {
      background-color: #273a4e;
      border-color: rgba(255, 255, 255, 0.125);
      color: #ffffff;
    }

    [data-theme="dark"] .table td, [data-theme="dark"] .table th,[data-theme="dark"] .table thead th {
      border-color:#616161;
    }

    [data-theme="dark"] .page-item.disabled .page-link {
      color: #8a8a8a;
      background-color: #151515;
      border-color: #5a5a5a;
    }

    [data-theme="dark"] .page-link {
      background-color: #151515;
      border-color: #5a5a5a;
    }

    [data-theme="dark"] .page-item.active .page-link {
      color: #fff;
      background-color: #0568d2;
      border-color: #007bff;
    }

    [data-theme="dark"] .page-link:hover {
      color: #ffffff;
      background-color: #0051a9;
      border-color: #0568d2;
    }

    [data-theme="dark"] .form-control {
      border: 1px solid #464646;
      background-color: #151515;
      color: #bfbfbf;
    }

    [data-theme="dark"] .form-control:focus {
      color: #bfbfbf;
      background-color: #212121;
      border-color: #4a4a4a;
  }

  </style>

  <script>
    function initTheme() {
      const darkThemeSelected =
        localStorage.getItem('darkSwitch') !== null &&
        localStorage.getItem('darkSwitch') === 'dark';
      darkSwitch.checked = darkThemeSelected;
      darkThemeSelected ? document.body.setAttribute('data-theme', 'dark') :
        document.body.removeAttribute('data-theme');
    }

    function resetTheme() {
      if (darkSwitch.checked) {
        document.body.setAttribute('data-theme', 'dark');
        localStorage.setItem('darkSwitch', 'dark');
      } else {
        document.body.removeAttribute('data-theme');
        localStorage.removeItem('darkSwitch');
      }
    }
  </script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 10px">
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
                    <a class="nav-link {{Route::is("backoffice.settings") ? "active" : "" }}" href="{{route("backoffice.settings")}}">Genel Ayarlar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Route::is("backoffice.cargooperations.show") ? "active" : ""}}" href="{{route("backoffice.cargooperations.show")}}">Kargo İşlemleri</a>
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

<div class="container">
  <div class="row">
    <div class="col sidebar mb-3">
      <h1><i class="fa fa-calendar" aria-hidden="true"></i> Laravel Log Viewer</h1>
      <p class="text-muted"><i>by Rap2h</i></p>

      <div class="custom-control custom-switch" style="padding-bottom:20px;">
        <input type="checkbox" class="custom-control-input" id="darkSwitch">
        <label class="custom-control-label" for="darkSwitch" style="margin-top: 6px;">Dark Mode</label>
      </div>

      <div class="list-group div-scroll">
        @foreach($folders as $folder)
          <div class="list-group-item">
            <?php
            \Rap2hpoutre\LaravelLogViewer\LaravelLogViewer::DirectoryTreeStructure( $storage_path, $structure );
            ?>

          </div>
        @endforeach
        @foreach($files as $file)
          <a href="?l={{ \Illuminate\Support\Facades\Crypt::encrypt($file) }}"
             class="list-group-item @if ($current_file == $file) llv-active @endif">
            {{$file}}
          </a>
        @endforeach
      </div>
    </div>
    <div class="col-10 table-container">
      @if ($logs === null)
        <div>
          Log file >50M, please download it.
        </div>
      @else
        <table id="table-log" class="table table-striped" data-ordering-index="{{ $standardFormat ? 2 : 0 }}">
          <thead>
          <tr>
            @if ($standardFormat)
              <th>Level</th>
              <th>Context</th>
              <th>Date</th>
            @else
              <th>Line number</th>
            @endif
            <th>Content</th>
          </tr>
          </thead>
          <tbody>

          @foreach($logs as $key => $log)
            <tr data-display="stack{{{$key}}}">
              @if ($standardFormat)
                <td class="nowrap text-{{{$log['level_class']}}}">
                  <span class="fa fa-{{{$log['level_img']}}}" aria-hidden="true"></span>&nbsp;&nbsp;{{$log['level']}}
                </td>
                <td class="text">{{$log['context']}}</td>
              @endif
              <td class="date">{{{$log['date']}}}</td>
              <td class="text">
                @if ($log['stack'])
                  <button type="button"
                          class="float-right expand btn btn-outline-dark btn-sm mb-2 ml-2"
                          data-display="stack{{{$key}}}">
                    <span class="fa fa-search"></span>
                  </button>
                @endif
                {{{$log['text']}}}
                @if (isset($log['in_file']))
                  <br/>{{{$log['in_file']}}}
                @endif
                @if ($log['stack'])
                  <div class="stack" id="stack{{{$key}}}"
                       style="display: none; white-space: pre-wrap;">{{{ trim($log['stack']) }}}
                  </div>
                @endif
              </td>
            </tr>
          @endforeach

          </tbody>
        </table>
      @endif
      <div class="p-3">
        @if($current_file)
          <a href="?dl={{ \Illuminate\Support\Facades\Crypt::encrypt($current_file) }}{{ ($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : '' }}">
            <span class="fa fa-download"></span> Download file
          </a>
          -
          <a id="clean-log" href="?clean={{ \Illuminate\Support\Facades\Crypt::encrypt($current_file) }}{{ ($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : '' }}">
            <span class="fa fa-sync"></span> Clean file
          </a>
          -
          <a id="delete-log" href="?del={{ \Illuminate\Support\Facades\Crypt::encrypt($current_file) }}{{ ($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : '' }}">
            <span class="fa fa-trash"></span> Delete file
          </a>
          @if(count($files) > 1)
            -
            <a id="delete-all-log" href="?delall=true{{ ($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : '' }}">
              <span class="fa fa-trash-alt"></span> Delete all files
            </a>
          @endif
        @endif
      </div>
    </div>
  </div>
</div>
<!-- jQuery for Bootstrap -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<!-- FontAwesome -->
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<!-- Datatables -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

<script>

  // dark mode by https://github.com/coliff/dark-mode-switch
  const darkSwitch = document.getElementById('darkSwitch');

  // this is here so we can get the body dark mode before the page displays
  // otherwise the page will be white for a second...
  initTheme();

  window.addEventListener('load', () => {
    if (darkSwitch) {
      initTheme();
      darkSwitch.addEventListener('change', () => {
        resetTheme();
      });
    }
  });

  // end darkmode js

  $(document).ready(function () {
    $('.table-container tr').on('click', function () {
      $('#' + $(this).data('display')).toggle();
    });
    $('#table-log').DataTable({
      "order": [$('#table-log').data('orderingIndex'), 'desc'],
      "stateSave": true,
      "stateSaveCallback": function (settings, data) {
        window.localStorage.setItem("datatable", JSON.stringify(data));
      },
      "stateLoadCallback": function (settings) {
        var data = JSON.parse(window.localStorage.getItem("datatable"));
        if (data) data.start = 0;
        return data;
      }
    });
    $('#delete-log, #clean-log, #delete-all-log').click(function () {
      return confirm('Are you sure?');
    });
  });
</script>
</body>
</html>
