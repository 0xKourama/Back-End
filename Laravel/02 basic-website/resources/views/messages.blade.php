@extends('layouts.app')

@section('content')
    @foreach($messages as $message)
        <ul class="list-group p-2">
            <li class="list-group-item">{{ $message->name }}</li>
            <li class="list-group-item">{{ $message->email }}</li>
            <li class="list-group-item">{{ $message->subject }}</li>
            <li class="list-group-item">{{ $message->message }}</li>
        </ul>
    @endforeach
@endsection
