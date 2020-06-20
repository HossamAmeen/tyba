<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
use App\Doctor;

class DoctorController extends Controller
{
    public function index()
    {
        $data['doctors'] = Doctor::all();
        $data['title'] = 'عرض الأطباء';
        return view('admin.control_panel.doctors.show_doctors',$data);
    }
    public function create()
    {

        $data['title'] = 'اضافه طبيب';
        return view('admin.control_panel.doctors.add_doctor',$data);
    }
    public function store(Request $request)
    {
        $rules = $this->formValidation();
        $message = $this->messageValidation();
        $this->validate($request, $rules,$message);
        $doctor = Doctor::create($request->all());
          if($request->hasFile('img'))
          {

             $photo = $request->file('img');
              $imagename = time().'.'.$photo->getClientOriginalExtension();
              $destinationPath = 'resources/assets/admin/images/';
              $thumb_img = Image::make($photo->getRealPath())->resize(400, 400);
              $thumb_img->save($destinationPath.$imagename,80);
              $doctor->img = $destinationPath.$imagename;
          }

        $doctor->user_id = session('id');
        $doctor->save();
        $request->session()->flash('status', 'تم الاضافه بنجاح');
        return redirect()->route('doctor.index');
    }
    public function edit($id)
    {

        $doctor = Doctor::find($id);
        $title = 'عرض العياده';

        if(!empty($doctor))
            return view('admin.control_panel.doctors.edit_doctor',$doctor )->with(compact('doctor', 'title') );
        else
            return redirect()->route('doctor.index');
    }
    public function update(Request $request, $id)
    {
        $rules = $this->EditformValidation($id);
        $message = $this->messageValidation();
        $this->validate($request, $rules,$message);
        $doctor = Doctor::find($id);
         $path =  $doctor->img ;
         $hasFile=false;
        if(!empty($doctor)){
            $doctor->fill($request->all());
            if($request->hasFile('img'))
             {
                 $photo = $request->file('img');
                 $imagename =   time().'.'.$photo->getClientOriginalExtension();
                 $destinationPath = 'resources/assets/admin/images/';
                 $thumb_img = Image::make($photo->getRealPath())->resize(400, 400);
                 $thumb_img->save($destinationPath.$imagename);
                  $doctor->img = $destinationPath.$imagename;
                  $hasFile=true;
             }
            $doctor->save();
        }
        if($hasFile) {

             unlink($path);
         }
        $request->session()->flash('status', 'تم التعديل بنجاح');
        return redirect()->route('doctor.index');
    }
    public function destroy(Request $request, $id)
    {
        $doctor = Doctor::find($id);
        if(!empty($doctor))
        {
            $doctor->delete();
            $request->session()->flash('delete', 'تم الحذف بنجاح');
        }

        return redirect()->route('doctor.index');
    }
    function formValidation()
    {
        return array(
            'name'     => 'required|max:99|string',
            'job' => 'required|max:99|string',
            'img'=> 'required|image',
        );
    }
    function EditformValidation($id)
    {
        return array(
            'name'     => "required|max:99|string",
            'job' => 'required|max:99|string',
             'img'=> 'image',
        );
    }
    function messageValidation(){
        return array(

            'name.required'     => 'هذا الحقل (اسم الطبيب) مطلوب ',
            'name.unique'     => 'هذا الحقل (اسم الطبيب) يوجد بالفعل ',
            'name.*'            =>  'هذا الحقل (اسم العياده) يجب يحتوي ع حروف وارقام فقط',

            'job.required'     => 'هذا الحقل (الوظيفه) مطلوب ',
            'job.*'            =>  'هذا الحقل (الوظيفه) يجب يحتوي ع حروف وارقام فقط',

              'image'            =>  'هذا الحقل (اضافه الصورة) يجب ان يكون صورة',
              'image'            =>  'هذا الحقل ( الصورة) مطلوب',
        );
    }
}
