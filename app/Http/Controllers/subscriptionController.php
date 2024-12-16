<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class subscriptionController extends Controller
{
    public function index()
    {
        $data = DB::table('payments')
            ->join("users", "id_std", "users.id")
            ->join("courses", "id_course", "courses.id")
            ->where('usertype', 'student')
            ->where('verified', '1')
            ->select("courses.*", "payments.*", "payments.id as pay_id", "users.*")
            ->orderByDesc('payments.created_at')
            ->get();

        return view('admin.subscription.index', ['data' => $data]);
    }

    public function approve($id)
    {
        DB::table('payments')
            ->where('id', $id)
            ->update([
                'accept' => 1,
            ]);

        $data = DB::table('payments')
            ->where('id', $id)
            ->first();

        DB::table('crs_std')
            ->insert([
                'id_course' => $data->id_course,
                'id_std' => $data->id_std,
                'video' => '',
                'created_at' => date('Y-m-d'),
            ]);

        return redirect()->back()->with('status', 'تم تحديث البيانات بنجاح');
    }

    public function students()
    {
        $data = DB::table('users')
            ->where('usertype', 'student')
            ->orderByDesc('created_at')
            ->get();

        return view('admin.subscription.students', ['data' => $data]);
    }

    public function enable($v, $id)
    {
        DB::table('users')
            ->where('id', $id)
            ->update([
                'verified' => (int)$v,
            ]);

        return redirect()->back()->with('status', 'تم تحديث البيانات بنجاح');
    }

}
