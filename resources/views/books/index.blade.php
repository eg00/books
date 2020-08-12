@extends("layouts.app")

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>{{__('Books')}}</h2>
            </div>
            <div class="card-header d-flex justify-content-between">
                <div class="text-muted">Показано <b>{{$books->lastItem()}}</b> из
                    <b>{{$books->total()}}</b>
                    записей
                </div>
                {{ $books->links() }}
            </div>
            <div class="card-body p-0">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">{{__('Title')}}</th>
                        <th scope="col">{{__('Price')}}</th>
                        <th scope="col">{{__('Author')}}</th>
                        <th scope="col">{{__('Published')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td><a href="{{route('books.show', $book)}}">{{$book->title}}</a></td>
                            <td>{{$book->formatted_price}}</td>
                            <td>
                                @foreach($book->names as $name)
                                    {{$name}}
                                    {!! $loop->remaining? "<br>" : ''!!}
                                @endforeach
                            </td>
                            <td>{{$book->published->format('d.m.Y')}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-header d-flex justify-content-between">
                <div class="text-muted">Показано <b>{{$books->lastItem()}}</b> из
                    <b>{{$books->total()}}</b>
                    записей
                </div>
                {{ $books->links() }}
            </div>
        </div>
    </div>
@endsection
