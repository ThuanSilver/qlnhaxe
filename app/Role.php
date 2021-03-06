<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table='role';
    protected $fillable = [
        'name', 'description'
    ];
    public function users()
    {
        return $this->belongsToMany(User::class,'role_user');
    }
}
