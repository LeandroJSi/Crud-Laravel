<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'email', 'website','logo'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function employees(){
        return $this->hasMany(Employee::class);
    }
}
