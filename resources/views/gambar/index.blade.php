@extends( 'layout.master' )

@section( 'page_title' )
Daftar Gambar Terunggah
@endsection

@section( 'content' )
<div>
    <form action="{{ route( 'bulk-ekstrak.store' ) }}" method="POST">
        {{ csrf_field() }}
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th>#</th>
                    <th>ID Gambar</th>
                    <th>Layout</th>
                    <th>Nama Gambar</th>
                    <th>Tanggal Unggah</th>
                    <th>Status</th>
                    <th>Skor</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach( $list_gambar as $index => $gambar )
                <tr data-gambar-id="{{ $gambar->id }}">
                    <td>
                        <input type="checkbox" name="gambar[]" id="checkbox-gambar-{{ $gambar->id }}" value="{{ $gambar->id }}">
                    </td>
                    <td>{{ $index + 1 }}</td>
                    <td align="center">{{ $gambar->id }}</td>
                    <td>{{ $gambar->metaLik != NULL ? 'LIK Layout ' . $gambar->metaLik->nama : '-' }}</td>
                    <td>{{ $gambar->nama }}</td>
                    <td>{{ date( 'Y-m-d H:i:s', strtotime($gambar->created_at) ) }}</td>
                    <td>{{ $gambar->status === 0 ? 'Belum Dilakukan Penilaian' : 'Sudah Dilakukan Penilaian' }}</td>
                    <td>{{ $gambar->status === 0 ? '-' : $gambar->ekstraksiTerakhir->skor }}</td>
                    <td>
                        <a href="{{ route( 'ekstrak.index', ['gambar' => $gambar] ) }}"><button type="button">ekstrak</button></a>
                        <a href="{{ route( 'gambar.show', ['gambar' => $gambar] ) }}"><button type="button">detail</button></a>
                        <a href="{{ route( 'gambar.destroy', ['gambar' => $gambar] ) }}"><button type="button">delete</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button>Submit</button>
    </form>
</div>
@endsection