<?php

namespace App\Http\Controllers;

use App\Http\Requests\Books\CreateBookRequest;
use App\Http\Requests\Books\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    public function index()
    {
        return Book::all();
    }

    public function store(CreateBookRequest $request)
    {
        $book = new Book;
        $book->title = $request->get('title');

        $book->save();

        return $book;
    }

    
    public function show(Book $book)
    {
        if (!$book) 
        {
            return response()->status(Response::HTTP_NOT_FOUND);
        }

        return $book;
    }

    
    public function update(UpdateBookRequest $request, Book $book)
    {
        $book->title = $request->get('title');

        $book->save();

        return $book;
    }

    
    public function destroy(Book $book)
    {
        $book->delete();

        return response()->noContent();
    }
}
