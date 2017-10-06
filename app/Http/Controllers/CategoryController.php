<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\User;
use App\course;
use Illuminate\Support\Facades\Session;

use App\Http\Requests;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function create (Request $request){

//       dump($request->createcategory);
         
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


                Session::push('status', 'Categoria Eliminada exitosamente!');
                return redirect('category');
            }}catch(Exception $e)  {
            echo 'ERROR: ',  $e->getMessage(), "\n";
        }
    }

    public function View (){
       $data= User::all();
//        dump($data->all);

return view('lifepage');
    }
}
