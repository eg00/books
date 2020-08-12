@extends("layouts.app")
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-outline-secondary">
                <div class="card-header">
                    <h3>{{__('Author')}}: {{$author->full_name}}</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('authors.update', $author)}}" method="post">
                        {{method_field('PATCH')}}
                        @csrf
                        <div class="row mb-3">
                            <div class="col-auto">
                                <label for="full_name" class="col-form-label"> {{__('Full name')}}:</label>
                            </div>
                            <div class="col-auto">
                                <input id="full_name"
                                       name="full_name"
                                       type="text" class="form-control" value="{{$author->full_name}}" required>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
                            </div>
                        </div>
                    </form>
                        @if(count($author->books)>0)
                            <div class="row">
                                <div class="col">
                                    <h4>{{__('Books')}}:</h4>
                                    <ul class="list-group">
                                        @foreach($author->books as $book)
                                            <li class="list-group-item">
                                                {{$book->title}}
                                                {{$book->price}}
                                                {{$book->published}}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                </div>
            </div>
        </div>
    </div>
@endsection
