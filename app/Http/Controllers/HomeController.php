<?php namespace App\Http\Controllers;

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.2/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */



use App\Http\Requests;
use Illuminate\Http\Request;
use App\Category;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        return view('home');
    }
    public function showCategory()
    {
         $data= Category::all();
         
        # code...
        return view('/categoria',compact('data'));
    }
}