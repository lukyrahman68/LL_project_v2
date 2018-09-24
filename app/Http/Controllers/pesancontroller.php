<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pesan;
use App\Http\Requests;
use Storage;
class pesancontroller extends Controller
{
    public function index()
    {
        $pesan = new pesan;
        $pesan = pesan::all();
        $data = array(
        			'hal' => 'pesan',
                  	'sub' => 'lihat',
              		'pesan' => $pesan);  
        //return view('editpesan', ['pesan' => $pesan],['hal' => 'pesan'],['sub' => 'edit']);
        return view('layouts.pesan')->with($data);
    }
    
    public function show(pesan $pesan)
    {
        //$pesan = new pesan;
        //$pesan = pesan::all();
        $data = array(
        			'hal' => 'pesan',
                  	'sub' => 'lihat',
              		'pesan' => $pesan);  
        //return view('editpesan', ['pesan' => $pesan],['hal' => 'pesan'],['sub' => 'edit']);
        return view('layouts.lihatpesan')->with($data);
    }
    public function destroy(pesan $pesan)
    {
        $pesan->delete();
        return redirect()->route('pesan.index')->with('sukses','pesan berhasil dihapus');;
    }
}
