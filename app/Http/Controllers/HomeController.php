<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\profil;
use App\Models\portopolio;

class HomeController extends Controller
{
    //

    //   function template(){
    //     return view ('template');
    // }
    function show(){

      $data['profil'] = profil::first();
      $data['portopolio'] = portopolio::all();
      return view('home',$data);
  }
}
