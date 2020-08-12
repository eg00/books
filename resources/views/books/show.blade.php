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
                            <select class="form-select" name="authors[]" multiple aria-label="Authors">
                                @foreach($authors as $author)
                                <option value="{{$author->id}}"
                                {{ in_array($author->full_name, $book->names)? 'selected' : ''}}
                                >{{$author->full_name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
