<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['firstName', 'lastName', 'email', 'phone'];

    public function company(){
       return $this->belongsTo(Company::class);
    }
}
