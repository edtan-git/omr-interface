@extends( 'layout.master' )

@section( 'content' )
<div>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Gambar</th>
                <th>Tanggal Unggah</th>
                <th>Status</th>
                <th>Skor</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach( $list_gambar as $index => $gambar )
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $gambar->nama }}</td>
                <td>{{ date( 'Y-m-d H:i:s', strtotime($gambar->created_at) ) }}</td>
                <td>{{ $gambar->status === 0 ? 'Belum Dilakukan Penilaian' : 'Sudah Dilakukan Penilaian' }}</td>
                <td>{{ $gambar->status === 0 ? '-' : '-' }}</td>
                <td>
                    <a href="{{ route( 'gambar.show', ['gambar' => $gambar] ) }}"><button>detail</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection