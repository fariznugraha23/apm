<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kriteria_apms extends Model
{
    use HasFactory;
    protected $table = "kriteria_apms";
    public $timestamps = false;
    protected $fillable = [
        'nama_kriteria'
    ];
    public function apm_alls()
    {
        return $this->hasMany('App\Models\apm_alls', 'id_kriteria','id_kriteria');
    }
}
