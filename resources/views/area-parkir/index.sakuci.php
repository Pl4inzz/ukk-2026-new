@extends ('layouts.app')

@section ('content')

<h1>Daftar Area Parkir</h1>
<a href="{{ route('area-parkir.create') }}" class="btn btn-primary mb-3 btn-sm" >Tambah Area Parkir</a>
<table class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Area</th>
            <th>Kapasitas</th>
            <th>Terisi</th>
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
            <td>{{ $d->nama_area }}</td>
            <td>{{ $d->kapasitas }}</td>
            <td>{{ $d->terisi }}</td>
            <td>
                <a href="" class="btn btn-sm btn-warning">Edit</a>
                <a href="" class="btn btn-sm btn-danger">Hapus</a>
            </td>
        </tr>
    </tbody>
    @endforeach
</table>

{!! $data->links() !!}

@endsection