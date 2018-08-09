<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield( 'page_title' )</title>
</head>
<body>
    <div class="menu">
        <a href="{{ route( 'unggah-gambar.index' ) }}"><button>Unggah Gambar</button></a>
        <a href="{{ route( 'gambar.index' ) }}"><button>Daftar Gambar</button></a>
        <a href="{{ route( 'hasil-penilaian.index' ) }}"><button>Hasil Penilaian</button></a>
    </div>
    <br>
    <div class="content">
        @yield( 'content' )
    </div>

    @yield( 'javascript' )
</body>
</html>