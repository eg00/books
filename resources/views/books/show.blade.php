@extends("layouts.app")
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card card-outline-secondary">
                <div class="card-header">
                    <h3>{{__('Book')}}: {{$book->title}}</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('books.update', $book)}}" method="post">
                        {{method_field('PATCH')}}
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">{{__('Title')}}</label>
                            <input type="text" name="title" class="form-control" id="title" value="{{$book->title}}">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">{{__('Price')}}</label>
                            <input type="text" name="price" class="form-control" id="price" value="{{$book->price}}">
                        </div>
                        <div class="mb-3">
                            <label for="published" class="form-label">{{__('Price')}}</label>
                            <input   type="text" name="published" class="form-control" id="published"
                                   value="{{$book->published->format('d.m.Y')}}">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
                        </div>
                    </form>
                    {{--                        @if(count($book->authors)>0)--}}
                    {{--                            <div class="row">--}}
                    {{--                                <div class="col">--}}
                    {{--                                    <h4>{{__('Books')}}:</h4>--}}
                    {{--                                    <ul class="list-group">--}}
                    {{--                                        @foreach($author->books as $book)--}}
                    {{--                                            <li class="list-group-item">--}}
                    {{--                                                {{$book->title}}--}}
                    {{--                                                {{$book->price}}--}}
                    {{--                                                {{$book->published}}--}}
                    {{--                                            </li>--}}
                    {{--                                        @endforeach--}}
                    {{--                                    </ul>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        @endif--}}
                </div>
            </div>
        </div>
    </div>
@endsection
