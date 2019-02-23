<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Pref extends Model
{
   
    protected $fillable = [
        'arAddress' , 'arDescription' , 'phone'
        , 'mainEmail' ,'descriptionPoint', 'facebook' , 'twitter', 'video'
    ];
    protected $dates = ['deleted_at'];
    protected $casts = [
        'descriptionPoint' => 'array',
    ];
}
