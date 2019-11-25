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
         'giaban','duatruoc','conlai','status','Hovaten','ngaysinh','sdt','ngaymua','diachi','phuong','thanhpho',
        'tinh','thongtinxe_id','kho_id','tragop_id','nhanvien_id','quatang_id'
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

}
