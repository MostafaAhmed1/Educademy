<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        
        if (Auth::user()->verified == 1)
        {
            if (Auth::user()->usertype == 'student')
            {
                $joind = DB::table('crs_std')
                    ->join("courses","courses.id","crs_std.id_course")
                    ->join("categories","categories.id","courses.category_id")
                    ->where("crs_std.id_std", Auth::user()->id)
                    ->select("courses.*","categories.categoryname")->get();

                $other = DB::table('courses')
                    ->join("categories", "courses.category_id", "categories.id")
                    ->join("crs_std","courses.id","crs_std.id_course")
                    ->where("crs_std.id_std", "<>", Auth::user()->id)
                    ->select("courses.*","categories.categoryname")->get();

                return view("student.dashboard",["courses" => $joind, "other" => $other]);
            }
            else
            {
                return view('admin/dashboard');
            }
        }
        else
        {
            return view('unverified');
        }
    }
}