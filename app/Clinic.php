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
    protected $hidden = ['appointments'];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function events()
    {
        return $this->hasMany('App\Event');
    }

   
    // public function getDescriptionPointsAttribute()
    // {
    //     // return substr(strip_tags($this->description), 0 ,  150 );
    //     // return "test";
    //     return   strip_tags(html_entity_decode($this->descriptionPoint) )  ;
    // }
    // public function getFullNameAttribute()	 	 
    // {	 	 
    //     return $this->descriptionPoint . " " . $this->id;	 	 
    // }
}