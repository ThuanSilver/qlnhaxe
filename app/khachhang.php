<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class khachhang extends Model
{

    protected $table = 'khachhang';
    protected $fillable = [
        'name', 'ngaysinh','sdt','diachi','phuong','thanhpho','tinh'
    ];
    public function congno(){
        return $this->hasMany('App\congno', 'khachhang_id','id');
    }
    public function ktquatang(){
        return $this->hasMany('App\ktquatang', 'khachhang_id','id');
    }
    public function banxe(){
        return $this->hasMany('App\banxe', 'khachhang_id','id');
    }

}
