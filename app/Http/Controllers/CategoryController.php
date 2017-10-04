<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\User;

use App\Http\Requests;

class CategoryController extends Controller
{
    //
    public function create (Request $request){

//       dump($request->createcategory);

        Category::insert([
            'name_category' => $request->createcategory
        ]);
        return view ('categoria');

    }

    public function View (){
       $data= User::all();
//        dump($data->all);

return view('lifepage');
    }
}
