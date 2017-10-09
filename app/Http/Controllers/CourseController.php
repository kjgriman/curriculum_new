<?php

namespace App\Http\Controllers;

use core\session\exception;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\course;
use App\Category;

use Illuminate\Support\Facades\Session;


class CourseController extends Controller
{
    //
     public function __construct()
    {
        $this->middleware('auth');
    }


    public function create (Request $request){

//       dump($request);
        //$data1= course::all();
        //$data= Category::all();
try {
    course::insert([
        'id_category' => $request->category_asoc,
        'name_courses' => $request->createcourse,
        'description_courses' => $request->descriptioncourse
    ]);
    //return view ('categoria',compact('data','data1'));
    Session::push('status', 'Curso creado exitosamente!');
    return redirect('category');
}catch(Exception $e)  {
    echo 'ERROR: ',  $e->getMessage(), "\n";
}
    }

    public function editCourse(course $id_category){

        $data= Category::all();

        return view ('edit',compact('data')) ;     
     }


    public function destroyCourse( $id_course)
    {
try {
    $course = course::findOrFail($id_course);

    $course->delete();
//       dd($id_category);
    Session::push('status', 'Curso Eliminado exitosamente!');
    return redirect('category');
}catch(Exception $e)  {
    echo 'ERROR: ',  $e->getMessage(), "\n";
    }

        course::insert([
            'id_category' => $request->category_asoc,
            'name_courses' => $request->createcourse,
            'description_courses' => $request->descriptioncourse
        ]);
        //return view ('categoria',compact('data','data1'));


        return redirect('category') ->with('status' , 'curso creado exitosamente!');

    }
}
