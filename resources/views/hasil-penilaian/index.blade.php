@extends( 'layout.master' )

@section( 'page_title' )
Hasil Penilaian
@endsection

@section( 'content' )
<div class="filter">
    <form action="{{ route( 'hasil-penilaian.index' ) }}" method="GET">
        <div class="filter-tanggal">
            Tanggal Unggah
            <input type="date" name="tanggal_unggah[]" value="{{ $request->has('tanggal_unggah') ? $request->get('tanggal_unggah')[0] : date( 'Y-m-d' ) }}">
            sd
            <input type="date" name="tanggal_unggah[]" value="{{ $request->has('tanggal_unggah') ? $request->get('tanggal_unggah')[1] : date( 'Y-m-d' ) }}">
        </div>
        <br>
        <div class="filter-layout">
            Layout LIK
            <select name="layout_id" id="">
                <option value="0" {{ $request->layout_id == 0 ? 'selected' : '' }}>-</option>
                @foreach( $list_meta_lik as $meta_lik )
                <option value="{{ $meta_lik->id }}" {{ $request->layout_id == $meta_lik->id ? 'selected' : '' }}>Layout {{ $meta_lik->nama }}</option>
                @endforeach
            </select>
        </div>
        <button>Tampilkan Data</button>
    </form>

    <div>
        <table border="1" cellspacing="0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Layout</th>
                    <th>Nama Gambar</th>
                    <th>Tanggal Unggah</th>
                    <th>Nama</th>
                    <th>Nomor Siswa</th>
                    <th>Tanggal Lahir</th>
                    <th>Paket Soal</th>
                    <th>Pilihan Jawaban</th>
                    <th>Skor</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $list_gambar as $index => $gambar )
                <tr valign="top">
                    <td>{{ $index + 1 }}</td>
                    <td align="center">{{ $gambar->metaLik == NULL ? '' : $gambar->metaLik->nama }}</td>
                    <td>{{ $gambar->nama }}</td>
                    <td>{{ $gambar->created_at }}</td>
                    <td>{{ $gambar->ekstraksiTerakhir->nama == "" ? "" : $gambar->ekstraksiTerakhir->nama }}</td>
                    <td>{{ $gambar->ekstraksiTerakhir->nomor_siswa }}</td>
                    <td>{{ $gambar->ekstraksiTerakhir->tanggal_lahir == '0000-00-00' ? '-' : $gambar->ekstraksiTerakhir->tanggal_lahir }}</td>
                    <td>{{ $gambar->ekstraksiTerakhir->paket_soal }}</td>
                    <td>
                        <table border="1" cellpadding="2" cellspacing="0">
                            <tbody>
                            @foreach( array_chunk($gambar->ekstraksiTerakhir->pilihanJawaban->toArray(), 10) as $i => $section_pilihan_jawaban )
                                <tr>
                                @foreach( $section_pilihan_jawaban as $j => $pilihan_jawaban )
                                    @php
                                        $pilihan_detail_exists = true;
                                        if ( $pilihan_jawaban['detail'] == NULL ) $pilihan_detail_exists = false;
                                    @endphp
                                    <td align="right" >{{ $i*10 + $j + 1 }}.</td>
                                    <td style="{{
                                            $pilihan_detail_exists && $pilihan_jawaban['detail']['status_kebenaran'] == 1 ?
                                                'background-color: green;':
                                                'background-color: red;' }}">
                                        {{
                                            $pilihan_detail_exists ?
                                                $base_alphabets[$pilihan_jawaban['detail']['index_opsi_terpilih']]:
                                                '-'
                                        }}
                                    </td>
                                @endforeach
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </td>
                    <td align="center" style="font-weight: bold; font-size: 30px;">{{ $gambar->ekstraksiTerakhir->skor }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection