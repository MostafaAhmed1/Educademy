<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    //------------------------------------------>>> categories
    public function grades()
    {
        $data = DB::table('categories')->get();

        return view('admin.cats.grades.index', ['grades' => $data]);
    }

    public function grades_add(Request $request)
    {
        $messages = [
            "name" => 'الاسم',
        ];

        request()->validate([
            "name" => ['required', 'string',],
        ], [], $messages);

        $name = addslashes(htmlspecialchars($request->input("name")));

        DB::table('categories')
        ->insert([
            'categoryname' => $name,
        ]);

        return redirect()->back()->with('status', 'تم تحديث البيانات بنجاح');
    }

    public function grades_edit(Request $request, $id)
    {
        $messages = [
            "name" => 'الاسم',
        ];

        request()->validate([
            "name" => ['required', 'string',],
        ], [], $messages);

        $name = addslashes(htmlspecialchars($request->input("name")));

        DB::table('categories')
        ->where('id', $id)
        ->update([
            'categoryname' => $name,
        ]);

        return redirect()->back()->with('status', 'تم تحديث البيانات بنجاح');
    }

    public function grades_delete($id)
    {
        $id = (int) $id;
        $dataCH = DB::table('categories')
            ->where("id", $id)
            ->get();
        if($dataCH->count() == 0 ){
            return redirect()->back()->withErrors('حدث خطأ اثناء تنفيذ العملية');
        }

        DB::table('chapters')
            ->where('category_id', $id)
            ->delete();

        DB::table('courses')
            ->where('category_id', $id)
            ->delete();

        DB::table('categories')
            ->where('id', $id)
            ->delete();

        return redirect()->back()->with('status', 'تم تحديث البيانات بنجاح');
    }

    //------------------------------------------>>> courses
    public function courses()
    {
        $cats = DB::table('categories')->get();
        $data = DB::table('categories')
            ->join('courses', 'category_id', 'categories.id')
            ->selectRaw('courses.id courseid, coursename, category_id, categoryname, courseyear, courseprice, pic')
            ->orderBy('category_id')
            ->get();

        return view('admin.cats.courses.index', ['courses' => $data, 'grades' => $cats]);
    }
    
    public function courses_add(Request $request)
    {
        $messages = [
            "name" => 'الاسم',
            "year" => 'العام الدراسى',
            "category_id" => 'المرحلة التعليمية',
        ];

        request()->validate([
            "name" => ['required', 'string',],
            "year" => ['required', 'string',],
            "category_id" => ['required', 'int',],
        ], [], $messages);

        $name = addslashes(htmlspecialchars($request->input("name")));
        $year = addslashes(htmlspecialchars($request->input("year")));
        $catid = addslashes(htmlspecialchars($request->input("category_id")));
        $price = addslashes(htmlspecialchars($request->input("price")));
        $photo = $request->file("img");
        
        $path = '';
        if($photo)
        {
            $imageName = time().'.'.$photo->extension();
            $photo->move('uploaded/courses', $imageName);
            $path = 'uploaded/courses/'.$imageName;
        }

        DB::table('courses')
        ->insert([
            'coursename' => $name,
            'courseyear' => $year,
            'courseprice' => $price,
            'category_id' => $catid,
            'pic' => $path,
        ]);

        return redirect()->back()->with('status', 'تم تحديث البيانات بنجاح');
    }

    public function courses_edit(Request $request, $id)
    {
        $messages = [
            "name" => 'الاسم',
            "year" => 'العام الدراسى',
            "category_id" => 'المرحلة التعليمية',
        ];

        request()->validate([
            "name" => ['required', 'string',],
            "year" => ['required', 'string',],
            "category_id" => ['required', 'int',],
        ], [], $messages);

        $name = addslashes(htmlspecialchars($request->input("name")));
        $year = addslashes(htmlspecialchars($request->input("year")));
        $catid = addslashes(htmlspecialchars($request->input("category_id")));
        $price = addslashes(htmlspecialchars($request->input("price")));
        $photo = $request->file("img");

        $old = DB::table('courses')
            ->where("id",$id)
            ->first();

        $path = $old->pic;
        if($photo)
        {
            if ($old->pic != null && is_writeable(realpath($old->pic)))
            {
                unlink(realpath($old->pic));
            }
            $imageName = time().'.'.$photo->extension();
            $photo->move('uploaded/courses', $imageName);
            $path = 'uploaded/courses/'.$imageName;
        }

        DB::table('courses')
        ->where('id', $id)
        ->update([
            'coursename' => $name,
            'courseyear' => $year,
            'courseprice' => $price,
            'category_id' => $catid,
            'pic' => $path,
        ]);

        return redirect()->back()->with('status', 'تم تحديث البيانات بنجاح');
    }

    public function courses_delete($id)
    {
        $id = (int) $id;
        $dataCH = DB::table('courses')
            ->where("id",$id)
            ->get();
        if($dataCH->count() == 0 ){
            return redirect()->back()->withErrors('حدث خطأ اثناء تنفيذ العملية');
        }

        DB::table('chapters')
            ->where('course_id', $id)
            ->delete();

        DB::table('courses')
            ->where('id', $id)
            ->delete();

        return redirect()->back()->with('status', 'تم تحديث البيانات بنجاح');
    }

    //------------------------------------------>>> chapters
    public function chapters()
    {
        $courses = DB::table('categories')
            ->join('courses', 'category_id', 'categories.id')
            ->selectRaw('courses.id courseid, coursename, category_id, categoryname, courseyear')
            ->orderBy('category_id')
            ->get();

        $data = DB::table('categories')
            ->join('courses', 'category_id', 'categories.id')
            ->join('chapters', 'course_id', 'courses.id')
            ->selectRaw('course_id, coursename, chapters.category_id, categoryname, courseyear, chapters.id chapterid, chaptername')
            ->orderBy('chapters.category_id')
            ->orderBy('course_id')
            ->get();

        return view('admin.cats.chapters.index', ['chaps' => $data, 'courses' => $courses]);
    }
    
    public function chapters_add(Request $request)
    {
        $messages = [
            "name" => 'الاسم',
            "courseid" => 'الكورس / المادة',
        ];

        request()->validate([
            "name" => ['required', 'string',],
            "courseid" => ['required', 'int',],
        ], [], $messages);

        $name = addslashes(htmlspecialchars($request->input("name")));
        $courseid = addslashes(htmlspecialchars($request->input("courseid")));

        $crs = DB::table('courses')
            ->where('id', $courseid)
            ->first();

        DB::table('chapters')
            ->insert([
                'chaptername' => $name,
                'course_id' => $courseid,
                'category_id' => $crs->category_id,
            ]);

        return redirect()->back()->with('status', 'تم تحديث البيانات بنجاح');
    }

    public function chapters_edit(Request $request, $id)
    {
        $messages = [
            "name" => 'الاسم',
            "courseid" => 'الكورس / المادة',
        ];

        request()->validate([
            "name" => ['required', 'string',],
            "courseid" => ['required', 'int',],
        ], [], $messages);

        $name = addslashes(htmlspecialchars($request->input("name")));
        $courseid = addslashes(htmlspecialchars($request->input("courseid")));

        $crs = DB::table('courses')
            ->where('id', $courseid)
            ->first();

        DB::table('chapters')
            ->where('id', $id)
            ->update([
                'chaptername' => $name,
                'course_id' => $courseid,
                'category_id' => $crs->category_id,
            ]);

        return redirect()->back()->with('status', 'تم تحديث البيانات بنجاح');
    }

    public function chapters_delete($id)
    {
        $id = (int) $id;
        $dataCH = DB::table('chapters')
            ->where("id",$id)
            ->get();
        if($dataCH->count() == 0 ){
            return redirect()->back()->withErrors('حدث خطأ اثناء تنفيذ العملية');
        }

        DB::table('chapters')
            ->where('course_id', $id)
            ->delete();

        return redirect()->back()->with('status', 'تم تحديث البيانات بنجاح');
    }


    // Multiple File Selection: To allow users to select multiple files at once, add the multiple attribute:
    // <input type="file" id="myFiles" name="files[]" multiple>
}
