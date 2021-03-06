<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name' , 'img' ,'job' 
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
