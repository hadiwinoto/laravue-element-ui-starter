<?php

namespace App\Http\Controllers\Maintenance;

use App\Http\Controllers\Controller;
use App\Models\Maintenance\MmaintenanceModel;
use App\Exports\MaintenanceExport; // Import the export class
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportDataController extends Controller
{
    protected $maintenance;
    public function __construct(){
        $this->maintenance =  new MmaintenanceModel();
    }
    public function ExportData(Request $request)
    {
        // Fetch the data you want to export
        $data = $this->maintenance->getAllData(); // Replace with your actual method to retrieve data

        // Call the export class and generate the Excel file
        return Excel::download(new MaintenanceExport($data), 'maintenance_data.xlsx');
    }
}
