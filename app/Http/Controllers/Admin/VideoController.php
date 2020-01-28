<?php

namespace App\Http\Controllers\Admin;
use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Video;
use App\User;
use DB;
use Image;

use Illuminate\Http\Request;

class VideoController  extends Controller
{
   
    public function index()
    {
        $data['services'] =Video::all();
            
        $data['title'] = 'عرض الفديوهات';
        return view('admin.control_panel.videos.show_services',$data);
    }
    public function create()
    {

        $data['title'] = 'اضافه فديو';
        return view('admin.control_panel.videos.add_service',$data);
    }
    public function store(Request $request)
    {
        // return $request->all();
        $rules = $this->formValidation();
        $message = $this->messageValidation();
        $this->validate($request, $rules,$message);
        $service = Video::create($request->all());
    

        $service->user_id = session('id');
        $service->save();
        $request->session()->flash('status', 'تم الاضافه بنجاح');
    
      return redirect()->route('video.index');
    }
    public function edit($id)
    {
        
        $service = Video::find($id);
        $title = 'عرض الفديو ' . $service->ar_title;

        if(!empty($service))
        return view('admin.control_panel.videos.edit_service',$service )->with(compact('service', 'title') );
        else
        return redirect()->route('video.index');
    }
    public function update(Request $request, $id)
    {
        $rules = $this->EditformValidation($id);
        $message = $this->messageValidation();
        $this->validate($request, $rules,$message);
        $service = Video::find($id);
       // $path =  $service->img ;
       // $hasFile=false;
        if(!empty($service)){
            $service->fill($request->all());
           
            $service->save();
        }
       
        $request->session()->flash('status', 'تم التعديل بنجاح');
        return redirect()->route('video.index');
    }
    public function destroy(Request $request, $id)
    {
      
        $service = Video::find($id);
        if(!empty($service))
            { 
                $service->delete();
                $request->session()->flash('delete', 'تم الحذف بنجاح');
             
                return session()->get('delete') ; 
            }

        return redirect()->route('video.index');
    }
    function formValidation()
    {
       return array(
        'name'     => 'required',
        'path'     => 'required',
    
       );
    }
    function EditformValidation($id)
    {
        return array(
            'name'     => 'required',
            'path'     => 'required',
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
