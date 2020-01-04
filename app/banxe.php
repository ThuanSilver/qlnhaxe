<?php

namespace App;
use App\nhapxe;
use App\kho;
use App\quatang;
use App\tragop;
use App\nhanvien;
use Illuminate\Database\Eloquent\Model;

class banxe extends Model

{
    protected $table='banxe';
    protected $fillable = [
         'sohd','giaban','duatruoc','conlai','tinhtrang','khachhang_id',
        'tinh','thongtinxe_id','kho_id','tragop_id','nhanvien_id','baohiem','uyquyen','lamvang',
        'muabh','aomua','mockhoa','aotrumxe','balo','tiengop','ngaymua','tongthu'
    ];
    public function quatang(){
        return $this->belongsTo('App\quatang', 'quatang_id','id');
    }
    public function thongtinxe(){
        return $this->belongsTo('App\thongtinxe', 'thongtinxe_id','id');
    }
    public function kho(){
        return $this->belongsTo('App\kho', 'kho_id','id');
    }
    public function tragop(){
        return $this->belongsTo('App\tragop', 'tragop_id','id');
    }
    public function nhanvien(){
        return $this->belongsTo('App\nhanvien', 'nhanvien_id','id');
    }
    public function khachhang (){
        return $this->belongsTo('App\khachhang', 'khachhang_id','id');
    }
    public function ktquatang(){
        return $this->hasMany('App\ktquatang', 'banxe_id','id');
    }


}
