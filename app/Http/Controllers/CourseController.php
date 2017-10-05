<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\course;
use App\Category;

class CourseController extends Controller
{
    //

    public function create (Request $request){

//       dump($request);
        //$data1= course::all();
        //$data= Category::all();

        course::insert([
            'id_category' => $request->category_asoc,
            'name_courses' => $request->createcourse,
            'description_courses' => $request->descriptioncourse
        ]);
        //return view ('categoria',compact('data','data1'));
        echo "<script>alert('Categoria creada');</script>";
        return redirect('category')->with('status', 'curso creado exitosamente!');;

    }
}
