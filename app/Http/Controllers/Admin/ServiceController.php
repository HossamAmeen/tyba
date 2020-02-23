<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;
use Image;

class ServiceController extends Controller
{

    public function index()
    {
        $data['services'] = Service::all();

        $data['title'] = 'عرض الخدمات';
        return view('admin.control_panel.services.show_services', $data);
    }
    public function create()
    {

        $data['title'] = 'اضافه خدمه';
        return view('admin.control_panel.services.add_service', $data);
    }
    public function store(Request $request)
    {
        $rules = $this->formValidation();
        $message = $this->messageValidation();
        $this->validate($request, $rules, $message);
        $service = Service::create($request->all());
        if ($request->hasFile('image')) {

            $photo = $request->file('image');
            $imagename = time() . '.' . $photo->getClientOriginalExtension();
            $destinationPath = 'resources/assets/admin/images/';
            $thumb_img = Image::make($photo->getRealPath())->resize(262, 250);
            $thumb_img->save($destinationPath . $imagename, 80);
            $service->image = $destinationPath . $imagename;
        }

        if ($request->hasFile('image2')) {

            $photo = $request->file('image2');
            $imagename = time() . '2.' . $photo->getClientOriginalExtension();
            $destinationPath = 'resources/assets/admin/images/';
            $thumb_img = Image::make($photo->getRealPath())->resize(555, 370);
            $thumb_img->save($destinationPath . $imagename, 80);
            $service->image2 = $destinationPath . $imagename;
        }

        $service->user_id = session('id');
        $service->save();
        $request->session()->flash('status', 'تم الاضافه بنجاح');

        return redirect()->route('service.index');
    }
    public function edit($id)
    {

        $service = Service::find($id);
        $title = 'عرض خدمة ' . $service->ar_title;

        if (!empty($service)) {
            return view('admin.control_panel.services.edit_service', $service)->with(compact('service', 'title'));
        } else {
            return redirect()->route('service.index');
        }

    }
    public function update(Request $request, $id)
    {
        $rules = $this->EditformValidation($id);
        $message = $this->messageValidation();
        $this->validate($request, $rules, $message);
        $service = Service::find($id);

        if (!empty($service)) {
            $service->fill($request->all());

            if ($request->hasFile('image')) {

                $photo = $request->file('image');
                $imagename = time() . '.' . $photo->getClientOriginalExtension();
                $destinationPath = 'resources/assets/admin/images/';
                $thumb_img = Image::make($photo->getRealPath())->resize(262, 250);
                $thumb_img->save($destinationPath . $imagename, 80);
                $service->image = $destinationPath . $imagename;
            }

            if ($request->hasFile('image2')) {

                $photo = $request->file('image2');
                $imagename = time() . '2.' . $photo->getClientOriginalExtension();
                $destinationPath = 'resources/assets/admin/images/';
                $thumb_img = Image::make($photo->getRealPath())->resize(555, 370);
                $thumb_img->save($destinationPath . $imagename, 80);
                $service->image2 = $destinationPath . $imagename;
            }
            $service->save();
        }

        $request->session()->flash('status', 'تم التعديل بنجاح');
        return redirect()->route('service.index');
    }
    public function destroy(Request $request, $id)
    {

        $service = Service::find($id);
        if (!empty($service)) {
            $service->delete();
            $request->session()->flash('status', 'تم الحذف بنجاح');

        }

        return redirect()->route('service.index');
    }
    public function formValidation()
    {
        return array(
            'ar_title' => 'required|max:99|string',

        );
    }
    public function EditformValidation($id)
    {
        return array(
            'ar_title' => "required|max:99|string",
            //  'img'=> 'image',
        );
    }
    public function messageValidation()
    {
        return array(

            'ar_title.required' => 'هذا الحقل (العنوان بالعربيه) مطلوب ',
            'ar_title.unique' => 'هذا الحقل (العنوان بالعربيه) يوجد بالفعل ',
            'ar_title.*' => 'هذا الحقل (العنوان بالعربيه) يجب يحتوي ع حروف وارقام فقط',

            //  'image'            =>  'هذا الحقل (اضافه الصورة) يجب ان يكون صورة',
        );
    }
}
