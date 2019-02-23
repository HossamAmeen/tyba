<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name' , 'img' ,'description' , 'date' 
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
