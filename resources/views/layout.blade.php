<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/app.css">
        <link rel="icon" type="image/x-icon" href="/favicon.ico">
    </head>
    <body class="antialiased">
        <header>
            <a href="/">
                <img src="/svg/jobads.svg" class="logo"/>
            </a>
            <nav>
                @auth
                    <a href="#" class="welcomeUser">Welcome, {{auth()->user()->name}}!</a>

                    <div class="logOut">
                        <form method="POST" action="/logout">
                            @csrf

                            <button type="submit">Log out</button>
                        </form>
                    </div>

                @else
                    <a href="/register">Register</a>
                    <a href="/login">Login</a>
                @endauth

                @auth
                    <a href="/company/create">Create company</a>
                    <a href="/company/edit">Edit company</a>
                    <a href="/job/create">Create job offer</a>
                    <a href="/job/edit">Edit job offer</a>
                @endauth

            </nav>
        </header>

        @yield('content')

        <footer>
            © <?php echo date("Y");?>
        </footer>

    </body>
</html>
