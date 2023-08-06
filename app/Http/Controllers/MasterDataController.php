<?php

namespace App\Http\Controllers;

use App\Models\Master\MjenisPerbaikanModel;
use App\Models\Master\MtempatPerbaikan;
use App\Models\Master\MmasterKendaraan;
use App\Models\Master\MmasterDriver;
use Illuminate\Http\Request;

class MasterDataController extends Controller
{
    public function __construct()
    {
        $this->master_perbaikan         =  new MjenisPerbaikanModel();
        $this->master_tempat_perbaikan  =  new MtempatPerbaikan();
        $this->master_kendaraan         =  new MmasterKendaraan();
        $this->master_driver            =  new MmasterDriver();
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
    public function indexModelPerbaikan(){
        return view('master.modelperbaikan');
    }
    public function indexModelNopol(){
        return view('master.nopol');
    }
    public function indexModelDriver(){
        return view('master.driver');
    }
    public function getJenisPerbaikan(){
        $data =  $this->master_perbaikan->get();

        return response()->json($data);
    }
    public function getJenisPerbaikanByid(Request $request){
        $data =  $this->master_perbaikan->where('id',$request->id)->first();

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
        if($request->idjenis != null){
            $data = $this->master_perbaikan->where('id',$request->idjenis)->first();
            $data->name = $request->datajenis['jenis_perbaikan'];
            $data->save();
        }else{
            $data = $this->master_perbaikan;
            $data->name = $request->datajenis['jenis_perbaikan'];
            $data->save();
        }

        return response()->json([
            'data' => $data,
            'message' => "Data Deleted!"
        ]);
    }
    public function getTempatPerbaikan(Request $request){
        $data =  $this->master_tempat_perbaikan->get();
        return response()->json([
            'data' => $data
        ]);
    }
    public function getTempatPerbaikanByid(Request $request){
        $data =  $this->master_tempat_perbaikan
        ->where('id',$request->id)
        ->first();
        return response()->json([
            'data' => $data
        ]);
    }
    public function tambahDataTempat(Request $request){
        if($request->id === null){
            $data =  $this->master_tempat_perbaikan;
        }else{
            $data =  $this->master_tempat_perbaikan->where('id',$request->id)->first();
        }
        $data->name = $request->form['name'];
        $data->save();
        return response()->json([
            'data' => $data
        ]);
    }
    public function deleteDAtatempat(Request $request){
        $data =  $this->master_tempat_perbaikan->where('id',$request->id)->first();
        $data->delete();
        return response()->json([
            'data' => $data
        ]);
    }
    public function editDataTempat(Request $request){
        $data =  $this->master_tempat_perbaikan
        ->where('id',$request->id)->first();
        $data->name = $request->form['name'];
        $data->save();

        return response()->json([
            'data' => $data,
            'message' => 'Sukses Edit Data'
        ]);
    }
    public function getDataNomorKendaraan(){
        $data  =  $this->master_kendaraan->get();
        return response()->json([
            'data' => $data
        ]);
    }
    public function getDataNomorKendaraanByid(Request $request){
        $data  =  $this->master_kendaraan->where('id',$request->id)->first();
        return response()->json($data);
    }
    public function submitNopol(Request $request){
        if($request->id != null){
            $data  =  $this->master_kendaraan->where('id',$request->id)->first();
        }else{
            $data  =  $this->master_kendaraan;
        }
        $data->no_polisi =  $request->form['nomor'];
        $data->save();
        return response()->json($data);
    }
    public function deleteData(Request $request){
        $data  =  $this->master_kendaraan->where('id',$request->id)->first();
        $data->delete();
        return response()->json(
            "Sukses"
        );

    }
    public function getDataDriver(){
        $data  =  $this->master_driver->get();
        return response()->json([
            'data' => $data
        ]);
    }
    public function getDataDriverByid(Request $request){
        $data  =  $this->master_driver->where('id',$request->id)->first();
        return response()->json($data);
    }
    public function submitDataDriver(Request $request){
        if($request->id != null){
            $data  =  $this->master_driver->where('id',$request->id)->first();
        }else{
            $data  =  $this->master_driver;
        }
        $data->nama =  $request->form['nama'];
        $data->save();
        return response()->json($data);
    }
    public function deleteDataDriver(Request $request){
        $data  =  $this->master_driver->where('id',$request->id)->first();
        $data->delete();
        return response()->json(
            "Sukses"
        );

    }

}
