<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppUser;

class UserController extends Controller
{
    // عرض قائمة المستخدمين
    public function index()
    {
        $users = AppUser::all();
        return view('users.index', compact('users'));
    }

    // عرض نموذج إضافة مستخدم
    public function create()
    {
        return view('users.create');
    }

    // تخزين المستخدم الجديد في قاعدة بيانات المستخدمين
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'user_address' => 'nullable|string|max:255',
            'country_user' => 'nullable|string|max:255',
            'state_user' => 'nullable|string|max:255',
            'Office_name' => 'nullable|string|max:255',

        ]);
        $linkNumber = str_pad(random_int(0, 9999999999999999), 16, '0', STR_PAD_LEFT);

        AppUser::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
            'link_number' => $linkNumber,
            'user_address' => $request->user_address,  
            'country_user' => $request->country_user,  
            'state_user' => $request->state_user,      
            'Office_name' => $request->Office_name,    

        ]);


        return redirect()->route('users.index')->with('success', 'تم إضافة المستخدم بنجاح');
    }

    // عرض نموذج تعديل المستخدم
    public function edit($id)
    {
        $user = AppUser::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    // تحديث بيانات المستخدم
    public function update(Request $request, $id)
    {
        $user = AppUser::findOrFail($id);

        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,'.$user->id,
            'password' => 'nullable|string|min:6',
            'user_address' => 'nullable|string|max:255',
            'country_user' => 'nullable|string|max:255',
            'state_user' => 'nullable|string|max:255',
            'Office_name' => 'nullable|string|max:255',

        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->route('users.index')->with('success', 'تم تعديل بيانات المستخدم بنجاح');
    }
}
