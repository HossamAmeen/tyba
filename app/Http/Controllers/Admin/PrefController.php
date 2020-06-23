<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Pref;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mail;

class PrefController extends Controller
{
    public function login(Request $request)
    {

        if (session('id')) {
            return redirect()->route('prefs.index');
        }
        if ($request->isMethod('post')) {
            $user = User::where('name', $request->name)->first();
            if (!empty($user)) {
                $user = $user->makeVisible('password');

                if (User::where('name', $request->name)->exists() && Hash::check($request->password, $user->password)) {
                    session(['id' => $user->id]);
                    session(['role' => $user->role]);
                    if($user->role == 1)
                    return redirect()->route('prefs.index');
                    elseif($user->role == 0)
                    return redirect()->route('service.index');
                    else 
                    return redirect()->route('books.index');
                } else {
                    $request->session()->flash('status', 'password is wrong!! try again please!');
                }

            } else {
                $request->session()->flash('status', 'username  is wrong!! try again please!');
            }

        }
        $title = 'تسجيل الدخول';
        return view('admin.login')->with(compact('title'));
    }
    public function logout(Request $request)
    {
        $request->session()->forget(['id', 'role']);

        $title = 'تسجيل الدخول';
        return view('admin.login')->with(compact('title'));
    }
    public function sendToken(Request $request)
    {

        if ($request->isMethod('post')) {

            $user = User::where('email', $request->email)->first();

            if (!empty($user)) {
                $rules = $this->formValidation();
                $message = $this->messageValidation();
                $this->validate($request, $rules, $message);

                $user->remember_token = md5(rand(1, 10) . microtime());
                $user->save();

                $data = [
                    'email' => $request->email,
                    'token' => $user->remember_token,
                    'id' => $user->id,

                ];
                Mail::send('admin.mail_send_token', $data, function ($message) use ($data) {

                    $message->from('info@tibaroyal.com');
                    $message->to($data['email']);
                    $message->subject('reset password');
                });
                $request->session()->flash('status', 'check your email to reset password , please!');
                return redirect()->route('login');
            }

        }

    }
    public function paswordreset(Request $request, $id, $token)
    {
        if ($request->isMethod('post')) {
            $user = User::find($id);
            if ($user->remember_token == $token) {

                $rules = $this->passwordValidation();
                $message = $this->passwordMessageValidation();
                $this->validate($request, $rules, $message);

                $user->password = Hash::make($request->password);
                $user->save();
                return redirect()->route('login');
            }
        }
        $user = User::find($id);
        if ($user->remember_token == $token) {
            return view('admin.resetpassword', compact('id', 'token'));
        }
        return redirect()->route('login');
    }
    public function index()
    {
        $mPref = Pref::find(1);
        $title = 'اضافه بيانات الموقع';

        if (empty($mPref)) {
            return view('admin.control_panel.prefs.add_pref')->with(compact('title'));
        } else {
            return redirect()->route('prefs.edit', ['id' => 1]);
        }

    }
    public function store(Request $request)
    {

        $rules = $this->formValidation();
        $message = $this->messageValidation();
        $this->validate($request, $rules, $message);
        $pref = Pref::create($request->all());
        $pref->user_id = session('id');
        $pref->save();
        $request->session()->flash('status', 'add was successful!');
        return redirect()->route('prefs.index');
    }
    public function edit(Request $request, $id)
    {
        $pref = Pref::find($id);
        $title = 'تعديل بيانات الموقع';
        if (!empty($pref)) {

            return view('admin.control_panel.prefs.edit_pref', $pref)->with(compact('title'));

        } else {
            return redirect()->route('prefs.index');
        }

    }
    public function update(Request $request, $id)
    {
        // return $request;
        $rules = $this->formValidation();
        $message = $this->messageValidation();
        $this->validate($request, $rules, $message);
        $pref = Pref::find($id);
        if (!empty($pref)) {
            $pref->fill($request->all());
            $pref->save();

        }

        $request->session()->flash('status', 'تم التعديل بنجاح');
        return redirect()->route('prefs.index');
    }
    public function formValidation()
    {

        return array(

        );
    }
    public function messageValidation()
    {
        return array(

        );
    }
    public function passwordValidation()
    {
        return array(

            'password' => 'required | confirmed ',
            'password_confirmation' => 'required ',

        );
    }
    public function passwordMessageValidation()
    {
        return array(

            'password.required' => 'هذا الحقل (كلمه المرور) مطلوب ',
            'password.confirmed' => 'كلمة المرور غير متطابقه ',

        );
    }
}
