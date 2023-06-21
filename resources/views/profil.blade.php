@extends('template')
@section('content')
@if ($errors->any())
<div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>
    <form action="{{ $action }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="container-fluid">
            <div class="col-md-12">
                <form action="">
                    <div class="mb-3">
                        <label for="" class="form-label">Nis</label>
                        <input type="text" name="nis" id="nis" class="form-control" value="{{ $nis }}" placeholder="Masukan Nis">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="{{$nama}}" placeholder="masukan nama">
                    </div>
                    <div class="mb-3">
                        <label for=""  class="form-label">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-select" >
                            <option value="">Jenis Kelamin</option>
                            <option value="L" {{$jk=='L'?'selected':''}}>Laki-Laki</option>
                            <option value="p" {{$jk=='P'?'selected':''}}>Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">TTL</label>
                        <input type="text" name="ttl" id="ttl"  class="form-control" value="{{$ttl}}" placeholder="masukan TTL">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">ALAMAT</label>
                        <input type="text" name="alamat" id="alamat" class="form-control" value="{{$alamat}}" placeholder="masukan alamat">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">SEKOLAH </label>
                        <input type="text" name="sekolah" id="sekolah" class="form-control" value="{{$sekolah}}" placeholder="masukan sekolah">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">FOTO</label>
                        <img src="storage/{{$foto}}" widt="50" height="100" alt="">
                        <input type="file" name="foto" id="foto" class="form-control" value="{{$foto}}" placeholder="masukan poto">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">ABOUT</label>
                        <input type="text" name="about" id="about" class="form-control" value="{{$about}}" placeholder="masukan about">
                    </div>
                    <div class="my-3">

                        <input type="submit" value="simpan" class="btn btn-primary">
                    </div>

                </form>
            </div>
        </div>

    </div>

</body>
</html>
@endsection
