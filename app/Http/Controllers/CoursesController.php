<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
{
    public function course_id($id){
        $data = DB::table('courses')
                ->join("categories","categories.id","courses.category_id")
                ->select("courses.*","categories.categoryname as cat_name")
                ->where("courses.id",$id)->first();
        return view("courses.show",["course"=>$data]);
    }

    public function course_join($id){
        $data = DB::table('courses')
                ->join("categories","categories.id","courses.category_id")
                ->select("courses.*","categories.categoryname as cat_name")
                ->where("courses.id",$id)->first();

        return view("courses.enroll",["course"=>$data]);
    }

    public function course_join_post(Request $request,$id){

        $img = $request->file("img");
        $imageName = time().'.'.$img->extension();
        $img->move('uploaded/payment', $imageName);
        $path = 'uploaded/payment/'.$imageName;
        DB::table('payments')->insert(["id_course"=>$id,"id_std"=>auth()->user()->id,"img"=>$path,"created_at"=>date("Y-m-d H:i:s")]);
        return  redirect()->back();
    }

    public function playlist($id){
        $data = DB::table('crs_videos')
        ->join("courses","courses.id","crs_videos.vid")
        ->join("categories","categories.id","courses.category_id")
        ->select("courses.*","categories.categoryname as cat_name","crs_videos.vid")
        ->where("courses.id", $id)->first();

        return view("courses.playlist",["course"=>$data]);
    }
    
    public function contetn_show()
    {
        $data = DB::table('courses')
                ->join("categories","categories.id","courses.category_id")
                ->join("chapters", "courses.id", "chapters.course_id")
                ->select("courses.*","categories.categoryname", "chapters.chaptername", "chapters.id as chapter_id")
                ->get();

        return view("admin.contents.index", ["course" => $data]);
    }

    public function contetn_add(Request $request)
    {
        $messages = [
            "title" => 'عنوان الملف',
            "category_id" => 'الباب او الفصل',
        ];

        request()->validate([
            "title" => ['required', 'string',],
            "category_id" => ['required', 'int',],
        ], [], $messages);

        $catid = addslashes(htmlspecialchars($request->input("category_id")));
        $title = addslashes(htmlspecialchars($request->input("title")));
        $photo = $request->file("img");
        
        $path = '';
        if($photo)
        {
            $imageName = time().'.'.$photo->extension();
            $photo->move('uploaded/courses/' . $catid, $imageName);
            $path = 'uploaded/courses/' . $catid . '/'.$imageName;
        }

        DB::table('courses')
        ->insert([
            'title' => $title,
            'category_id' => $catid,
            'vid' => $path,
        ]);

        return redirect()->back()->with('status', 'تم تحديث البيانات بنجاح');
    }



}