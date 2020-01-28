<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    use SoftDeletes;
    protected $fillable = [
       'name', 'path' , "user_id"
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
