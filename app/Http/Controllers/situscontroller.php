<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\situs;
use App\Http\Requests;
use Storage;
class situscontroller extends Controller
{
    public function index()
    {
        $situs = new situs;
        $situs = situs::all();
        $data = array(
        			'hal' => 'situs',
                  	'sub' => '1',
              		'situs' => $situs);  
        return view('layouts.editsitus')->with($data);
    }
    public function store(Request $request){
    	try{
    		$situs = new situs();
	    	$situs->nama = $request->get('judul');
	    	$situs->deskripsi = $request->get('deskripsi');
	    	$situs->sts = "1";
	    	$situs->created_at = now();
	    	$situs->updated_at = now();
	    	$situs->save();

	    	$image = $request->file('gambar');
	        $imageName = $situs->id.".jpg";
	        $image->move(public_path('situses'),$imageName);
			
			return redirect()->route('situs.index')->with('sukses','situs berhasil ditambahkan');
    	}
    	catch(\Exception $e){
    		$msg=$e->getMessage();
    		return redirect()->route('situs.index')->with('gagal','situs gagal ditambahkan');
    	}
    }
    public function show(situs $situs)
    {
        $data = array(
        			'hal' => 'situs',
                  	'sub' => '1',
              		'situs' => $situs);  
        return redirect()->route('situs.index')->with($data);
    }
    public function edit(situs $situs)
    {
    	$data = array(
        			'hal' => 'situs',
                  	'sub' => '1',
              		'situs' => $situs);  
        return view('layouts.halamaneditsitus')->with($data);;
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'deskripsi' => 'required',
        ]);

  		$situs = situs::find($id);
      	$situs->deskripsi = $request->get('deskripsi');

        if($request->has('gambar')){
            $image = $request->file('gambar');
            $imageName = $situs->id.".jpg";
            $image->move(public_path('situses'),$imageName);
        }
        $situs->save();
        return redirect()->route('situs.index')
                        ->with('success','foto berhasil ditambahkan');
    }
}
