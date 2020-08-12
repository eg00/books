<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() : Response
    {
        $books = Book::paginate();
        return response()->view('books.index', compact('books'));
    }

    /**
     * Display the specified resource.
     *
     * @param Book $book
     * @return Response
     */
    public function show(Book $book): Response
    {
        return response()->view('books.show', compact('book'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Book $book
     * @return RedirectResponse
     */
    public function update(Request $request, Book $book): RedirectResponse
    {
        $this->validate($request, [
            'title'   => ['required', 'string'],
            'price'    => ['required', 'numeric','min:0', 'not_in:0'],
            'published'  => ['required', 'date'],
        ]);

        $book->update($request->only(['title', 'price', 'published']));

        return  redirect(route('books.index'))->with('success');
    }


}
