@extends( 'layout.master' )

@section( 'page_title' )
Halaman Unggah Gambar - Optical Mark Recognition
@endsection

@section( 'content' )
<div>
    <form action="{{ route( 'unggah-gambar.store' ) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" name="gambar[]" multiple><br>

        @foreach( $list_meta_lik as $meta_lik )
        <div>
            <input type="radio" value="{{ $meta_lik->id }}" id="radio-{{ $meta_lik->id }}" name="meta_lik_id">
            <label for="radio-{{ $meta_lik->id }}">LIK Layout {{ $meta_lik->nama }}</label>
        </div>
        @endforeach
        <button>Simpan Gambar</button>
    </form>
</div>
@endsection