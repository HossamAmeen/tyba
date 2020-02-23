<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'ar_title', 'description'  ,'icon'  ];
        public function user()
    {
        return $this->belongsTo('App\User');
    }
}
