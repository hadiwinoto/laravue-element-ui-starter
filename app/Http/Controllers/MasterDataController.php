<?php

namespace App\Http\Controllers;

use App\Models\Master\MjenisPerbaikanModel;
use App\Models\Master\MtempatPerbaikan;
use Illuminate\Http\Request;

class MasterDataController extends Controller
{
    public function __construct()
    {
        $this->master_perbaikan         =  new MjenisPerbaikanModel();
        $this->master_tempat_perbaikan  =  new MtempatPerbaikan();
    }
    public function indexMasterData(){

        return view('masterdata');
    }
    public function indexPerbaikan(){

        return view('master.jenisperbaikan');
    }
    public function getJenisPerbaikan(){
        $data =  $this->master_perbaikan->get();
        
        return response()->json($data);
    }
}