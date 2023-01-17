<?php

namespace App\Http\Controllers;

use App\Models\Books;
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
            'author' => 'required|string',
            'publisher' => 'required|string',
            'number_of_pages' => 'required|integer',
        ];
        //Apply said rules to all the fields given by the user
        $validations = Validator::make($request->all(),$rules);

        if($validations->fails()){
            return [
                "status" => 'error',
                "data" => $validations->errors(),
                "msg" => "Validation Failed"
            ];
        }
        
        //If it passed all validations then we add the new book and return the saved info
        Books::create($request->all());

        return [
            "status" => 'success',
            "data" => $request->all(),
            "msg" => "New book added"
        ];
    }

    /**
     * Display all the books in the database
     *
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return [
            "status" => 'success',
            "data" =>Books::get(),
            "msg" => "Books retrieved succesfully"
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function destroy($title)
    {
        $book = Books::where('title', $title)->first();
        if(!$book){
            return [
                "status" => 'error',
                "data" => $title,
                "msg" => "Book not found"
            ];
        }        
        //If the book is found, then it deletes the target
        $book->delete();
        return [
            "status" => 'success',
            "data" => $book,
            "msg" => "Book deleted successfully"
        ];
    }
}
