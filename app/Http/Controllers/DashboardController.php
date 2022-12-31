<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use DB;

class DashboardController extends Controller
{

    // front-end Courses
    public function IndexCourse(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != '') {
            $Courses = Course::where('title', '=', "$search")
                ->orWhere('description', '=', "$search")
                ->orWhere('course_price', '=', "$search")
                ->orWhere('duration', '=', "$search")
                ->sortable()
                ->paginate(12);
            return view('course')->with(['Courses' => $Courses, 'search' => $search]);
        } else {
            $Courses = Course::paginate(6);
            return view('course')->with(['Courses' => $Courses, 'search' => $search]);
        }
    }

    // single course view on user dashboard
    public function ViewSingleCourse($id)
    {
        $singleCourses = DB::select('select * from courses where id = ?', [$id]);
        return view('ViewSingleCourse')->with(['singleCourses' => $singleCourses]);
    }

    // about_us page on user dashboard
    public function IndexAbout()
    {
        return view('about');
    }

}