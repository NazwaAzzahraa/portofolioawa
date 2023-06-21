<?php

namespace App\Http\Controllers;

use App\Models\profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    //
    function show(){
        // $data['guru'] = Guru::orderBy('nama','asc')->get();
            $profil = profil::first();
            if ($profil){
                $data =[
                    'nis' => $profil->nis,
                    'nama' => $profil->nama,
                    'jk' => $profil->jk,
                    'ttl' => $profil->ttl,
                    'alamat' => $profil->alamat,
                    'sekolah' => $profil->sekolah,
                    'foto' => $profil->foto,
                    'about' => $profil->about,
                    'action' => '/profil/update/'.$profil->nis
                ];
                return view('profil', $data );
        }else{
            $data = [
                'nis'=>'',
                'nama'=>'',
                'jk'=>'',
                'ttl'=>'',
                'alamat'=>'',
                'sekolah'=>'',
                'foto'=> '',
                'about'=>'',
                'action' => '/profil/create/'
            ];
            return view(' profil', $data);
        }
    }
        // return view('profil',$data);

    function create(Request $req){
        $validate = $this->validate($req,[
            'nis' => 'required|numeric',
            'nama' => 'required|string|max:5',
            'jk' => 'required|string',
            'ttl' => 'string',
            'alamat' => 'required|string|min:5',
            'sekolah' => 'required|string|min:5',
            'foto' => 'required|mimes:jpg,png',
            'about' => 'required|string|min:5',
        ]);
        $namafile=$req->nis.".".$req->file('foto')->getClientOriginalExtension();
        $validate['foto'] = $req->file('foto')->storeAs('foto',$namafile);
        profil::create($validate);

        return redirect('profil');
    }
    function hapus($id){
        profil::where('nis',$id)->delete();
        return redirect('profil');
    }
    function edit($id){
        $data['profil'] = profil::find($id);
        $data['action'] =url('profil/update').'/'.$data['profil']>nis;
        $data['tombol'] ="Update";
        return view('profil',$data);
    }
   
    function update(Request $req){
        $data = profil::where('nis',$req->nis)->first();
        if($req->foto == ''){
            $foto = $data->foto;           
        }else{
            $foto = $req->file('foto')->store('foto');
        }
        profil::where('nis',$req->nis)->update([
                'nis' => $req->nis,
                'nama' => $req->nama,
                'jk' => $req->jk,
                'ttl' => $req->ttl,
                'alamat' => $req->alamat,
                'sekolah' => $req->sekolah,
                'foto' => $foto,
                'about' => $req->about
        ]);
 

        return redirect('profil');
    }
    function search(Request $req){
        $data['profil'] = profil::where('nis',$req->cari)->orWhere('nama',$req->cari)->paginate();
        $data['cari']=$req->cari;
        return view('profil',$data);
    }

}


