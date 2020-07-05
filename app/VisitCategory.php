<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class VisitCategory extends Model
{
    use SoftDeletes;
    protected $fillable = [
       'name' , 'user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function events()
    {
        return $this->hasMany('App\Event' , 'category_id');
    }
}
