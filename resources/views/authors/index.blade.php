@extends("layouts.app")

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>{{__('Authors')}}</h2>
            </div>
            <div class="card-header d-flex justify-content-between">
                <div class="text-muted">Показано <b>{{$authors->lastItem()}}</b> из
                    <b>{{$authors->total()}}</b>
                    записей
                </div>
                {{ $authors->links() }}
            </div>
            <div class="card-body p-0">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">{{__('Full name')}}</th>
                        <th scope="col">{{__('Books count')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($authors as $author)
                        <tr>
                            <td><a href="{{route('authors.show', $author->id)}}">{{$author->full_name}}</a></td>
                            <td>{{$author->books_count}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-header d-flex justify-content-between">
                <div class="text-muted">Показано <b>{{$authors->lastItem()}}</b> из
                    <b>{{$authors->total()}}</b>
                    записей
                </div>
                {{ $authors->links() }}
            </div>
        </div>
    </div>
@endsection
