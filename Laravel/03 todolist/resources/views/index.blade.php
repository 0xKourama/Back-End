@extends('layout.app')

@section('content')
    <h1>Todos</h1>
    @if (count($todos) > 0)
        @foreach ($todos as $todo)
            <div class="card m-2">
                <h2><a href="todos/{{ $todo->id }}">{{ $todo->title }}</a></h2>
                <h2>{{ $todo->content }}</h2>
                <span class="badge badge-danger">{{ $todo->due }}</span>
            </div>
        @endforeach
    @endif
@endsection
