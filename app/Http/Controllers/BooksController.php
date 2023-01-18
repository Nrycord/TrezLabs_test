<?php

namespace App\Http\Controllers;
use App\Models\Authors;

use App\Models\Books;
use App\Models\BooksAuthors;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

class BooksController extends Controller
{
    /**
     * Stores a new book into the database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //We define the rules of the information we need
        $rules = [
            'title' => ['required', Rule::unique('books', 'title'),'max:200','string'],
            'authors_id' => 'required|integer',
            'publishers_id' => 'required|integer',
            'number_of_pages' => 'required|integer',
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
        
        //If it passed all validations then we add the new book and return the saved info
        Books::create($request->all());
        return [
            "status" => 200,
            "msg" => "New book added",
            "data" => $request->all(),
        ];
    }

    /**
     * Display all the books in the database
     * Including all the categories that the book has
     *
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return [
            "status" => 200,
            "msg" => "Books retrieved succesfully",
            "data" =>Books::with('categories')->get(),

        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string title
     * @return \Illuminate\Http\Response
     */
    public function destroy($title)
    {
        $book = Books::where('title', $title)->first();
        if(!$book){
            return [
                "status" => 404,
                "msg" => "Book not found",
                "data" => $title,
            ];
        }        
        //If the book is found, then it deletes the target
        $book->delete();
        return [
            "status" => 200,
            "msg" => "Book deleted successfully",
            "data" => $book,
        ];
    }
}
