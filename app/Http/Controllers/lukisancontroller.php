<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lukisan;
use App\Http\Requests;
use Storage;

class lukisancontroller extends Controller
{
	public function index()
    {
        $lukisan = new lukisan;
        $lukisan = lukisan::all();
        $data = array(
        			'hal' => 'lukisan',
                  	'sub' => 'edit',
              		'lukisan' => $lukisan);
        return view('layouts.editlukisan')->with($data);
    }
    public function store(Request $request){
        $image = $request->file('gambar');
        $namaImg = $image->getClientOriginalName();
        $ext = $image->guessClientExtension();
        $img = md5($namaImg).'.'.$ext;
    	try{
            $image = $request->file('gambar');
            $namaImg = $image->getClientOriginalName();
    		$lukisan = new lukisan();
	    	$lukisan->nama = $request->get('judul');
	    	$lukisan->deskripsi = $request->get('deskripsi');
            $lukisan->sts = "1";
            $lukisan->img = $img;
	    	$lukisan->created_at = now();
	    	$lukisan->updated_at = now();
	    	$lukisan->save();

	        $image->move(public_path('uploads'),$img);

			return redirect('/admin/tambah')->with('sukses','Lukisan berhasil ditambahkan');
    	}
    	catch(\Exception $e){
    		$msg=$e->getMessage();
    		return redirect('/admin/tambah')->with('gagal','Lukisan gagal ditambahkan');
    	}
    }
    public function show(lukisan $lukisan)
    {
        $data = array(
        			'hal' => 'lukisan',
                  	'sub' => 'edit',
              		'lukisan' => $lukisan);
        return view('layouts.lihat')->with($data);
    }

    public function edit(lukisan $lukisan)
    {
    	$data = array(
        			'hal' => 'lukisan',
                  	'sub' => 'edit',
              		'lukisan' => $lukisan);
        return view('layouts.halamaneditlukisan')->with($data);;
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

  		$lukisan = lukisan::find($id);
        $lukisan->nama = $request->get('nama');
        $lukisan->deskripsi = $request->get('deskripsi');


        if($request->has('gambar')){
            unlink(public_path('uploads\\'.$lukisan->img));
            $image = $request->file('gambar');
            $namaImg = $image->getClientOriginalName();
            $ext = $image->guessClientExtension();
            $img = md5($namaImg).'.'.$ext;
            $lukisan->img = $img;
            $image->move(public_path('uploads'),$img);
        }

        $lukisan->save();
        return redirect()->route('lukisan.index')
                        ->with('success','foto berhasil ditambahkan');
    }
    public function destroy(lukisan $lukisan)
    {
        $image_path = "uploads/".$lukisan->img;  // Value is not URL but directory file path
        if(file_exists($image_path)){
        @unlink($image_path);
        }
        $lukisan->delete();
        return redirect()->route('lukisan.index')
                        ->with('sukses','lukisan berhasil dihapus');
    }
}
