<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Clinic extends Model
{
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name' ,'postion', 'img' ,'doctor' , 'appointments'  , 'descriptionPoint'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function events()
    {
        return $this->hasMany('App\Event');
    }
}