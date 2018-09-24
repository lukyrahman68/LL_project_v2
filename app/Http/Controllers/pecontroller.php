<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pesan;
class pecontroller extends Controller
{
	public function index()
    {
        return view('contact');
    }
    public function store(Request $request){
        try{
            $pesan = new pesan();
            $pesan->nama = $request->get('nama');
            $pesan->email = $request->get('email');
            $pesan->judul = $request->get('subject');
            $pesan->pesan = $request->get('pesan');
            $pesan->sts = 0;
            $pesan->created_at = now();
            $pesan->updated_at = now();
            $pesan->save();

            return redirect('contact')->with('sukses','pesan berhasil ditambahkan');
        }
        catch(\Exception $e){
            $msg=$e->getMessage();
            return redirect('contact')->with('gagal','pesan gagal ditambahkan');
        }
    }
}
