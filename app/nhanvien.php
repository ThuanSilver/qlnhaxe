<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhanvien extends Model
{
    protected $table = 'nhanvien';
    protected $fillable = [
        'name','chucvu','sdt'
    ];
    public function nhapxe(){
        return $this->hasMany('App\nhapxe', 'nhanvien_id','id');

    }
    public function banxe(){
        return $this->hasMany('App\nhanvien', 'nhanvien_id','id');
    }
}
