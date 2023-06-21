<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateController extends Controller
{
    //
    function template(){
        return view ('template');
    }
}
