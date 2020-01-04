<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ktquatang extends Model
{
    //
    protected $table='ktquatang';
    protected $fillable = [
        'date', 'banxe_id','khachhang_id','thongtinxe_id'
    ];
    public function khachhang(){
        return $this->belongsTo('App\khachhang', 'khachhang_id','id');
    }
    public function quatang(){
        return $this->belongsTo('App\quatang', 'quatang_id','id');
    }
    public function thongtinxe(){
        return $this->belongsTo('App\thongtinxe', 'khachhang_id','id');
    }
    public function banxe(){
        return $this->belongsTo('App\banxe', 'banxe_id','id');
    }
}
