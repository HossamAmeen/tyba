<?php

namespace App\Http\Controllers\Admin;
use App\VisitCategory;
use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Service;
use App\User;
use DB;
use Image;

use Illuminate\Http\Request;

class VisitCategoryController extends Controller
{

    public function index()
    {
        $data['visit_categories'] = VisitCategory::all();
        $data['title'] = 'عرض تصنيف الزيارات';
        return view('admin.control_panel.visit_categories.show_visit_categories',$data);
    }
    public function create()
    {

        $data['title'] = 'اضافه تصنيف الزياره';
        return view('admin.control_panel.visit_categories.add_visit_categories',$data);
    }
    public function store(Request $request)
    {
        $rules = $this->formValidation();
        $message = $this->messageValidation();
        $this->validate($request, $rules,$message);
        $clinic = VisitCategory::create($request->all());
       

        $clinic->user_id = session('id');
        $clinic->save();
        $request->session()->flash('status', 'تم الاضافه بنجاح');
        return redirect()->route('visit-categories.index');
    }
    public function edit($id)
    {

        $clinic = VisitCategory::find($id);
        $title = 'تعديل ' . $clinic->name;

        if(!empty($clinic))
            return view('admin.control_panel.visit_categories.edit_visit_categories',$clinic )->with(compact('clinic', 'title') );
        else
            return redirect()->route('clinic.index');
    }
    public function update(Request $request, $id)
    {
        $rules = $this->EditformValidation($id);
        $message = $this->messageValidation();
        $this->validate($request, $rules,$message);
        $clinic = VisitCategory::find($id);
         $path =  $clinic->img ;
         $hasFile=false;
        if(!empty($clinic)){
            $clinic->fill($request->all());
            
            $clinic->save();
        }
        
        $request->session()->flash('status', 'تم التعديل بنجاح');
        return redirect()->route('visit-categories.index');
    }
    public function destroy(Request $request, $id)
    {
        $clinic = VisitCategory::find($id);
        if(!empty($clinic))
        {
            $clinic->delete();
            $request->session()->flash('delete', 'تم الحذف بنجاح');
        }

        return redirect()->route('visit-categories.index');
    }
    function formValidation()
    {
        return array(
            'name' => 'required',
           
        );
    }
    function EditformValidation($id)
    {
        return array(
            'name' => 'required',
        );
    }
    function messageValidation(){
        return array(
            'name.required'     => 'هذا الحقل (اسم تصنيف الزياره) مطلوب ',
        );
    }
}
