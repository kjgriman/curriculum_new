<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use App\Category;
use App\User;

use App\job;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

       $value = job::all();
        $data_1='<table class="table table-hover">
    <thead>
      <tr>
        <th class="bg bg-danger">Empresa</th>
        <th class="bg bg-danger">Cargo</th>
        <th></th>        
      </tr>
    </thead>
    <tbody id="row1"> ';
      
      for($i=0; $i<count($value);$i++) {
          # code...
      
     $data_2='
      <tr id="row2"><td>'.$value[$i]['name_company'].'</td><td>'.$value[$i]['cargo'].'</td><th><button class="btn btn-danger">Eliminar</button></th></tr>';
        }  
       
     $data_3='</tbody>
  </table>';
  $data_4=$data_1.$data_2.$data_3;
       
      
       return ($data_4);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {




                job::insert([
                    'id_user' =>$request->id_user,
                    'name_company' =>$request->name_company,
                    'cargo' => $request->cargo,
                    'date_in' =>  $request->date_in,
                    'date_out' => $request->date_out ,
                    'ubication_company' =>  $request->ubication_company,
                    'observation' =>  $request->observation,
                    'actuality'=> true
                ]);

}


        
        //
//         dump($request->all());
//         foreach ($data as $key => $value){         
//             foreach ($value as $item => $value1) {           
// //                
//                 }
//         dump($value[]);
//     }


    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
