<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Layout</th>
            <th>Nama Gambar</th>
            <th>Tanggal Unggah</th>
            <th>Nama</th>
            <th>Nomor siswa</th>
            <th>Tanggal lahir</th>
            <th>Paket Soal</th>
            <th>Skor</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $list_gambar as $index => $gambar )
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $gambar->metaLik->nama }}</td>
            <td>{{ $gambar->nama }}</td>
            <td>{{ $gambar->created_at }}</td>
            <td>{{ $gambar->ekstraksiTerakhir->nama }}</td>
            <td>{{ $gambar->ekstraksiTerakhir->nomor_siswa }}</td>
            <td>{{ $gambar->ekstraksiTerakhir->tanggal_lahir }}</td>
            <td>{{ $gambar->ekstraksiTerakhir->paket_soal }}</td>
            <td>{{ $gambar->ekstraksiTerakhir->skor }}</td>
        </tr>
        @endforeach
    </tbody>
</table>