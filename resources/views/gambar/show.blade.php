@extends( 'layout.master' )

@section( 'page_title' )
Halaman Detail Gambar - Optical Mark Recognition
@endsection

@section( 'content' )
<div>
    <div class="image" style="float: left; margin-right: 20px;">
        <img src="{{ asset( $direktori_thumb_ljk . '/' . $gambar->nama ) }}" alt="">
    </div>
    <div class="image-info" style="float: left;">
        <div>
            <h1>Keterangan Gambar</h1>
        </div>
        <div>Waktu Unggah : {{ date( 'Y-m-d H:i:s', strtotime($gambar->created_at) ) }}</div>
        <div>Nama File : {{ $gambar->nama }}</div>

        <hr>
        <div class="">
            @foreach( $list_ekstraksi as $ekstraksi )
            <div>
                <div>
                    <span></span> <b>Waktu Ekstraksi : {{ $ekstraksi->created_at }} - {{ $ekstraksi->finished_at }} ({{ $ekstraksi->id }})</b>
                </div>
                <div>
                    <div>
                        <span>Nama</span>:<span>{{ $ekstraksi->nama }}</span><br>
                        <span>Nomor Siswa</span>:<span>{{ $ekstraksi->nomor_siswa }}</span><br>
                        <span>Tanggal Lahir</span>:<span>{{ $ekstraksi->tanggal_lahir }}</span><br>
                        <span>Paket Soal</span>:<span>{{ $ekstraksi->paket_soal }}</span><br>
                        <span>Skor</span>:<span>{{ $ekstraksi->skor }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div style="clear: both"></div>
</div>
@endsection