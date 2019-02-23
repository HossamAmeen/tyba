<?php

namespace App\Http\Controllers\Admin;
use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Service;
use App\User;
use DB;
use Image;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
   
    public function index()
    {
        $data['services'] =Service::all();
            
        $data['title'] = 'عرض الخدمات';
        return view('admin.control_panel.services.show_services',$data);
    }
    public function create()
    {

        $data['title'] = 'اضافه خدمه';
        return view('admin.control_panel.services.add_service',$data);
    }
    public function store(Request $request)
    {
        $rules = $this->formValidation();
        $message = $this->messageValidation();
        $this->validate($request, $rules,$message);
        $service = Service::create($request->all());
    

        $service->user_id = session('id');
        $service->save();
        $request->session()->flash('status', 'تم الاضافه بنجاح');
      return redirect()->route('service.index');
    }
    public function edit($id)
    {
        
        $service = Service::find($id);
        $title = 'عرض الخدمه';

        if(!empty($service))
        return view('admin.control_panel.services.edit_service',$service )->with(compact('service', 'title') );
        else
        return redirect()->route('service.index');
    }
    public function update(Request $request, $id)
    {
        $rules = $this->EditformValidation($id);
        $message = $this->messageValidation();
        $this->validate($request, $rules,$message);
        $service = Service::find($id);
       // $path =  $service->img ;
       // $hasFile=false;
        if(!empty($service)){
            $service->fill($request->all());
           
            $service->save();
        }
       
        $request->session()->flash('status', 'تم التعديل بنجاح');
        return redirect()->route('service.index');
    }
    public function destroy(Request $request, $id)
    {
        $service = Service::find($id);
        if(!empty($service))
            { 
                $service->delete();
                $request->session()->flash('delete', 'تم الحذف بنجاح');
            }

        return redirect()->route('service.index');
    }
    function formValidation()
    {
       return array(
        'ar_title'     => 'required|max:99|unique:services,ar_title,deleted_at|regex:/^[\pL\s\d\-]+$/u',
    
       );
    }
    function EditformValidation($id)
    {
        return array(
            'ar_title'     => "required|max:99|regex:/^[\pL\s\d\-]+$/u|unique:services,ar_title,$id,id,deleted_at,NULL",
          //  'img'=> 'image',
           );
    }
    function messageValidation(){
        return array(

            'ar_title.required'     => 'هذا الحقل (العنوان بالعربيه) مطلوب ',
            'ar_title.unique'     => 'هذا الحقل (العنوان بالعربيه) يوجد بالفعل ',
            'ar_title.*'            =>  'هذا الحقل (العنوان بالعربيه) يجب يحتوي ع حروف وارقام فقط',

          //  'image'            =>  'هذا الحقل (اضافه الصورة) يجب ان يكون صورة',
        );
    }
}
