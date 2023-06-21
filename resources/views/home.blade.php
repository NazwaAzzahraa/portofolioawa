@extends('template')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY PORTOPILIO</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body{
            font-family: Arial;
            background-color: rgb(105, 130, 141);
            text-align: center;
            
        }
        
    </style>
</head>
<body>
  <form action="{{ url('home') }}" method="post" enctype="multipart/form-data">
    @csrf
    <nav class="navbar navbar-expand-lg navbar-dark shadow fixed-top" style="background-color: rgb(33, 42, 61);">
        <div class="container">
          <a class="navbar-brand" href="#">Nazwa</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link active" href="#profil">Profil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#about">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#portopolio">Portopolio</a>
              </li>
              <li class="nav-item">
                <a href="template" class="nav-link active">keluar</a>
                </li>
            </ul>
          </div>
        </div>
      </nav>
      <!--akhir navbar-->

      <!--home-->
      <section id="profil" class="pt-5">
        <div class="container-fluid p-5 mt-5">
          <div style="background-color: rgb(43, 116, 81) text-center p-5">
          <img src="/storage/{{ $profil->foto }}" alt="" width="200" height="200" class="img-thubnail rounded-circle">
                <h2 class="fw-bold mt-3">{{ $profil->nama}}</h2>
                <p class="fw-bold fs-4 mt-3">{{$profil->ttl}}</p>
                <p class="fw-bold fs-4 mt-3">{{$profil->alamat}}</p>
                <p class="fw-bold fs-4 mt-3">{{$profil->sekolah}}</p>
                
          </div>
        </div>
      </section>
      <!--akhir home-->
      <!--about me-->

      <section id="about" class="pt-5">
        <div class="container">
         <div class="pt-5 text-center">
          <h3 class="fw-bold mb-3">About Me</h3>
          <div class="row justify-content-center">
            <div class="col-md-4">
              <p>{{$profil->about}}</p>
            </div>
          </div>
         </div>
        </div>

      </section>
      <!--akhir about me-->
      <!-- <section id="about" class="pt-5">
        <div class="container">
          <div class="pt-5 text-center">
            <h3 class="fw-bold mb-3">About Me</h3>
              <div class="row justify-content-center">
                <div class="col-md-4">
                  <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas pariatur itaque doloremque voluptas nesciunt non porro fugit nisi fuga quam labore assumenda a ad tenetur, sed laborum expedita sapiente inventore?</p>
                </div>
                <div class="col-md-4">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat totam molestias corporis rerum optio culpa aspernatur inventore officiis incidunt minus tempora excepturi amet aperiam, ut, velit autem fugit dicta tenetur.</p>
                </div>
              </div>
          </div>
        </div> -->
      <!-- </section> -->
      <!--project-->
        <section id="portopolio" class="pt-5">
          <div class="container">
            <div class="p-5 text-bg- text-center" style="background-color: rgb(111, 148, 148);">
              <h3 class="fw-bold mb-3">portopolio</h3>
              <div class="row justify-content-center">
              @foreach ($portopolio as $item)
                <div class="col-md-4 mb-3 text-center">
                  <div class="card mt-5 ms-4" style="width: 18rem;">
                    <img src="/storage/{{$item->foto}}" class=" card-img-top" alt="Project 1">
                    <div class="card-body">
                      <p class="card-text">{{$item->deskripsi}}.</p>
                    </div>
                  </div>
                </div> 
              @endforeach              
        </section>
      <!--akhir project-->
      
      <!--footer-->
      <div class="container-fluid">
        <footer class="py-3 my-3" border-top>
          <p class="text-center">&copy; 2023 <a href="" target="_blank" class="fw-bold text-decoration-none">Kanaya Auliya</a></p>
        </footer>
      </div>
      <!--akhir footer-->
    </form>
</body>
<script src="js/bootstrap.bundle.js"></script>
</html>
@endsection
