<?php

namespace App\Http\Controllers;

use App\Models\Publishers;
use Illuminate\Http\Request;
use Validator;

class PublishersController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //We define the rules of the information we need
        $rules = [
            'name' => 'required|string|max:100',
            ];
        //Apply said rules to all the fields given by the user
        $validations = Validator::make($request->all(),$rules);

        if($validations->fails()){
            return [
                "status" => 403,
                "msg" => "Validation Failed",
                "data" => $validations->errors(),
            ];
        }
        
        //If it passed all validations then we add the new row and return the saved info
        Publishers::create($request->all());
        return [
            "status" => 200,
            "msg" => "New publisher added",
            "data" => $request->all(),
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publishers  $publishers
     * @return \Illuminate\Http\Response
     */
    public function show(Publishers $publishers)
    {
        return [
            "status" => 200,
            "msg" => "Publishers retrieved succesfully",
            "data" =>Publishers::get(),
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publishers  $publishers
     * @return \Illuminate\Http\Response
     */
    public function edit(Publishers $publishers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Publishers  $publishers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publishers $publishers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publishers  $publishers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publisher = Publishers::where('id', $id)->first();
        if(!$publisher){
            return [
                "status" => 404,
                "msg" => "Publisher not found",
                "data" => $id,
            ];
        }        
        //If the row is found, then it deletes the target
        $publisher->delete();
        return [
            "status" => 200,
            "msg" => "Publisher deleted successfully",
            "data" => $publisher,
        ];
    }
}
