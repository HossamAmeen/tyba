<?php

namespace App\Http\Controllers\Mobile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
use App\Event;
use App\Doctor;
use App\Clinic;
use App\Pref;
class MobileController extends Controller
{
 

    public function services()
    {
        $data['services'] = Service::all( 'ar_title', 'icon' );
        return json_encode($data , JSON_UNESCAPED_UNICODE) ;
      
    }

    public function clinics()
    {


      
        $data['clinics'] = Clinic::all( 'id' , 'name' , 'img' ,'description' , 'appointments' );

        return json_encode($data , JSON_UNESCAPED_UNICODE) ;

    }
    public function clinic($id)
    {
        
        $data['clinic'] = Clinic::find($id);
        $data['clinic']->descriptionPoint =  strip_tags ( $data['clinic']->descriptionPoint );
        return json_encode($data , JSON_UNESCAPED_UNICODE) ;
     

    }
    public function doctors()
    {


       
        $data['doctors'] = Doctor::all( 'name' , 'img' ,'job' );
        return json_encode($data , JSON_UNESCAPED_UNICODE) ;

    }
    public function events()
    {


      
        $data['events'] = Event::all('name' , 'img' ,'description' , 'date' );
        return json_encode($data , JSON_UNESCAPED_UNICODE) ;

    }
    
    public function about()
    {
        $data['about'] = Pref::find(1 , ['arAddress' , 'arDescription' , 'phone'
        , 'mainEmail' ,'descriptionPoint', 'facebook' , 'twitter', 'video']);
         $data['about']->descriptionPoint = strip_tags( $data['about']->descriptionPoint);      
        return json_encode(  $data['about'], JSON_UNESCAPED_UNICODE) ;
    }

    

 
    
}
