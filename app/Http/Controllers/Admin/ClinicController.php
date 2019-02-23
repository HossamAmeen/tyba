<?php

namespace App\Http\Controllers\Admin;
use App\Clinic;
use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Service;
use App\User;
use DB;
use Image;

use Illuminate\Http\Request;

class ClinicController extends Controller
{

    public function index()
    {
        $data['clinics'] = Clinic::all();
        $data['title'] = 'عرض العيادات';
        return view('admin.control_panel.clinics.show_clinics',$data);
    }
    public function create()
    {

        $data['title'] = 'اضافه عياده';
        return view('admin.control_panel.clinics.add_clinic',$data);
    }
    public function store(Request $request)
    {
        $rules = $this->formValidation();
        $message = $this->messageValidation();
        $this->validate($request, $rules,$message);
        $clinic = Clinic::create($request->all());
          if($request->hasFile('img'))
          {

             $photo = $request->file('img');
              $imagename = time().'.'.$photo->getClientOriginalExtension();
              $destinationPath = 'resources/assets/admin/images/';
              $thumb_img = Image::make($photo->getRealPath())->resize(400, 400);
              $thumb_img->save($destinationPath.$imagename,80);
              $clinic->img = $destinationPath.$imagename;
          }

        $clinic->user_id = session('id');
        $clinic->save();
        $request->session()->flash('status', 'تم الاضافه بنجاح');
        return redirect()->route('clinic.index');
    }
    public function edit($id)
    {

        $clinic = Clinic::find($id);
        $title = 'عرض العياده';

        if(!empty($clinic))
            return view('admin.control_panel.clinics.edit_clinic',$clinic )->with(compact('clinic', 'title') );
        else
            return redirect()->route('clinic.index');
    }
    public function update(Request $request, $id)
    {
        $rules = $this->EditformValidation($id);
        $message = $this->messageValidation();
        $this->validate($request, $rules,$message);
        $clinic = Clinic::find($id);
         $path =  $clinic->img ;
         $hasFile=false;
        if(!empty($clinic)){
            $clinic->fill($request->all());
            if($request->hasFile('img'))
             {
                 $photo = $request->file('img');
                 $imagename =   time().'.'.$photo->getClientOriginalExtension();
                 $destinationPath = 'resources/assets/admin/images/';
                 $thumb_img = Image::make($photo->getRealPath())->resize(400, 400);
                 $thumb_img->save($destinationPath.$imagename);
                  $clinic->img = $destinationPath.$imagename;
                  $hasFile=true;
             }
            $clinic->save();
        }
        if($hasFile) {

             unlink($path);
         }
        $request->session()->flash('status', 'تم التعديل بنجاح');
        return redirect()->route('clinic.index');
    }
    public function destroy(Request $request, $id)
    {
        $clinic = Clinic::find($id);
        if(!empty($clinic))
        {
            $clinic->delete();
            $request->session()->flash('delete', 'تم الحذف بنجاح');
        }

        return redirect()->route('clinic.index');
    }
    function formValidation()
    {
        return array(
            'name'     => 'required|max:99|unique:clinics,name,NULL,id,deleted_at,NULL|regex:/^[\pL\s\d\-]+$/u',
            'description' => 'required|max:99|regex:/^[\pL\s\d\-]+$/u',
            'img'=> 'image',
        );
    }
    function EditformValidation($id)
    {
        return array(
            'name'     => "required|max:99|regex:/^[\pL\s\d\-]+$/u|unique:clinics,name,$id,id,deleted_at,NULL",
            'description' => 'required|max:99|regex:/^[\pL\s\d\-]+$/u',
             'img'=> 'image',
        );
    }
    function messageValidation(){
        return array(

            'name.required'     => 'هذا الحقل (اسم العياده) مطلوب ',
            'name.unique'     => 'هذا الحقل (اسم العياده) يوجد بالفعل ',
            'name.*'            =>  'هذا الحقل (اسم العياده) يجب يحتوي ع حروف وارقام فقط',

            'ar_title.required'     => 'هذا الحقل (الوصف) مطلوب ',
            'ar_title.*'            =>  'هذا الحقل (الوصف) يجب يحتوي ع حروف وارقام فقط',

              'image'            =>  'هذا الحقل (اضافه الصورة) يجب ان يكون صورة',
        );
    }
}
