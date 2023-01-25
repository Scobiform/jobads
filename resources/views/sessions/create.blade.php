@extends('layout')

@section('content')
    <div class="registerForm">
        <h1>Login</h1>
        <form method="POST" action="/login">
            @csrf

            <label for="email">eMail</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>

            <button type="submit">Log in</button>
        </form>
    </div>
@endsection
