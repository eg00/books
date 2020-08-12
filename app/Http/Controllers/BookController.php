<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Http\Requests\BookRequest;
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
    public function index(): Response
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
        $authors = Author::all();
        return response()->view('books.show', compact('book', 'authors'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Book $book
     * @return RedirectResponse
     */
    public function update(BookRequest $request, Book $book): RedirectResponse
    {
        $book->update($request->only(['title', 'price', 'published']));

        $book->authors()->sync(array_values($request->input('authors')));

        return redirect(route('books.index'))->with('success');
    }


}
