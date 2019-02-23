<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Route;
use URL;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Service;
use App\Event;
use App\Doctor;
use App\Clinic;


use DB;
use Mail;

class HomeController extends Controller
{

    public function index()
    {

        $data['services'] = Service::all();
        $data['event']    = Event::all()->first();
        $data['clinics']  = Clinic::all();
        $data['doctors']  = Doctor::all();
        $data['title']    = "مستشفى طيبه رويال";
        return view('web.index', $data);
    }

    public function services()
    {
        $data['services'] = Service::all();
        $data['title'] = "مستشفى طيبه رويال - خدماتنا";
        return view('web.services', $data);
    }

    public function clinics()
    {


        $title = "مستشفى طيبه رويال - العيادات";
        $data['clinics'] = Clinic::all();
        return view('web.clinics' , $data)->with(compact( 'title'));

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
        $data['clinics'] = Clinic::all();
        return view('web.clinics' , $data)->with(compact( 'title'));

    }
    
    public function about()
    {
        $title = "مستشفى طيبه رويال - من نحن";
        $data['doctors']  = Doctor::all();
      
        return view('web.about', $data)->with(compact('title'));

    }



    public function contact(Request $request)
    {

        $title = "مستشفى طيبه رويال - تواصل معانا";

        if ($request->isMethod('post')) {
            $rules = $this->contactFormValidation();
            $message = $this->contactMessageValidation();
            $this->validate($request, $rules, $message);
             $data=[
                 'email' =>  $request->email,
                 'name' => $request->name,
                 'phone'=>$request->phone,
                 'text'=>$request->text,
             ];
             Mail::send('web.contact_mail',$data,function($message) use ($data){
                 $pref = Pref::find(1);

                 $message->from( $data['email'] , 'kayan');
                 $message->to($pref['mainEmail']);
                 $message->subject('contact');
             });
            $request->session()->flash('status', 'send mail  was successful!');
            return redirect()->back();
        }

        return view('web.contacts')->with(compact('title'));
    }

    function jobFormValidation()
    {

        return array(
            'name' => 'required|regex:/^[\pL\s\d\-]+$/u||max:99',
            'address' => 'required|regex:/^[\pL\s\-]+$/u||max:99',
            'email' => 'required|email',
            'phone' => 'required|numeric|min:1000000000',
            'job' => 'required|regex:/^[\pL\s\-]+$/u||max:99',

        );
    }

    function jobMessageValidation()
    {
        return array(
            'name.required' => 'هذا الحقل (الاسم) مطلوب ',
            'name.*' => 'هذا الحقل (الاسم) يجب يحتوي ع حروف وارقام فقط',

            'address.required' => 'هذا الحقل (العنوان) مطلوب ',
            'address.*' => 'هذا الحقل (العنوان) يجب يحتوي ع حروف وارقام فقط',

            'email.required' => 'هذا الحقل (البريد) مطلوب ',
            'email.*' => 'هذا الحقل (البريد)يجب ان يكون بريد صحيح',

            'phone.required' => 'هذا الحقل (التلفون) مطلوب ',
            'phone.min' => 'هذا الحقل (التلفون) يجب الا يقل عن 11 رقم ',
            'phone.*' => 'هذا الحقل (التلفون) يجب يحتوي ع ارقام فقط',

            'job.required' => 'هذا الحقل (العمل) مطلوب ',
            'job.*' => 'هذا الحقل (العمل) يجب يحتوي ع حروف وارقام فقط',


        );
    }

    function contactFormValidation()
    {


        return array(
            'name' => 'regex:/^[\pL\s\d\-]+$/u||required|max:99',

            'email' => 'required|email',
            'phone' => 'required|numeric|min:1000000000',
            'text' => 'regex:/^[\pL\s\-]+$/u||required|max:99',

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
}

