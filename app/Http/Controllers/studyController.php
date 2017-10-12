<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\study;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\User;
use App\job;

class studyController extends Controller
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
        $valuerefresh = study::where('id_user',$id_user)->get();
      
       return view('tabletstudies',compact('valuerefresh'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
            try {
                    study::insert([
        'id_user' => $request->id_user,
        'type_studies' => $request->type_studies,
        'status_studies' => $request->status_studies,
        'name_institute' => $request->name_institute,
        'career' => $request->career,
        'date_in_studies' => $request->date_in_studies,
        'date_out_studies' => $request->date_out_studies,
        'ubication_institute' => $request->ubication_institute,
        'note_average' => $request->note_average,
    ]);
                } catch (Exception $e) {
                     echo 'ERROR: ',  $e->getMessage(), "\n";
                }    
        
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
        //
    }

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
    public function destroy($id_studies)
    {
        //
        try{
            $studies = study::findOrFail($id_studies);
            if ($studies != null){
                $studies->delete();
            }else {
                echo'error inesperado';
       
            }
        }catch(Exception $e)  {
            echo 'ERROR: ',  $e->getMessage(), "\n";
        }
    }
}
