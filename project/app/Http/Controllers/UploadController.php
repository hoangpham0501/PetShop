<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\ListAnimal;
use App\Detail;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View("userprofile/upload");
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
        $id=Auth::id();
        $animal = ListAnimal::create();
        $animal->name = $request->input('name');
        // echo $request->input('name');
        $animal->color = $request->input('color');
        $animal->description = $request->input('description');
        $animal->breed = $request->get('breed');
        $animal->cost = $request->input('cost');

        if(strcasecmp($animal->name, 'alaska') == 0){
            $animal->ip = 1;
        }
        if(strcasecmp($animal->name, 'husky') == 0){
            $animal->ip = 2;
        }
        if(strcasecmp($animal->name, 'pitbull') == 0){
            $animal->ip = 3;
        }
        if(strcasecmp($animal->name, 'bichon frise') == 0){
            $animal->ip = 4;
        }
        if(strcasecmp($animal->name, 'chowchow') == 0){
            $animal->ip = 5;
        }
        if(strcasecmp($animal->name, 'pub') == 0){
            $animal->ip = 6;
        }
        if(strcasecmp($animal->name, 'akita') == 0){
            $animal->ip = 7;
        }
        if(strcasecmp($animal->name, 'chihuahua') == 0){
            $animal->ip = 8;
        }
        if(strcasecmp($animal->name, 'berger') == 0){
            $animal->ip = 9;
        }
        if(strcasecmp($animal->name, 'dalmantian') == 0){
            $animal->ip = 10;
        }
        if(strcasecmp($animal->name, 'shi tzu') == 0){
            $animal->ip = 11;
        }
        if(strcasecmp($animal->name, 'poodle') == 0){
            $animal->ip = 12;
        }
        if(strcasecmp($animal->name, 'samoyed') == 0){
            $animal->ip = 13;
        }
        if(strcasecmp($animal->name, 'phu quoc') == 0){
            $animal->ip = 14;
        }
        if(strcasecmp($animal->name, 'beagle') == 0){
            $animal->ip = 15;
        }
        if(strcasecmp($animal->name, 'bulldog') == 0){
            $animal->ip = 16;
        }
        if(strcasecmp($animal->name, 'papillon') == 0){
            $animal->ip = 17;
        }
        if(strcasecmp($animal->name, 'dachshund') == 0){
            $animal->ip = 18;
        }

        $animal->id_user = $id;

        $file = $request->file('file');
        $file_name = $file->getClientOriginalName();
        $animal->image = $file_name;
        $request->file('file')->move(public_path("/image"),$file_name);
        $animal->save();
        return redirect('/');
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
        $animals = Detail::findOrFail($id);
        return view('userprofile/edit')->with('animals',$animals);
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
        $file = $request->file('file');
        $file_name = $file->getClientOriginalName();
        $request->file('file')->move(public_path("/image"),$file_name);

        DB::table('animal') ->where ('id', $id) ->update(['name'=> $request->input('name'), 'color'=>$request->input('color'), 'description'=>$request->input('description'), 'breed'=>$request->input('breed'), 'cost'=>$request->input('cost'), 'image' => $file_name]);
        return redirect ('/');
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
