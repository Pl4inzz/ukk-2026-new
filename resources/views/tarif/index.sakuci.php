@extends ('layouts.app')

@section ('content')

<h1>Daftar Tarif</h1>
<a href="{{ route('tarif.create') }}" class="btn btn-primary mb-3 btn-sm" >Tambah Daftar Tarif</a>
<table class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Jenis Kendaraan</th>
            <th>Tarif Per Jam</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php
        $no = 1;
        @endphp
        @foreach($data as $d)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $d->jenis_kendaraan }}</td>
            <td>Rp {{ number_format($d->tarif_per_jam, 0, ',', '.') }}</td>
            <td>
                <a href="{{ route('tarif.edit', ['id_tarif' => $d->id_tarif]) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('tarif.destroy', ['id' => $d->id_tarif]) }}" method="POST" class="d-inline" onsubmit="return confirm('apakah benar akan dihapus?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                </form> 
            </td>
        </tr>
    </tbody>
    @endforeach
</table>

{!! $data->links() !!}

@endsection