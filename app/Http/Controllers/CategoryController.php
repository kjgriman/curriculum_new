<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\User;
use App\job;
use App\course;
use App\User_course;
use App\study;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;

use DB;
use ZanySoft\LaravelPDF\PDF;


class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }
   

    public function create (Request $request){

         
try {
    Category::insert([
        'name_category' => $request->createcategory,
        'description_category' => $request->descriptioncategory
    ]);
    $status = 'Categoria creada exitosamente!';
    //$request->request->add(compact("status"));
//dd($request->status);
    Session::push('status', 'Categoria creada exitosamente!');
    return redirect('category');
    //return redirect('category', ['status' => 'Categoria creada exitosamente!']);
    //return redirect()->route('category');
}
catch(Exception $e)  {
    echo 'ERROR: ',  $e->getMessage(), "\n";
}
    }

    public function destroyCategory( $id_category)
    {
        try{
            $user = Category::find($id_category);
            if ($user != null){
                $user->delete();
//       dd($id_category);
                Session::push('status', 'Categoria Eliminada exitosamente!');
                return redirect('category');
            }else {
Session::push('status', 'Erro al eliminarr!');
                return redirect('category');
        //dd($request);

        
        
            }
        }catch(Exception $e)  {
            echo 'ERROR: ',  $e->getMessage(), "\n";
        }
    }

    public function View (){
        $id_user=Auth::user()->id;

        $data2=job::where('id_user',$id_user)->get();

        $data4=study::where('id_user',$id_user)->get();
        $data= User::all();
        //dump($data->all);

    return view('lifepage',compact('data','data2','data4'));
    }

   

    public function invoice() 
    {
     $id_user=Auth::user()->id;

           $getUserCourses = DB::table('user_course')
             ->join('courses', 'user_course.id_course', '=', 'courses.id_courses')
             ->select('*')->where('id_user',$id_user)
             ->get();

       

        $data4=job::where('id_user',$id_user)->get();

        $data2=study::where('id_user',$id_user)->get();

    $data = [
        'getUserCourses'=>$getUserCourses,
        'study' => $data2  ,
        'jobs' => $data4      
    ];
  

    $pdf = new PDF();
    $pdf->loadView('pdf',['data'=>$data]);
    $pdf->stream('pdf');
      

    }
    
}
