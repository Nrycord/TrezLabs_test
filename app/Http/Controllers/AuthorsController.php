<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use Illuminate\Http\Request;
use Validator;

class AuthorsController extends Controller
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
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'birthday' => 'date',
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
        Authors::create($request->all());
        return [
            "status" => 200,
            "msg" => "New author added",
            "data" => $request->all(),
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Authors  $authors
     * @return \Illuminate\Http\Response
     */
    public function show(Authors $authors)
    {
        return [
            "status" => 200,
            "msg" => "Authors retrieved succesfully",
            "data" =>Authors::get(),
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Authors  $authors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Authors $authors)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Authors  $authors
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Authors::where('id', $id)->first();
        if(!$author){
            return [
                "status" => 404,
                "msg" => "Author not found",
                "data" => $id,
            ];
        }        
        //If the row is found, then it deletes the target
        $author->delete();
        return [
            "status" => 200,
            "msg" => "Author deleted successfully",
            "data" => $author,
        ];
    }
}
