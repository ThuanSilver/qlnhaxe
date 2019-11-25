<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class thongtinxe extends Model
{
    protected $table = 'thongtinxe';
    protected $fillable = [
        'loaixe', 'tenxe','doixe','mauxe','sokhung','somay','status'
    ];
    public function nhapxe(){
        return $this->hasMany('App\nhapxe', 'thongtinxe_id','id');

    }
    public function banxe(){
        return $this->hasMany('App\banxe', 'thongtinxe_id','id');
    }
    public function congno(){
        return $this->hasMany('App\congno', 'thongtinxe_id','id');
    }
    public function ktquatang(){
        return $this->hasMany('App\ktquatang', 'thongtinxe_id','id');
    }
    public function xuatnoibo(){
        return $this->hasMany('App\xuatnoibo', 'thongtinxe_id','id');
    }



}
