<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
use Image;
use Illuminate\Http\Request;

class UserController extends Controller
{
   
    public function index()
    {
        $data['users'] = User::all();
        $data['title'] = 'عرض المستخدمين';
        return view('admin.control_panel.users.show_users',$data);
    }
    public function create()
    {
        $data['title'] = 'اضافه مستخدم';
        return view('admin.control_panel.users.add_user',$data);
    }
    public function store(Request $request)
    {
       // return $request->file('img');
        $rules = $this->formValidation();
        $message = $this->messageValidation();
        $this->validate($request, $rules,$message);
        $user = User::create($request->all());
        
        $user->password = Hash::make($request->password);
        if($request->hasFile('img'))
        {
            $photo = $request->file('img');
            
            $imagename = time().'.'.$photo->getClientOriginalExtension();
            $destinationPath = 'resources/assets/admin/images/';
            $thumb_img = Image::make($photo->getRealPath())->resize(400, 400);
            $thumb_img->save($destinationPath.$imagename,60);
            $user->img = $destinationPath . $imagename;
           // return $user->img;
        }
        $request->session()->flash('status', 'تم الاضافه بنجاح');
        $user->save();
        return redirect()->route('user.index');
    }
    public function edit($id)
    {
        
        $user = User::find($id);
        $title = 'تعديل المستخدمين';
        $user= $user->makeVisible('password'); //// for hidden in model
        if(!empty($user))
            return view('admin.control_panel.users.edit_user',$user)->with(compact('user', 'title') );
        else
            return redirect()->route('user.index');
    }

    
    public function update(Request $request, $id)
    {
        $rules = $this->EditformValidation($id);
        $message = $this->messageValidation();
        $this->validate($request, $rules,$message);
       $user = User::find($id);
       $path =  $user->img ;
       $hasFile=false;
       $newPassword = true ; 
       if(!empty($user))
       {
            if($request->password  == $user->password){
                $newPassword = false ;
            }
                $rules = $this->EditformValidation($id);
                $this->validate($request, $rules);
                $user->fill($request->all());

            if($newPassword){
                $user->password =  Hash::make($request->password); 
            }
           if($request->hasFile('img'))
           {
               $photo = $request->file('img');
               $imagename =   time().'.'.$photo->getClientOriginalExtension();
               $destinationPath = 'resources/assets/admin/images/';
               $thumb_img = Image::make($photo->getRealPath())->resize(400, 400);
               $thumb_img->save($destinationPath.$imagename);
               $user->img = $destinationPath . $imagename;
               $hasFile=true;
           }
                $user->save();
        }
        if($hasFile) {
             unlink($path);
         }
        $request->session()->flash('status', 'تم التعديل بنجاح');
        return redirect()->route('user.index');
    }

    
    public function destroy(Request $request, $id)
    {
        $user = User::find($id);
        if(!empty($user)){
           
         $user->delete();
            $request->session()->flash('delete', 'تم الحذف بنجاح');
         }

         return redirect()->route('user.index');
    }
    
    function formValidation()
    {
       return array(
        'name'     => 'regex:/^[\pL\s\d\-]+$/u|required|max:99',
        'email'    => 'required|max:99|email|unique:users,email,deleted_at',
        'password'              => 'required | confirmed ',
        'password_confirmation' => 'required ',
        'img'=> 'image',
       );
    }
    function EditformValidation($id)
    {
        return array(
            'name'     => 'regex:/^[\pL\s\d\-]+$/u|required|max:99',
			'email'    => "required|max:99|email|unique:users,email,$id,id,deleted_at,NULL",
			'password' => 'confirmed',
            'img'=> 'image',
           );
    }
    function messageValidation(){
        return array(

            'name.required'     =>  'هذا الحقل (الاسم) مطلوب ',
            'name.*'            =>  'هذا الحقل (قسم بالعربيه) يجب يحتوي ع حروف وارقام فقط',

            'email.required'     => 'هذا الحقل (البريد) مطلوب ',
            'email.unique'     => 'هذا الحقل (البرريد) يوجد بالفعل ',
            'email.*'            =>  'هذا الحقل (البريد) يجب يحتوي ع حروف وارقام فقط ',

            'password.required'     => 'هذا الحقل (كلمه السر) مطلوب ',
            'password_confirmation.required'     => 'هذا الحقل (تاكيد كلمه السر) غير مطابق ',

            'image'            =>  'هذا الحقل (اضافه الصورة) يجب ان يكون صورة',


        );
    }
}
