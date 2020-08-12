<?php

namespace App\Http\Controllers\API;

use App\Book;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ResourceCollection
     */
    public function list(): ResourceCollection
    {
        return BookResource::collection(Book::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return BookResource
     */
    public function find($id): BookResource
    {
        return new BookResource(Book::findOrFail($id));
    }
}
