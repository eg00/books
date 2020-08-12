<?php

namespace App\Http\Controllers;

use App\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::withCount('books')->paginate();
        return response()->view('authors.index', compact('authors'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\author $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        return response()->view('authors.show', compact('author'));
    }

}
