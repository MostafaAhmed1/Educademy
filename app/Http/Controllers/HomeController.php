<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $data = DB::table('courses')
                ->join("categories","categories.id","courses.category_id")
                ->select("courses.*","categories.categoryname as cat_name")
                ->get();
        return view("index",["courses"=>$data]);
    }
}