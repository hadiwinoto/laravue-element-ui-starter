<?php

namespace App\Http\Controllers\Maintenance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Maintenance\MmaintenanceModel;

class InputMassalController extends Controller
{
    public function __construct(){
        $this->maintenance = new MmaintenanceModel();
    }
    public function downloadTemplate(Request $request){
        $storage_name = 'template-input.xlxs.';
        $path = storage_path('app/public/files/template/file/'.$storage_name);
        ob_end_clean();
        $headers = array(
          'Content-Type: image,application/vnd.ms-excel; charset=utf-8"',
        );
        return response()->download($path, $storage_name, $headers);
    }
    public function importData(Request $request){


    }
}
