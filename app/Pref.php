<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Pref extends Model
{
   
    protected $fillable = [
        'arAddress' , 'arDescription' ,'description','about_us', 'serviceDescription','phone','andriod_app'
        , 'mainEmail' , 'facebook' ,"youtube", 'twitter', 'video'
    ];
    protected $dates = ['deleted_at'];
    protected $casts = [
        'descriptionPoint' => 'array',
    ];
}
