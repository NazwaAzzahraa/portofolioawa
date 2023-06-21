<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    function auth(Request $request)
    {
        $credentials = $request->only('email','password');
        if (Auth::attempt($credentials)){
            return redirect()->intended('template');
        }
        return redirect()->back();
    }
    function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
    function show()
    {
        // $data['nabila'] = Nabila::orderBy('nama','asc')->get();
        $data['users'] = User::Paginate(2);
        // $data['nabila']=Nabila::simplePaginate(3);
        $data['cari'] = "";
        return view('users', $data);
    }
    function add()
    {
        $data = [
            'action' => url('user/create'),
            'tombol' => 'simpan',
            'users' => (object)[
                'name' => '',
                'email' => '',
                'password' => '',
            ]
        ];
        return view('form_user', $data);
    }
    function create(Request $req)
    {
        User::create([
            'name' => $req->nama,
            'email' => $req->email,
            'password' => $req->password
        ]);
        return redirect('user');
    }
    function hapus($id)
    {
        User::where('id', $id)->delete();
        return redirect('user');
    }
    function edit($id)
    {
        $data['user'] = User::find($id);
        $data['action'] = url('user/update') . '/' . $data['user']->id;
        $data['tombol'] = "update";

        return view('form_user', $data);
    }
    function update(Request $req)
    {
        User::where('id', $req->id)->update([
            'name' => $req->nama,
            'email' => $req->email,
            'password' => bcrypt($req->password)
        ]);
        return redirect('user');
    }
    function search(Request $req)
    {
        $data['user'] = User::where('name', 'like', $req->cari . "%")->orWhere('email', 'like', $req->cari . "%")->paginate();
        $data['cari'] = $req->cari;
        return view('user', $data);
    }
}



