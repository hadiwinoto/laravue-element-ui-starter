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

    public function indexMasterTempatPerbaikan(){
        return view('master.tempatperbaikan');
    }
    public function getJenisPerbaikan(){
        $data =  $this->master_perbaikan->get();
        
        return response()->json($data);
    }
    public function DeleteJenisPerbaikan(Request $request){
        $data = $this->master_perbaikan->where('id',$request->idjenis)->first();
        $data->delete();

        return response()->json([
            'message' => "Data Deleted!"
        ]);
    }
    public function tambahJenisPerbaikan(Request $request){
        $data = $this->master_perbaikan;
        $data->name = $request->jenis_perbaikan;
        $data->save();

        return response()->json([
            'data' => $data,
            'message' => "Data Deleted!"
        ]);
    }
}
