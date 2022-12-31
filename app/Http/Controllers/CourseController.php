<?php

namespace App\Http\Controllers;

use App\Models\Course_Category;
use App\Models\Course_Sub_Category;
use DB;
use App\Models\Course;
use App\Models\Cart;
use App\Models\Topic;
use App\Models\Speaker;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    // -----------------------------------  Courses  -----------------------------------------

    // function to show all courses on admin panel 
    public function adminSide_Courses(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != '') {
            $topics = Topic::all();
            $speakers = Speaker::all();
            $adminCourses = Course::with('Speaker')->with('Topic')
                ->where('title', '=', "$search")
                ->orWhere('description', '=', "$search")
                ->orWhere('course_price', '=', "$search")
                ->orWhere('duration', '=', "$search")
                ->sortable()
                ->paginate(9);
            return view('admin_side_courses')->with(['adminCourses' => $adminCourses, 'topics' => $topics, 'speakers' => $speakers, 'search' => $search]);
        } else {
            $topics = Topic::all();
            $speakers = Speaker::all();
            $adminCourses = Course::with('Speaker')->with('Topic')->sortable()->paginate(9);
            return view('admin_side_courses')->with(['adminCourses' => $adminCourses, 'topics' => $topics, 'speakers' => $speakers, 'search' => $search]);

        }
    }

    // function to add new courses on admin panel
    public function adminSide_AddCourses(Request $request)
    {
        $validate = $request->validate([
            'topic_id' => ['required'],
            'speaker_id' => ['required'],
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'video' => ['required', 'string'],
            'course_price' => ['required', 'string'],
            'duration' => ['required', 'string'],
        ]);

        $topic_id = $request->input('topic_id');
        $speaker_id = $request->input('speaker_id');
        $title = $request->input('title');
        $description = $request->input('description');
        $video = $request->input('video');
        $course_price = $request->input('course_price');
        $duration = $request->input('duration');

        $allCourses = array('topic_id' => $topic_id, 'speaker_id' => $speaker_id, 'title' => $title, 'description' => $description, 'video' => $video, 'course_price' => $course_price, 'duration' => $duration, );

        DB::table('courses')->insert($allCourses);

        return redirect()->back()->with('message', 'Course Added successfully!!');
    }

    // function to show single course on new editCourses_page
    public function adminSide_showCourse($id)
    {
        $topics = Topic::all();
        $speakers = Speaker::all();
        $EditCourse = DB::select('select * from courses where id = ?', [$id]);
        return view('editCourses')->with(['topics' => $topics, 'speakers' => $speakers, 'EditCourse' => $EditCourse]);
    }

    // function to edit single course at a time
    public function adminSide_EditCourse(Request $request, $id)
    {
        $validated = $request->validate([
            'topic_id' => ['required'],
            'speaker_id' => ['required'],
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'course_price' => ['required', 'string'],
            'duration' => ['required', 'string'],
        ]);

        $EditCourse = Course::whereId($id)->first();
        $EditCourse->title = $request->input('title');
        $EditCourse->description = $request->input('description');
        $EditCourse->topic_id = $request->input('topic_id');
        $EditCourse->speaker_id = $request->input('speaker_id');
        $EditCourse->course_price = $request->input('course_price');
        $EditCourse->duration = $request->input('duration');
        $EditCourse->save();
        return redirect()->back()->with('message', 'Course Edited successfully!!');
    }

    // function to delete single course at a time on admin panel
    public function adminSide_DeleteCourse($id)
    {
        $delete = DB::select('delete from courses where id = ?', [$id]);
        return redirect()->back()->with('message', 'Course Deleted successfully!!');
    }

    // function to view single course at a time on admin panel
    public function adminSide_ViewCourse($id)
    {
        $topics = Topic::all();
        $speakers = Speaker::all();
        $viewCourse = DB::select('select * from courses where id = ?', [$id]);
        return view('viewCourses')->with(['topics' => $topics, 'speakers' => $speakers, 'viewCourse' => $viewCourse]);
    }


    // -----------------------------------  Topics  -----------------------------------------


    // function to show all topics on admin panel
    public function adminSide_Topics(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != '') {
            $topics = Topic::where('title', '=', "$search")
                ->orWhere('id', '=', "$search")
                ->sortable()
                ->paginate(12);
            return view('adminSide_topics')->with(['topics' => $topics, 'search' => $search]);
        } else {
            $topics = Topic::sortable()->paginate(8);
            return view('adminSide_topics')->with(['topics' => $topics, 'search' => $search]);
        }
    }

    // function to add new courses on admin panel
    public function adminSide_AddTopics(Request $request)
    {
        $validate = $request->validate([
            'title' => ['required', 'string'],
        ]);

        $title = $request->input('title');

        $newTopic = array('title' => $title);

        DB::table('topics')->insert($newTopic);

        return redirect()->back()->with('message', 'Topic Added successfully!!');
    }

    // function to delete single topic at a time on admin panel
    public function adminSide_DeleteTopics($id)
    {
        $delete = DB::select('delete from topics where id = ?', [$id]);
        return redirect()->back()->with('message', 'Topic Deleted successfully!!');
    }

    // function to show single topic on new editTopics_page
    public function adminSide_showTopics($id)
    {
        $EditTopic = DB::select('select * from topics where id = ?', [$id]);
        return view('editTopics')->with(['EditTopic' => $EditTopic]);
    }

    // function to edit single course at a time
    public function adminSide_EditTopics(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => ['required', 'string'],
        ]);

        $EditTopic = Topic::whereId($id)->first();
        $EditTopic->title = $request->input('title');
        $EditTopic->save();
        return redirect()->back()->with('message', 'Topic Edited successfully!!');
    }

    // -----------------------------------  CourseSubCat  -----------------------------------------


    // function to show all CourseSubCat on admin panel 
    public function adminSide_CourseSubCat(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != '') {
            $CourseSubCats = Course_Sub_Category::where('id', '=', "$search")
                ->orWhere('course_sub_name', '=', "$search")
                ->sortable()
                ->paginate(12);
            return view('CourseSubCat')->with(['CourseSubCats' => $CourseSubCats, 'search' => $search]);
        } else {
            $CourseSubCats = Course_Sub_Category::with('Topic')->sortable()->paginate(6);
            return view('CourseSubCat')->with(['CourseSubCats' => $CourseSubCats, 'search' => $search]);
        }
    }

    // function to add new CourseSubCat on admin panel
    public function adminSide_AddCourseSubCat(Request $request)
    {
        $validate = $request->validate([
            'topic_id' => ['required'],
            'course_sub_name' => ['required', 'string'],
        ]);

        $topic_id = $request->input('topic_id');
        $course_sub_name = $request->input('course_sub_name');

        $allCourseSubCats = array('topic_id' => $topic_id, 'course_sub_name' => $course_sub_name);

        DB::table('course_sub_categories')->insert($allCourseSubCats);

        return redirect()->back()->with('message', 'Course Sub Category Added successfully!!');
    }

    // function to show single CourseSubCat on new editCourseSubCat_page
    public function adminSide_showCourseSubCat($id)
    {
        $topics = Topic::all();
        $EditallCourseSubCat = DB::select('select * from course_sub_categories where id = ?', [$id]);
        return view('EditCourseSubCat')->with(['topics' => $topics, 'EditallCourseSubCat' => $EditallCourseSubCat]);
    }

    // function to edit single CourseSubCat at a time
    public function adminSide_EditCourseSubCat(Request $request, $id)
    {
        $validated = $request->validate([
            'topic_id' => ['required'],
            'course_sub_name' => ['required', 'string'],
        ]);

        $EditCourseSubCat = Course_Sub_Category::whereId($id)->first();
        $EditCourseSubCat->topic_id = $request->input('topic_id');
        $EditCourseSubCat->course_sub_name = $request->input('course_sub_name');
        $EditCourseSubCat->save();
        return redirect()->back()->with('message', 'Course Sub Category Edited successfully!!');
    }

    // function to delete single CourseSubCat at a time on admin panel
    public function adminSide_DeleteCourseSubCat($id)
    {
        $delete = DB::select('delete from course_sub_categories where id = ?', [$id]);
        return redirect()->back()->with('message', 'Course Sub Category Deleted successfully!!');
    }

    // -----------------------------------  CourseCat  -----------------------------------------


    // function to show all CourseCat on admin panel 
    public function adminSide_CourseCat(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != '') {
            $CourseCats = Course_Category::where('course_cat_name', '=', "$search")
                ->get();
            return view('CourseCat')->with(['CourseCats' => $CourseCats, 'search' => $search]);
        } else {
            $CourseCats = Course_Category::with('course_Sub_Category')->get();
            return view('CourseCat')->with(['CourseCats' => $CourseCats, 'search' => $search]);
        }

    }

    // function to add new CourseCat on admin panel
    public function adminSide_AddCourseCat(Request $request)
    {
        $validate = $request->validate([
            'course_sub_id' => ['required'],
            'course_cat_name' => ['required', 'string'],
        ]);

        $course_sub_id = $request->input('course_sub_id');
        $course_cat_name = $request->input('course_cat_name');

        $allCourseCats = array('course_sub_id' => $course_sub_id, 'course_cat_name' => $course_cat_name);

        DB::table('course_categories')->insert($allCourseCats);

        return redirect()->back()->with('message', 'Course Category Added successfully!!');
    }

    // function to show single CourseCat on new editCourseCat_page
    public function adminSide_showCourseCat($id)
    {
        $ShowCourseSubCat = Course_Sub_Category::all();
        $EditallCourseCat = DB::select('select * from course_categories where id = ?', [$id]);
        return view('EditCourseCat')->with(['ShowCourseSubCat' => $ShowCourseSubCat, 'EditallCourseCat' => $EditallCourseCat]);
    }

    // function to edit single CourseCat at a time
    public function adminSide_EditCourseCat(Request $request, $id)
    {
        $validated = $request->validate([
            'course_cat_name' => ['required'],
            'course_sub_id' => ['required'],
        ]);

        $EditCourseCat = Course_Category::whereId($id)->first();
        $EditCourseCat->course_cat_name = $request->input('course_cat_name');
        $EditCourseCat->course_sub_id = $request->input('course_sub_id');
        $EditCourseCat->save();
        return redirect()->back()->with('message', 'Course Category Added Successfuly');
    }

    // function to delete single CourseCat at a time on admin panel
    public function adminSide_DeleteCourseCat($id)
    {
        $ShowCourseSubCat = Course::all();
        $delete = DB::select('delete from course_sub_categories where id = ?', [$id]);
        return redirect()->back()->with('message', 'Course Category Deleted successfully!!');
    }

}