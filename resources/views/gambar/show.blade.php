@extends( 'layout.master' )

@section( 'page_title' )
Halaman Detail Gambar - Optical Mark Recognition
@endsection

@section( 'content' )
<div>
    <div class="image" style="float: left; margin-right: 20px;">
        <img src="{{ asset( $direktori_thumb_ljk . '/' . $gambar->nama ) }}" alt="">
    </div>
    <div class="image-info">
        <div>
            <h1>Keterangan Gambar</h1>
        </div>
        <div>Waktu Unggah : {{ date( 'Y-m-d H:i:s', strtotime($gambar->created_at) ) }}</div>
        <div>Nama File : {{ $gambar->nama }}</div>
    </div>
    <div class="">
        @foreach( $list_ekstraksi as $ekstraksi )
        <div>
            <div>
                <b>Waktu Ekstraksi : {{ $ekstraksi->created_at }}<b>
            </div>
            <div>
                
            </div>
        </div>
        @endforeach
    </div>
    <div style="clear: both"></div>
</div>
@endsection