@extends('layouts.app')

@section('content')

    <div class="row vh-100 justify-content-center align-items-center">
        <div class="col-auto"><a href="{{route('authors.index')}}">{{__('Authors')}}</a></div>
        <div class="col-auto"><a href="{{route('books.index')}}">{{__('Books')}}</a></div>
    </div>

@endsection
