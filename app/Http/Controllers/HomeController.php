<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function showSpp(){

        return view('spp');
    }

    public function submitUpload(Request $request){
        
        // $data = $this->kajian;
        // $data->judul        = $request->form['judul'];
        // $data->jenis_kajian = $request->form['jenis_kajian'];
        // $data->nomor        = $request->form['nomor'];
        // $data->tahun        = $request->form['tahun'];

        // $data->save();

        return response()->json('Sukses');
    }
}
