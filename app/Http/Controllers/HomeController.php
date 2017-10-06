<?php namespace App\Http\Controllers;

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.2/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */



use App\Http\Requests;
use Illuminate\Http\Request;
use App\Category;
use App\course;
use App\User;
use DB;
use Illuminate\Support\Facades\Session;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
 public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        return view('home');
    }

<<<<<<< HEAD


=======
    public function destroy(Category $id)
    {
        
        try {
           $id->delete();
            return redirect()->route('category');
    
        } catch (Exception $e) {
            return "error fatal ".$e->getMessage();
        }
       
    }
>>>>>>> bc94bb1234052093ebd30030f8debee196242cd8
    public function showCategory()
    {
        $data1= course::all();
        $data= Category::all();
        $getCourses = DB::table('courses')
             ->join('category', 'courses.id_category', '=', 'category.id_category')
             ->select('*')
             ->get();
        # code...
        return view('/categoria',compact('data','data1', 'getCourses'));
    }
}