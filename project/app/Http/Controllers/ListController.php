<?php

namespace App\Http\Controllers;

use App\ListAnimal;
use View;
use App\Http\Controllers\Controller;

class ListController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $animals = ListAnimal::orderBy('id','desc')->get();
        // foreach ($animals as $animal) {
        //             $name=$animal->first_name;
        //             $image=$animal->image;
        //             $description=$animal->description;
        // }

           return view("list/list")->with('animals',$animals);

        // load the view and pass the nerds
        // return View::make('List.List');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
