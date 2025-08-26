<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function login_page()
    {
        return view('login');
    }

    public function register_page()
    {
        return view('register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ], [
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.email' => 'البريد الإلكتروني يجب أن يكون صحيحاً',
            'password.required' => 'كلمة المرور مطلوبة',
            'password.string' => 'كلمة المرور يجب أن تكون نص',
            'password.min' => 'كلمة المرور يجب أن تكون 6 أحرف على الأقل'
        ]);

        try {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials, $request->boolean('remember'))) {
                $request->session()->regenerate();
                return redirect()->route('home')
                    ->with('success', 'تم تسجيل الدخول بنجاح! مرحباً بك 🎉');
            }

            throw ValidationException::withMessages([
                'email' => 'بيانات الاعتماد المقدمة غير صحيحة.',
            ]);

        } catch (ValidationException $e) {
            return back()
                ->withInput($request->only('email'))
                ->withErrors($e->errors());
        } catch (\Exception $e) {
            return back()
                ->withInput($request->only('email'))
                ->with('error', 'حدث خطأ أثناء تسجيل الدخول. يرجى المحاولة مرة أخرى.');
        }
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.required' => 'الاسم مطلوب',
            'name.string' => 'الاسم يجب أن يكون نص',
            'name.max' => 'الاسم لا يمكن أن يتجاوز 255 حرف',
            'phone.required' => 'رقم الهاتف مطلوب',
            'phone.string' => 'رقم الهاتف يجب أن يكون نص',
            'phone.max' => 'رقم الهاتف لا يمكن أن يتجاوز 20 رقم',
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.string' => 'البريد الإلكتروني يجب أن يكون نص',
            'email.email' => 'البريد الإلكتروني يجب أن يكون صحيحاً',
            'email.max' => 'البريد الإلكتروني لا يمكن أن يتجاوز 255 حرف',
            'email.unique' => 'البريد الإلكتروني مستخدم بالفعل',
            'password.required' => 'كلمة المرور مطلوبة',
            'password.string' => 'كلمة المرور يجب أن تكون نص',
            'password.min' => 'كلمة المرور يجب أن تكون 8 أحرف على الأقل',
            'password.confirmed' => 'تأكيد كلمة المرور غير متطابق'
        ]);
        
        try {
            $user = User::create([
                'name' => $data['name'],
                'phone' => $data['phone'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'status' => 'active',
                'role' => 'investor'
            ]);

            Auth::login($user);

            return redirect()->route('home')
                ->with('success', 'تم إنشاء الحساب بنجاح! مرحباً بك ' . $user->name . ' 🎉');
                
        } catch (\Exception $e) {
            return back()
                ->withInput($request->except('password', 'password_confirmation'))
                ->with('error', 'حدث خطأ أثناء إنشاء الحساب. يرجى المحاولة مرة أخرى.');
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();
            
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('home')
                ->with('success', 'تم تسجيل الخروج بنجاح! نراك قريباً 👋');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'حدث خطأ أثناء تسجيل الخروج. يرجى المحاولة مرة أخرى.');
        }
    }

    public function profile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ], [
            'name.required' => 'الاسم مطلوب',
            'name.string' => 'الاسم يجب أن يكون نص',
            'name.max' => 'الاسم لا يمكن أن يتجاوز 255 حرف',
            'phone.required' => 'رقم الهاتف مطلوب',
            'phone.string' => 'رقم الهاتف يجب أن يكون نص',
            'phone.max' => 'رقم الهاتف لا يمكن أن يتجاوز 20 رقم',
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.string' => 'البريد الإلكتروني يجب أن يكون نص',
            'email.email' => 'البريد الإلكتروني يجب أن يكون صحيحاً',
            'email.max' => 'البريد الإلكتروني لا يمكن أن يتجاوز 255 حرف',
            'email.unique' => 'البريد الإلكتروني مستخدم بالفعل'
        ]);

        try {
            User::where('id', $user->id)->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
            ]);

            return redirect()->back()
                ->with('success', 'تم تحديث الملف الشخصي بنجاح! ✨');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'حدث خطأ أثناء تحديث الملف الشخصي. يرجى المحاولة مرة أخرى.');
        }
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'current_password.required' => 'كلمة المرور الحالية مطلوبة',
            'current_password.string' => 'كلمة المرور الحالية يجب أن تكون نص',
            'password.required' => 'كلمة المرور الجديدة مطلوبة',
            'password.string' => 'كلمة المرور الجديدة يجب أن تكون نص',
            'password.min' => 'كلمة المرور الجديدة يجب أن تكون 8 أحرف على الأقل',
            'password.confirmed' => 'تأكيد كلمة المرور الجديدة غير متطابق'
        ]);

        try {
            $user = Auth::user();
            
            if (!Hash::check($request->current_password, $user->password)) {
                return back()
                    ->withErrors(['current_password' => 'كلمة المرور الحالية غير صحيحة']);
            }

            User::where('id', $user->id)->update([
                'password' => Hash::make($request->password)
            ]);

            return redirect()->back()
                ->with('success', 'تم تغيير كلمة المرور بنجاح! 🔐');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'حدث خطأ أثناء تغيير كلمة المرور. يرجى المحاولة مرة أخرى.');
        }
    }
}
