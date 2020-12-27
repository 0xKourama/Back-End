@extends('layouts.app')

@section('content')
    <h1>Contact</h1>
    <p>Architecto blanditiis consequuntur cum cupiditate debitis dignissimos doloremque dolores est inventore iure laudantium magnam molestiae necessitatibus perspiciatis quisquam, quo, repellat vel vitae?</p>

    <form method="POST" action="{{ route('contact-form-submit') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
        </div>

        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Enter subject">
        </div>

        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" name="message" id="message" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
