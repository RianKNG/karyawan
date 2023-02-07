<?php

namespace App\Models;

use App\Models\Religion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Karyawan extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['created_at','religions_id'];
    // protected $table      = 'karyawans';
    // protected $primaryKey = 'id';


   

    public function religions(){
        return $this->hasMany(Religion::class,'religions_id','id');
        // return $this->belongsTo('App\Religion');
    }
    
}
