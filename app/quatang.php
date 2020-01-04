<?php

namespace App;
use App\banxe;

use Illuminate\Database\Eloquent\Model;

class quatang extends Model
{

    protected $table='quatang';
    protected $fillable = [
        'tenquatang'
    ];
    public function banxe(){
        return $this->hasMany('App\banxe', 'quatang_id','id');
    }
    public function ktquatang(){
        return $this->hasMany('App\ktquatang', 'quatang_id','id');
    }
}
