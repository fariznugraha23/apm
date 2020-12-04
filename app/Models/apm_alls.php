<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apm_alls extends Model
{
    use HasFactory;
    protected $table = "apm_alls";
    public $timestamps = false;
    protected $fillable = [
        'id_area', 'area_rb', 'penilaian', 'a', 'b', 'c', 'nilai', 'id_kriteria', 'bobot', 'skor', 'panduan_eviden', 'catatan_eviden'
    ];
    public function area_apms()
    {
        return $this->belongsTo('App\Models\area_apms', 'id_area','id_area');
    }
    public function kriteria_apms()
    {
        return $this->belongsTo('App\Models\kriteria_apms', 'id_kriteria','id_kriteria');
    }

}
