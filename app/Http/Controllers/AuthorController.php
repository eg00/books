<?php

namespace App\Http\Controllers;

use App\Author;
use App\Http\Requests\AuthorRequest;
use Illuminate\Http\Request;

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

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Author $author
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(AuthorRequest $request, Author $author)
    {
        $author->full_name = $request->full_name;
        $author->save();

        return redirect(route('authors.index'))->with('success');
    }


}
