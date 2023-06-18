<?php

namespace App\Http\Controllers\Maintenance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Maintenance\MmaintenanceModel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Illuminate\Support\Carbon;

class InputMassalController extends Controller
{
    public function __construct(){
        $this->maintenance = new MmaintenanceModel();
    }
    public function downloadTemplate(Request $request){
        $storage_name = 'template-input-massal.xlsx';
        $path = storage_path('app/public/template/'.$storage_name);
        if (ob_get_length() > 0) {
            ob_end_clean();
        }
        $headers = array(
          'Content-Type: image,application/vnd.ms-excel; charset=utf-8"',
        );
        return response()->download($path, $storage_name, $headers);
    }
    public function importData(Request $request){
        if ($request->hasFile('file')) {
            $file = $request->file('file');
              $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);
        $start =  2;
        $jml = 100;
        $data = [];
        for ($i = 0; $i < $jml; $i++) {
            $cekvalue = $spreadsheet->getActiveSheet()->getCell('B'.$start)->getValue();
            if($cekvalue == null || $cekvalue == ''){
            break;
            }
            $tanggalperbaikan = 
            $date = 
            $arr = [
                'nomor_perbaikan'       => 'JMP'.Carbon::now()->timestamp.$i,
                'tanggal_perbaikan'     => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($spreadsheet->getActiveSheet()->getCell('A' . $start)->getValue()),
                'jenis_perbaikan'       => $spreadsheet->getActiveSheet()->getCell('B' . $start)->getValue(),
                'detail_perbaikan'      => $spreadsheet->getActiveSheet()->getCell('C' . $start)->getValue(),
                'tempat_perbaikan'      => $spreadsheet->getActiveSheet()->getCell('D' . $start)->getValue(),
                'detail_lokasi'         => $spreadsheet->getActiveSheet()->getCell('E' . $start)->getValue(),
                'model_perbaikan'       => $spreadsheet->getActiveSheet()->getCell('F' . $start)->getValue(),
                'nomor_polisi'          => $spreadsheet->getActiveSheet()->getCell('G' . $start)->getValue(),
                'nama_supir'            => $spreadsheet->getActiveSheet()->getCell('H' . $start)->getValue(),
                'nama_montir'           => $spreadsheet->getActiveSheet()->getCell('I' . $start)->getValue(),
                'tanggal_selesai'       => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($spreadsheet->getActiveSheet()->getCell('J' . $start)->getValue()),
                'biaya'                 => $spreadsheet->getActiveSheet()->getCell('K' . $start)->getValue(),
                'keterangan'            => $spreadsheet->getActiveSheet()->getCell('L' . $start)->getValue(),
            ];
            array_push($data, $arr);
            $start++;
        }
        $this->maintenance->insert($data);
            return response()->json([
                'data' => $data,
                'message' => 'File uploaded successfully'
            ]);
        }
        return response()->json(['message' => 'No file uploaded'], 400);
    }
}
