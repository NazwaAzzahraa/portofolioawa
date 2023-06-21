<style type="text/css">
    .pagination li{
        float: left;
        list-style-type: none;
        margin: 5px;
    }
</style>
<form action="{{ url('user/search') }}" method="get">
    <input type="search" name="cari" id="cari" value="{{ $cari }}">
    <input type="submit" value="cari">
</form>
<a href="{{ url('user/add') }}">tambah data</a>
<table border="1">
<tr>
    <th>NO</th>
    <th>nama</th>
    <th>email</th>
    <th>password</th>
    <th>aksi</th>
</tr>
@foreach ($user as $key => $item)
    <tr>
        <td>{{ $key+1 }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->email }}</td>
        <td>{{ $item->password }}</td>
        <td><a href="/user/hapus/{{ $item->id }}" onclick="return-window.confirm('hapus data ini')">hapus</a>
        <a href="/user/edit/{{ $item->id }}" onclick="return-window.confirm('edit data ini')">edit</a></td>
    </tr>
@endforeach
</table>
total siswa: {{ $user->count() }}<br>
total perhalaman:{{ $user->perPage() }}
{{ $user->links() }}
