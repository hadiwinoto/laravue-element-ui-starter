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


    }
    public function importData(Request $request){


    }
}
