<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\portopolio;


class PortopolioController extends Controller
{
    //
    function show(){
        // $data['guru'] = Guru::orderBy('nama','asc')->get();
        $data['portopolio']=portopolio::Paginate(2);
        $data['cari'] = "";
        return view('portopolio',$data);
    }
    function add(){
        $data = [
            'action'=> url('portopolio/create'),
            'tombol'=>'simpan',
            'portopolio'=>(object)[
                'nama_portopolio'=>'',
                'kategori'=>'',
                'deskripsi'=>'',

            ]
            ];
        return view('form_portopolio',$data);
    }
    function create(Request $req){
        $validate = $this->validate($req,[
            'nama_portopolio' => 'required|string|max:5',
            'kategori' => 'required|string',
            'deskripsi' => 'string',
            'foto' => 'required|mimes:jpg,png',
        ]);
        $namafile=$req->id.".".$req->file('foto')->getClientOriginalExtension();
        $validate['foto'] = $req->file('foto')->storeAs('foto',$namafile);
        portopolio::create($validate);

        return redirect('portopolio');
    }
    function hapus($id){
        portopolio::where('id',$id)->delete();
        return redirect('portopolio');
    }
    function edit($id){
        $data['portopolio'] = portopolio::find($id);
        $data['action'] = url('portopolio/update').'/'.$data['portopolio']->id;
        $data['tombol'] = "Update";

        return view('form_portopolio',$data);
    }
    // function update(Request $req){
    //     $namafile = $req->id.".".$req->file('foto')->getClientOriginalExtension();
    //     portopolio::where('id',$req->id)->update([
    //         'nama_portopolio' => $req->nama_portopolio,
    //         'kategori' => $req->kategori,
    //         'deskripsi' => $req->deskripsi,
    //         'foto' => $req->file('foto')->storeAs('foto', $namafile),
    //     ]);
    //     return redirect('portopolio');
    // }
    function update(Request $req){
        $data = portopolio::where('id',$req->id)->first();
        if($req->foto == ''){
            $foto = $data->foto;           
        }else{
            $foto = $req->file('foto')->store('foto');
        }
        portopolio::where('id',$req->id)->update([
                   'nama_portopolio' => $req->nama_portopolio,
                 'kategori' => $req->kategori,
                'deskripsi' => $req->deskripsi,
                    'foto' => $foto
               ]);
 

        return redirect('portopolio');
    }


    function search(Request $req){
        $data['portopolio'] = portopolio::where('kategori',$req->cari)->orWhere('nama_portopolio',$req->cari)->paginate();
        $data['cari']=$req->cari;
        return view('portopolio',$data);
    }
}
