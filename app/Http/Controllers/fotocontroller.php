<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\foto;
use App\Http\Requests;
use Storage;

class fotocontroller extends Controller
{
    public function index()
    {
        $foto = new foto;
        $foto = foto::all();
        $data = array(
        			'hal' => 'foto',
                  	'sub' => 'edit',
              		'foto' => $foto);
        return view('layouts.editfoto')->with($data);
    }
    public function store(Request $request){
    	try{
            $image = $request->file('gambar');
            $namaImg = $image->getClientOriginalName();
            $ext = $image->guessClientExtension();
            $img = md5($namaImg).'.'.$ext;
    		$foto = new foto();
	    	$foto->nama = $request->get('judul');
            $foto->deskripsi = $request->get('deskripsi');
            $foto->img = $img;
	    	$foto->sts = "1";
	    	$foto->created_at = now();
	    	$foto->updated_at = now();
	    	$foto->save();

	        $image->move(public_path('fotos'),$img);

			return redirect('admin/tambahfoto')->with('sukses','foto berhasil ditambahkan');
    	}
    	catch(\Exception $e){
    		$msg=$e->getMessage();
    		return redirect('admin/tambahfoto')->with('gagal','foto gagal ditambahkan');
    	}
    }
    public function show(foto $foto)
    {
        $data = array(
        			'hal' => 'foto',
                  	'sub' => 'edit',
              		'foto' => $foto);
        return view('layouts.lihatfoto')->with($data);
    }

    public function edit(foto $foto)
    {
    	$data = array(
        			'hal' => 'foto',
                  	'sub' => 'edit',
              		'foto' => $foto);
        return view('layouts.halamaneditfoto')->with($data);;
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

  		$foto = foto::find($id);
	    $foto->nama = $request->get('nama');
      	$foto->deskripsi = $request->get('deskripsi');

      	if($request->has('gambar')){
            unlink(public_path('fotos\\'.$foto->img));
            $image = $request->file('gambar');
            $namaImg = $image->getClientOriginalName();
            $ext = $image->guessClientExtension();
            $img = md5($namaImg).'.'.$ext;
            $foto->img = $img;
            $image->move(public_path('fotos'),$img);
        }
      	$foto->save();

        return redirect()->route('foto.index')
                        ->with('success','category updated successfully');
    }
    public function destroy(foto $foto)
    {
        $image_path = "fotos/".$foto->img;  // Value is not URL but directory file path
        if(file_exists($image_path)){
        @unlink($image_path);
        }
        $foto->delete();
        return redirect()->route('foto.index')
                        ->with('sukses','lukisan berhasil dihapus');
    }
}
