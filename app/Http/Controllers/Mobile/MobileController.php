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
    public function contact(Request $request)
    {
            $rules = $this->contactFormValidation();
            $message = $this->contactMessageValidation();
            $this->validate($request, $rules, $message);
            $data=[
                'email' =>  $request->email,
                'name' => $request->name,

                'subject'=>$request->subject,
                'text'=>$request->text,
            ];
            Mail::send('web.contact_mail',$data,function($message) use ($data){

                $message->from( $data['email'] , $data['name']);
                $message->to("info@tibaroyal.com");
                $message->subject($data['subject']);
            });
     
        

       
    }

    public function book(Request $request)
    {

      

        
            // return $request->all();
            $rules = $this->bookFormValidation();
            $message = $this->bookMessageValidation();
            $this->validate($request, $rules, $message);
            $data=[
                'email' =>  $request->email,
                'name' => $request->name,
                'phone' => $request->phone,
                'subject'=>$request->subject,
                'special'=>$request->special,
            ];
            Mail::send('web.book_mail',$data,function($message) use ($data){

                $message->from( $data['email'] , $data['name']);
                $message->to("book@tibaroyal.com");
                $message->subject(  " حجز نخصص " . $data['special']  );
            });
     
    }


    function contactFormValidation()
    {


        return array(
            'name' => 'required|string||max:99',

            'email' => 'required|email',

            'text' => 'required|regex:/^[\pL\s\-]+$/u||max:99',

        );
    }

    function contactMessageValidation()
    {
        return array(
            'name.required' => 'هذا الحقل (الاسم) مطلوب ',
            'name.*' => 'هذا الحقل (الاسم) يجب يحتوي ع حروف وارقام فقط',

            'text.required' => 'هذا الحقل (الرساله) مطلوب ',
            'text.*' => 'هذا الحقل (الرساله) يجب يحتوي ع حروف وارقام فقط',

            'email.required' => 'هذا الحقل (البريد) مطلوب ',
            'email.*' => 'هذا الحقل (البريد)يجب ان يكون بريد صحيح',

            'phone.required' => 'هذا الحقل (التلفون) مطلوب ',
            'phone.min' => 'هذا الحقل (التلفون) يجب الا يقل عن 11 رقم ',
            'phone.*' => 'هذا الحقل (التلفون) يجب يحتوي ع ارقام فقط',


        );
    }

    function bookFormValidation()
    {


        return array(
            'name' => 'string|required|max:99',
            'email' => 'required|email',
            'phone' => 'regex:/^[\d]+$/u|required|digits:11',
            'special' => 'regex:/^[\pL\s\-]+$/u||required|max:99',

        );
    }

    function bookMessageValidation()
    {
        return array(
            'name.required' => 'هذا الحقل (الاسم) مطلوب ',
            'name.*' => 'هذا الحقل (الاسم) يجب يحتوي ع حروف وارقام فقط',

            
            'email.required' => 'هذا الحقل (البريد) مطلوب ',
            'email.*' => 'هذا الحقل (البريد)يجب ان يكون بريد صحيح',

            'phone.required' => 'هذا الحقل (التلفون) مطلوب ',
            'phone.digits' => 'هذا الحقل (التلفون) يجب الا يقل عن 11 رقم ',
            'phone.*' => 'هذا الحقل (التلفون) يجب يحتوي ع ارقام فقط',


        );
    }
    
}
