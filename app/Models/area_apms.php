<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class area_apms extends Model
{
    use HasFactory;
    protected $table = "area_apms";
    public $timestamps = false;
    protected $primaryKey = "id_area";
    protected $fillable = [
        'nama_area'
    ];
    public function apm_alls()
    {
        return $this->hasMany('App\Models\apm_alls', 'id_area','id_area');
    }
}
