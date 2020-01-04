<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tragop extends Model
{
    protected $table='tragop';
    protected $fillable = [
        'loaitragop'
    ];
    public function banxe(){
        return $this->hasMany('App\banxe', 'tragop_id','id');
    }
}
