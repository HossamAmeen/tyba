<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Route;
use URL;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Service;
use App\Event;
use App\Doctor;
use App\Video;
use App\News;
use App\Book;
use App\Clinic;


use DB;
use Mail;

class HomeController extends Controller
{

    public function index()
    {

        $data['services'] = Service::all()->take(8);
        $data['event']    = Event::all()->first();
        $data['clinics']  = Clinic::all();
        $data['doctors']  = Doctor::all()->take(8);
        $data['news']  = News::all()->take(4);
        $data['videos']  = Video::all()->take(3);
        $data['title']    = "مستشفى طيبه رويال";
        return view('web.index', $data);
    }

    public function services()
    {
        $data['services'] = Service::all()->take(8);
        $data['title'] = "مستشفى طيبه رويال - خدماتنا";
        return view('web.services', $data);
    }

    public function showService($id)
    {
        $data['services'] = Service::where('id' ,'!=', $id)->get()->take(4);
        $data['service'] = Service::find($id);
        $data['title'] = "مستشفى طيبه رويال - خدماتنا";
        return view('web.service-detail', $data);
    
    }
    public function clinics()
    {


        $title = "مستشفى طيبه رويال - العيادات";
        $data['clinics'] = Clinic::all();
        return view('web.clinics' , $data)->with(compact( 'title'));

    }
    public function clinic($id)
    {
        //return "test";
        $data['clinic'] = Clinic::find($id);
        $title =   "مستشفى طيبه رويال- " . $data['clinic']->name ;
        return view('web.clinic' , $data)->with(compact( 'title'));

    }
    public function news()
    {
        $title = "مستشفى طيبه رويال - الأخبار";
        $data['news'] = News::paginate(8);
        return view('web.news' , $data)->with(compact( 'title'));
    }
    public function showNews($id)
    {
        
        $data['news'] = News::find($id);
        $data["news2"] = News::all()->sortByDesc("id")->where('id','!=',$id)->take(4);
        if(isset($data['news']))
        {
            if( strlen($data['news']->title)< 50 )
            $title = "مستشفى طيبه رويال - " .$data['news']->title;
           
            else
            {
                $data['news']->title = substr($data['news']->title , 0 , 50 );  
                $title = "مستشفى طيبه رويال - " .$data['news']->title;
            }
           
        }
        
        return view('web.show_news' , $data)->with(compact( 'title'));
    } 

    public function videos()
    {
        $title = "مستشفى طيبه رويال - الفديوهات";
        $data['videos'] = Video::paginate(8);
        return view('web.videos' , $data)->with(compact( 'title'));
    }
    public function doctors()
    {


        $title = "مستشفى طيبه رويال - الاطباء";
        $data['doctors'] = Doctor::all();
        return view('web.doctors' , $data)->with(compact( 'title'));

    }
    public function events()
    {


        $title = "مستشفى طيبه رويال - الزيارات";
        $data['events'] = Event::all();
        $data['clinics'] = Clinic::all();
        return view('web.events' , $data)->with(compact( 'title'));

    }
    
    public function about()
    {
        $title = "مستشفى طيبه رويال - من نحن";
        $data['doctors']  = Doctor::all();
      
        return view('web.about', $data)->with(compact('title'));

    }

    

    public function contact(Request $request)
    {

        $title = "مركز طيبة رويال";

        if ($request->isMethod('post')) {
            // return $request->all();
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
            $request->session()->flash('status', 'تم الارسال بنجاح!');
            return redirect()->back();
        }

        return view('web.contacts')->with(compact('title'));
    }

    
    public function book(Request $request)
    {

        $title = "مركز طيبة رويال";

        if ($request->isMethod('post')) {
            // return $request->all();
            $rules = $this->bookFormValidation();
            $message = $this->bookMessageValidation();
            $this->validate($request, $rules, $message);
            $book = new Book();
            $book->name = $request->name;
            $book->phone = $request->phone;
            $book->special = $request->special;
            $book->message = $request->message;
            $book->save();
            $data=[
                'name' => $request->name,
                'phone' => $request->phone,
                'special'=>$request->special,
            ];
            Mail::send('web.book_mail',$data,function($message) use ($data){

                // $message->from( $data['email'] , $data['name']);
                $message->to("book@tibaroyal.com");
                $message->subject(  " حجز نخصص " . $data['special']  );
            });
            $request->session()->flash('status', 'تم الحجز بنجاح!');
            return redirect()->back();
        }

        return view('web.book')->with(compact('title'));
    }




    function contactFormValidation()
    {


        return array(
            'name' => 'string|required|max:99',

            'email' => 'required|email',

            'text' => 'required',

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
            'phone' => ' required',
            'special' => 'required|max:99',
            'message' => 'required',
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
            'message.required' => 'هذا الحقل (الرساله) مطلوب ',

        );
    }
}

