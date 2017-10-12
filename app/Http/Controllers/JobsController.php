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
        $id_user=Auth::user()->id;
        $valuerefresh = job::where('id_user',$id_user)->get();
      
       return view('tabletjobs',compact('valuerefresh'));
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
        if(isset($request->checkbox_jobs)){
            $check=$request->checkbox_jobs;
        }
        else{
            $check=0;
        }

        if($check==1){

            $out=7819103011;
            $date_out=0;
            $in=strtotime($request->date_in);
           

        }
        else{
            $date_out=$request->date_out;

            $out=strtotime($request->date_out);
            $in=strtotime($request->date_in);
        }

            if($out>$in){
                job::insert([
                    'id_user' =>$request->id_user,
                    'name_company' =>$request->name_company,
                    'cargo' => $request->cargo,
                    'date_in' =>  $request->date_in,
                    'date_out' => $date_out ,
                    'ubication_company' =>  $request->ubication_company,
                    'observation' =>  $request->observation,
                    'actuality'=> $check
                ]);
            }
            else{
                return view('errors.503');
            }
                

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
    public function destroy($id_job)
    {
         try{
            $job = job::findOrFail($id_job);
            if ($job != null){
                $job->delete();
            }else {
                Session::push('status', 'Categoria Eliminada exitosamente!');
                return redirect('category');
       
            }
        }catch(Exception $e)  {
            echo 'ERROR: ',  $e->getMessage(), "\n";
        }
        //
    }

}
