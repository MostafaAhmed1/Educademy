<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminstraionController extends Controller
{
    public function index()
    {
        $data = DB::table('users')
            ->where('usertype', '<>', 'student')
            ->orderByDesc('created_at')
            ->get();

        return view('admin.managers.index', ['data' => $data]);
    }

    public function add_admin(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phonenumber' => $request->phone,
            'usertype' => $request->type,
            'verified' => 1,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('status', 'تم تحديث البيانات بنجاح');
    }

}
