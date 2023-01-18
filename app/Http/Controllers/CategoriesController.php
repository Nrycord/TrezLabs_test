<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
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
        Authors::create($request->all());
        return [
            "status" => 200,
            "msg" => "New category added",
            "data" => $request->all(),
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $categories)
    {
        return [
            "status" => 200,
            "msg" => "Categories retrieved succesfully",
            "data" =>Categories::get(),
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(Categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categories $categories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Categories::where('id', $id)->first();
        if(!$category){
            return [
                "status" => 404,
                "msg" => "Category not found",
                "data" => $id,
            ];
        }        
        //If the row is found, then it deletes the target
        $category->delete();
        return [
            "status" => 200,
            "msg" => "Category deleted successfully",
            "data" => $category,
        ];
    }
}
