<?php

namespace App\Http\Controllers\Maintenance;

use App\Http\Controllers\Controller;
use App\Models\Maintenance\MmaintenanceModel;
use App\Models\Master\MjenisPerbaikanModel;
use App\Models\Master\MmasterKendaraan;
use App\Models\Master\MtempatPerbaikan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class MaintenanceController extends Controller
{
    public function __construct()
    {
        $this->maintenance =  new MmaintenanceModel();
        $this->masterjenis =  new MjenisPerbaikanModel();
        $this->master_tempat_perbaikan =  new MtempatPerbaikan();
        $this->master_kendaraan =  new MmasterKendaraan();
    }
    public function indexMaintenance(){

        return view('maintenance');
    }

    public function showZonaSatu(){

        return view('maintenance.zonasatu.index');
    }
    public function detailMaintanance(){


        return view('detailmaintenance');
    }

    public function getData(Request $request){
        $filter = $request->all();
        $data =  $this->maintenance
        ->when(!empty($filter['tanggal_perbaikan']) && !empty($filter['tanggal_selesai']), function ($query) use ($filter) {
            $startdate = Carbon::parse($filter['tanggal_perbaikan'])->format('y-m-d');
            $enddate = Carbon::parse($filter['tanggal_selesai'])->format('y-m-d');

            return $query->whereBetween('tanggal_selesai', [$startdate, $enddate]);
          })
        ->when(!empty($filter['jenis_perbaikan']), function ($query) use ($filter) {
            return $query->where('jenis_perbaikan',($filter['jenis_perbaikan']));
          })
          ->when(!empty($filter['tempat_perbaikan']), function ($query) use ($filter) {
            return $query->where('tempat_perbaikan',($filter['tempat_perbaikan']));
          })
          ->when(!empty($filter['model_perbaikan']), function ($query) use ($filter) {
            return $query->where('model_perbaikan',($filter['model_perbaikan']));
          })
        ->paginate(100);

        $jenisperbaikan =  $this->masterjenis->get();
        $master_tempat_perbaikan =  $this->master_tempat_perbaikan->get();
        $modelperbaikan = ['Dikerjakan Sendiri','Bengkel Luar'];
        $masterkendaraan =  $this->master_kendaraan->get();

        //jenis perbaikan
        $optionsjenis = [];
        foreach($jenisperbaikan as $perbaikan){
            $optionsjenis[] = $perbaikan->name;
        }

        //tempat perbaikan
        $optionstempat = [];
        foreach($master_tempat_perbaikan as $tempat){
            $optionstempat[] = $tempat->name;
        }

        $optionskendaraan = [];
        foreach($masterkendaraan as $kendaraan){
            $optionskendaraan[] = $kendaraan->no_polisi;
        }

        $admin =  Auth::user()->isAdmin();
        $user =  Auth::user()->isUser();

        return response()->json([
            'data' => $data,
            'jenis_perbaikan' => $optionsjenis,
            'master_tempat_perbaikan' => $optionstempat,
            'modelperbaikan'  => $modelperbaikan,
            'masterkendaraan' => $optionskendaraan,
            'admin'           => $admin,
            'user'            => $user
        ]);
    }

    public function submitMaintenance(Request $request){

        $data =  $this->maintenance;
        $data->user_create          =  Auth::user()->id;
        $data->nomor_perbaikan      =  'JMP'.Carbon::now()->timestamp.Auth::user()->id;
        $data->tanggal_perbaikan    =  Carbon::parse($request->form['tanggal_perbaikan'])->format('y-m-d');
        $data->jenis_perbaikan      =  $request->form['jenis_perbaikan'];
        $data->detail_perbaikan     =  $request->form['detail_perbaikan'];
        $data->tempat_perbaikan     =  $request->form['tempat_perbaikan'];
        $data->detail_lokasi        =  $request->form['detail_lokasi'];
        $data->model_perbaikan      =  $request->form['model_perbaikan'];
        $data->nomor_polisi         =  $request->form['no_polisi'];
        $data->keterangan =  $request->form['keterangan'];
        $data->nama_montir = $request->form['nama_montir'];
        $data->nama_supir = $request->form['nama_supir'];
        $data->keterangan   = $request->form['keterangan'];
        $data->biaya        = $request->form['biaya'];
        $data->tanggal_selesai =  Carbon::parse($request->form['tanggal_selesai'])->format('y-m-d');

        $data->save();
        if($data->save()){
            return response()->json('Sukses');
        }else{  
            return response()->json('Failed');
        }
    }
    
    public function DetailData(Request $request){
        $data =  $this->maintenance
            ->where('id',$request->id)
            ->with('oneJenisPerbaikan')
            ->with('oneTempatPerbaikan')
            ->first();
        $jenisperbaikan =  $this->masterjenis->get();
        $master_tempat_perbaikan =  $this->master_tempat_perbaikan->get();
        $modelperbaikan = ['Dikerjakan Sendiri','Bengkel Luar'];
        $masterkendaraan =  $this->master_kendaraan->get();


        //jenis perbaikan
        $optionsjenis = [];
        foreach($jenisperbaikan as $perbaikan){
            $optionsjenis[] = $perbaikan->name;
        }

        //tempat perbaikan
        $optionstempat = [];
        foreach($master_tempat_perbaikan as $tempat){
            $optionstempat[] = $tempat->name;
        }

        $optionskendaraan = [];
        foreach($masterkendaraan as $kendaraan){
            $optionskendaraan[] = $kendaraan->no_polisi;
        }

        return response()->json([
            'data' => $data,
            'jenis_perbaikan' => $optionsjenis,
            'master_tempat_perbaikan' => $optionstempat,
            'modelperbaikan' => $modelperbaikan,
            'masterkendaraan' => $optionskendaraan
        ]);
    }   
    public function EditData(Request $request){
        $data =  $this->maintenance
            ->where('id',$request->id)
            ->first();
            $data->tanggal_perbaikan    =  Carbon::parse($request->form['tanggal_perbaikan'])->format('y-m-d');
            $data->jenis_perbaikan      =  $request->form['jenis_perbaikan'];
            $data->detail_perbaikan     =  $request->form['detail_perbaikan'];
            $data->tempat_perbaikan     =  $request->form['tempat_perbaikan'];
            $data->detail_lokasi        =  $request->form['detail_lokasi'];
            $data->model_perbaikan      =  $request->form['model_perbaikan'];
            $data->nomor_polisi         =  $request->form['nomor_polisi'];
            $data->keterangan           =  $request->form['keterangan'];
            $data->nama_montir          = $request->form['nama_montir'];
            $data->nama_supir           = $request->form['nama_supir'];
            $data->keterangan           = $request->form['keterangan'];
            $data->biaya                = $request->form['biaya'];
            $data->tanggal_selesai      =  Carbon::parse($request->form['tanggal_selesai'])->format('y-m-d');
            $data->save();
        return response()->json([
            'data' => $data,
        ]);
    }
    public function submitDataTempat(){
       $data =  $this->master_tempat_perbaikan;
       $dat->nama =  $request->nama;
       $data->save();
    }
}
