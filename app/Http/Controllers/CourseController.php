<?php

namespace App\Http\Controllers;

use core\session\exception;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Storage;
use Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\User_course;
use App\Http\Requests;
use App\course;
use App\Category;

use ZanySoft\LaravelPDF\PDF;
use DB;

use Illuminate\Support\Facades\Session;


class CourseController extends Controller
{
    //
     public function __construct()
    {
        $this->middleware('auth');
    }


    public function create (Request $request){
        $size= File::size($request->file('imgmedalla'));
        

        if($request->file('imgmedalla') && $size<1000000){
              $img= $request->file('imgmedalla');
              $file_route= time().'_'.$img->getClientOriginalName();
             $request->file('imgmedalla')->move('img/imgmedalla',$file_route);
         }else{

            $file_route=null;
            return 'error al cargar la imagen procure que el peso no supere 1 mega';
         }

        $data1= course::all();
        $data= Category::all();
try {
    course::insert([
        'id_category' => $request->category_asoc,
        'name_courses' => $request->createcourse,
        'description_courses' => $request->descriptioncourse,
        'imgmedalla' => $file_route
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


     public function storeusercourse(Request $request){
// dump($request);
        $veriusercourse=User_course::select('id_usercourse')->where('id_user',$request->id_user)->where('id_course',$request->id_course)->get();

        if ( count($veriusercourse) > 0) {
            return '<div class="alert alert-danger">Este usuario ya le fue asignado este curso...</div>';
            # code...
        }
        else{
           
            User_course::insert([
            'id_user' => $request->id_user,
            'id_course' => $request->id_course,
            'date_asignation' => $request->date_asignation
        ]);
         return '<div class="alert alert-success">Registro Exitoso</div>';
        }

        
    }

    public function showcourseaproved(){
    $id_user=Auth::user()->id;

           $getUserCourses = DB::table('user_course')
             ->join('courses', 'user_course.id_course', '=', 'courses.id_courses')
             ->select('*')->where('id_user',$id_user)
             ->get();       

  
        return view('showcourseaproved', compact('getUserCourses'));
    }

     public function invoice(Request $request){
 
        $id_usercourse=$request->id_usercourse;
     $id_user=Auth::user()->id;

           $getUserCourses = DB::table('user_course')
             ->join('courses', 'user_course.id_course', '=', 'courses.id_courses')
             ->select('*')->where('id_usercourse',$id_usercourse)
             ->get();    

              $data = [
                    'getUserCourses'=>$getUserCourses                   
                     ];
  

        $pdf = new PDF();
        $pdf->loadView('certificadopdf',['data'=>$data]);
        $pdf->stream('certificadopdf');   

    }
}
