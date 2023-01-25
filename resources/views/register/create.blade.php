@extends('layout')

@section('content')
    <div class="registerForm">
        <h1>Register</h1>
        <form method="POST" action="/register">
            @csrf

            <label for="name">Name</label>
            <input type="text" name="name" id="name" required>

            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>

            <label for="email">eMail</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>

            <button type="submit">Submit</button>
        </form>
    </div>
@endsection
