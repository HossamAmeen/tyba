<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
use App\Event;

class EventController extends Controller
{
    public function index()
    {
        $data['events'] = Event::all();
        $data['title'] = 'عرض الزيارات';
        return view('admin.control_panel.events.show_events',$data);
    }
    public function create()
    {

        $data['title'] = 'اضافه زياره';
        return view('admin.control_panel.events.add_event',$data);
    }
    public function store(Request $request)
    {
        $rules = $this->formValidation();
        $message = $this->messageValidation();
        $this->validate($request, $rules,$message);
        $event = Event::create($request->all());
          if($request->hasFile('img'))
          {

             $photo = $request->file('img');
              $imagename = time().'.'.$photo->getClientOriginalExtension();
              $destinationPath = 'resources/assets/admin/images/';
              $thumb_img = Image::make($photo->getRealPath())->resize(400, 400);
              $thumb_img->save($destinationPath.$imagename,80);
              $event->img = $destinationPath.$imagename;
          }

        $event->user_id = session('id');
        $event->save();
        $request->session()->flash('status', 'تم الاضافه بنجاح');
        return redirect()->route('event.index');
    }
    public function edit($id)
    {

        $event = Event::find($id);
        $title = 'عرض العياده';

        if(!empty($event))
            return view('admin.control_panel.events.edit_event',$event )->with(compact('event', 'title') );
        else
            return redirect()->route('event.index');
    }
    public function update(Request $request, $id)
    {
        $rules = $this->EditformValidation($id);
        $message = $this->messageValidation();
        $this->validate($request, $rules,$message);
        $event = Event::find($id);
         $path =  $event->img ;
         $hasFile=false;
        if(!empty($event)){
            $event->fill($request->all());
            if($request->hasFile('img'))
             {
                 $photo = $request->file('img');
                 $imagename =   time().'.'.$photo->getClientOriginalExtension();
                 $destinationPath = 'resources/assets/admin/images/';
                 $thumb_img = Image::make($photo->getRealPath())->resize(400, 400);
                 $thumb_img->save($destinationPath.$imagename);
                  $event->img = $destinationPath.$imagename;
                  $hasFile=true;
             }
            $event->save();
        }
        if($hasFile) {

             unlink($path);
         }
        $request->session()->flash('status', 'تم التعديل بنجاح');
        return redirect()->route('event.index');
    }
    public function destroy(Request $request, $id)
    {
        $event = Event::find($id);
        if(!empty($event))
        {
            $event->delete();
            $request->session()->flash('delete', 'تم الحذف بنجاح');
        }

        return redirect()->route('event.index');
    }
    function formValidation()
    {
        return array( 
            'name'     => 'required|max:99|unique:events,name,NULL,id,deleted_at,NULL|regex:/^[\pL\s\d\-]+$/u',
            'description' => 'required|max:99|regex:/^[\pL\s\d\-]+$/u',
            
            'img'=> 'image',
        );
    }
    function EditformValidation($id)
    {
        return array(
            'name'     => "required|max:99|regex:/^[\pL\s\d\-]+$/u|unique:events,name,$id,id,deleted_at,NULL",
                                                                  
            'description' => 'required|max:99|regex:/^[\pL\s\d\-]+$/u',
            'date' => 'required',
             'img'=> 'required|image',
        );
    }
    function messageValidation(){
        return array(

            'name.required'     => 'هذا الحقل (عنوان الزياره) مطلوب ',
            'name.unique'     => 'هذا الحقل (عنوان الزياره) يوجد بالفعل ',
            'name.*'            =>  'هذا الحقل (عنوان الزياره) يجب يحتوي ع حروف وارقام فقط',

            'description.required'     => 'هذا الحقل (الوصف) مطلوب ',
            'description.*'            =>  'هذا الحقل (الوصف) يجب يحتوي ع حروف وارقام فقط',

            'date.required'     => 'هذا الحقل (المعاد) مطلوب ',
              'image'            =>  'هذا الحقل (اضافه الصورة) يجب ان يكون صورة',
              'image'            =>  'هذا الحقل ( الصورة) مطلوب',
        );
    }
}
