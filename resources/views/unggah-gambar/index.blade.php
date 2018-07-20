@extends( 'layout.master' )

@section( 'page_title' )
Halaman Unggah Gambar - Optical Mark Recognition
@endsection

@section( 'content' )
<div>
    <form action="{{ route( 'unggah-gambar.store' ) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" name="gambar"><br>
        <button>Simpan Gambar</button>
    </form>
</div>
@endsection