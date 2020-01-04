<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kho extends Model
{
    protected $table = 'kho';
    protected $fillable = [
        'dia_diem', 'name'
    ];
    public function nhapxe(){
        return $this->hasMany('App\nhapxe', 'kho_id','id');
}
    public function banxe(){
        return $this->hasMany('App\banxe', 'kho_id','id');
    }
    public function banxi(){
        return $this->hasMany('App\banxi', 'kho_id','id');
    }
    public function xuatnoibo()
    {
        return $this->hasMany('App\xuatnoibo', 'kho_id', 'id');
    }
}
