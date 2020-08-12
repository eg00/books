@extends("layouts.app")
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-outline-secondary">
                <div class="card-header">
                    <h3>{{__('Author')}}: {{$author->full_name}}</h3>
                </div>
                <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-auto">
                                {{__('Full name')}}:
                            </div>
                            <div class="col-auto">
                                {{$author->full_name}}
                            </div>
                        </div>

                        <div class="form-group d-flex justify-content-center">

                        </div>
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
