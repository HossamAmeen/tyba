<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
use App\News;

class NewsController extends Controller
{
    public function index()
    {
        $data['news'] = News::all();
        $data['title'] = 'عرض الأخبار';
        return view('admin.control_panel.news.show_news',$data);
    }
    public function create()
    {

        $data['title'] = 'اضافه خبر';
        return view('admin.control_panel.news.add_news',$data);
    }
    public function store(Request $request)
    {
        
        $rules = $this->formValidation();
        $message = $this->messageValidation();
        $this->validate($request, $rules,$message);
        $news = News::create($request->all());
          if($request->hasFile('image'))
          {

             $photo = $request->file('image');
              $imagename = time().'.'.$photo->getClientOriginalExtension();
              $destinationPath = 'resources/assets/admin/images/';
              $thumb_img = Image::make($photo->getRealPath())->resize(400, 400);
              $thumb_img->save($destinationPath.$imagename,80);
              $news->image = $destinationPath.$imagename;
          }

        $news->user_id = session('id');
        $news->save();
        $request->session()->flash('status', 'تم الاضافه بنجاح');
        return redirect()->route('news.index');
    }
    public function edit($id)
    {

        $news = News::find($id);
        $title = 'عرض الخبر';

        if(!empty($news))
            return view('admin.control_panel.news.edit_news',$news )->with(compact('news', 'title') );
        else
            return redirect()->route('news.index');
    }
    public function update(Request $request, $id)
    {
        // return $request->all();
        $rules = $this->EditformValidation($id);
        $message = $this->messageValidation();
        $this->validate($request, $rules,$message);
        $news = news::find($id);
         $path =  $news->img ;
         $hasFile=false;
        if(!empty($news)){
            $news->fill($request->all());
            if($request->hasFile('image'))
             {
                 $photo = $request->file('image');
                 $imagename =   time().'.'.$photo->getClientOriginalExtension();
                 $destinationPath = 'resources/assets/admin/images/';
                 $thumb_img = Image::make($photo->getRealPath())->resize(400, 400);
                 $thumb_img->save($destinationPath.$imagename);
                  $news->image = $destinationPath.$imagename;
                  $hasFile=true;
             }
            $news->save();
        }
        if($hasFile) {

            //  unlink($path);
         }
        $request->session()->flash('status', 'تم التعديل بنجاح');
        return redirect()->route('news.index');
    }
    public function destroy(Request $request, $id)
    {
        $news = news::find($id);
        if(!empty($news))
        {
            $news->delete();
            $request->session()->flash('delete', 'تم الحذف بنجاح');
        }

        return redirect()->route('news.index');
    }
    function formValidation()
    {
        return array(
            'title'     => 'required|max:99|string',
            'description' => 'required',
            'image'=> 'required|image',
        );
    }
    function EditformValidation($id)
    {
        return array(
            'title'     => "required|max:99|string",
            'description' => 'required',
             'image'=> 'image',
        );
    }
    function messageValidation(){
        return array(

            'name.required'     => 'هذا الحقل (عنوان) مطلوب ',
            'name.unique'     => 'هذا الحقل (اسم الطبيب) يوجد بالفعل ',
            'name.*'            =>  'هذا الحقل (اسم العياده) يجب يحتوي ع حروف وارقام فقط',

            'job.required'     => 'هذا الحقل (الوظيفه) مطلوب ',
            'job.*'            =>  'هذا الحقل (الوظيفه) يجب يحتوي ع حروف وارقام فقط',

              'image'            =>  'هذا الحقل (اضافه الصورة) يجب ان يكون صورة',
              'image'            =>  'هذا الحقل ( الصورة) مطلوب',
        );
    }
}
