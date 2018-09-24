<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lukisan;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
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
}
