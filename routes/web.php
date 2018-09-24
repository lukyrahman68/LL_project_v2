<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\lukisan;
use App\foto;
use App\situs;

Route::get('/admin', function () {
    return view('auth.login');
});

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/lfoe', function () {
	$lukisan = new lukisan;
    $lukisan = lukisan::paginate(4);
    $data = array('lukisan' => $lukisan);
    return view('lfoe')->with($data);;
    //return view('lfoe');
});

Route::get('/lfoe_detail/{id}', function ($a) {
	$lukisan = new lukisan;
    $lukisan = lukisan::where('id','=', $a)->first();
    $data = array('lukisan' => $lukisan);
    return view('lfoe_detail')->with($data);
});


Route::get('/wws', function () {
	$foto = new foto;
    $foto = foto::paginate(4);
    return view('wws',['foto' => $foto]);
});
Route::get('/wws_detail/{id}', function ($a) {
	$foto = new foto;
    $foto = foto::where('id','=', $a)->first();
    $data = array('foto' => $foto);
    return view('wws_detail')->with($data);
});

/*Route::get('/contact', function () {
    return view('contact');
});*/

//Route::get('/show','cobaController@show');


Route::get('/about', function () {
    $situs = new situs;
    $situs = situs::all();
    $data = array('situs' => $situs);
    return view('about')->with($data);;
    //return view('about');
});

//-----------------------admin------------------------------

Route::get('admin/tambah', function () {
    return view('layouts.tambahlukisan',['hal' => 'lukisan'],['sub' => 'tambah']);
});
Route::get('admin/tambahfoto', function () {
    return view('layouts.tambahfoto',['hal' => 'foto'],['sub' => 'tambah']);
});


Route::get('admin/edit', 'lukisancontroller@index');

Route::get('admin/lihatfoto', 'fotocontroller@index');
Route::get('admin/editfoto', 'fotocontroller@index');

Route::get('admin/lihatpesan', 'pesancontroller@index');
//Route::resource('inputdatalukisan', 'lukisancontroller');
Route::resource('admin/lukisan','lukisancontroller');
Route::resource('admin/pesan','pesancontroller');
Route::resource('admin/foto','fotocontroller');
Route::resource('admin/situs','situscontroller');
Route::resource('contact','pecontroller');
//Route::get('/edit/{$id}', 'lukisancontroller@editlukisan($id)');
Auth::routes();

Route::get('admin/home', 'HomeController@index')->name('home');

Route::get('admin/forget', function () {
    return view('auth.passwords.email');
});
