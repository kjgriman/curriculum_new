<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\User;
use App\course;

use App\Http\Requests;


class CategoryController extends Controller
{
    //
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function create (Request $request){

         
        //dd($request);

        Category::insert([
            'name_category' => $request->createcategory,
            'description_category' => $request->descriptioncategory
        ]);
        return redirect('category')->with('status','Categoria creada exitosamente!');

    }

    public function View (){
        $data= User::all();
        //dump($data->all);

    return view('lifepage');
    }
}
