<?php

namespace App\Models\Maintenance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MmaintenanceModel extends Model
{
    use HasFactory;
    protected $table = 'maintenance';

    public function oneJenisPerbaikan()
    {
        return $this->hasOne('App\Models\Master\MjenisPerbaikanModel', 'id', 'jenis_perbaikan');
    }
    public function oneTempatPerbaikan()
    {
        return $this->hasOne('App\Models\Master\MtempatPerbaikan', 'id', 'tempat_perbaikan');
    }
}
