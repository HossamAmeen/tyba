<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class News extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title' , 'description', 'en_title' , 'vision_mission', 'image' , "user_id"
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function getDescriptionAttribute()
    {
        // return $this->description;
        // return strip_tags($this->description);
        // return  substr( strip_tags(html_entity_decode($this->description)  ) , 0 ,  190 );
    }
    public function getEnSubDesAttribute()
    {
        return  substr(  strip_tags(html_entity_decode($this->vision_mission)) , 0 ,  150 );
    }

    public function getArSubDesAttribute()
    {
        // return $this->description;
        // return strip_tags($this->description);
        return  substr( strip_tags(html_entity_decode($this->description)  ) , 0 ,  190 );
    }
   
}
