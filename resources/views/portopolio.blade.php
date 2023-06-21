@extends('template')
@section('content')
<style type="text/css">
    .pagination li{
        float: left;
        list-style-type: none;
        margin: 5px;
    }
</style>
<form action="{{ url('portopolio/search') }}" method="get">
    @csrf
    <input type="search" name="cari" id="cari" value="{{ $cari }}">
    <input type="submit" value="cari">
</form>
<a href="{{ url('portopolio/add') }}">tambah data</a>
<table border="1" class="table table-bordered table-hover">
<tr>
    <th>NO</th>
    <th>nama portopolio</th>
    <th>kategori</th>
    <th>deskripsi</th>
    <th>foto</th>
    <th>aksi</th>
</tr>
@foreach ($portopolio as $key => $item)
    <tr>
        <td>{{ $key+1 }}</td>
        <td>{{ $item->nama_portopolio }}</td>
        <td>{{ $item->kategori }}</td>
        <td>{{ $item->deskripsi }}</td>
        <td>
            <img src="/storage/{{ $item->foto }}" alt="" width="100">
        </td>
        <td><a href="/portopolio/hapus/{{ $item->id }}" onclick="return-window.confirm('hapus data ini')" class="btn btn-success">hapus</a>
        <a href="/portopolio/edit/{{ $item->id }}" onclick="return-window.confirm('edit data ini')" class="btn btn-danger">edit</a></td>
    </tr>
@endforeach
</table>
total siswa: {{ $portopolio->count() }}<br>
total perhalaman:{{ $portopolio->perPage() }}
{{ $portopolio->links() }}

@endsection
