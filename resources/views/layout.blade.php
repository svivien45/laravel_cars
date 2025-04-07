<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatile" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scales=1.0">
        <title>Osztály Napló</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Quicksand&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('style.css')}}">
    </head>

    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="{{route('students.index')}}">Tanulók</a></li>
                    <li><a href="{{route('school_classes.index')}}">Osztályok</a></li>
                    <li><a href="{{route('subjects.index')}}">Tantárgyak</a></li>
                    <li><a href="{{route('marks.index')}}">Jegyek</a></li>
                    @if(auth()->check())
                    <li>
                        <form class="logout" action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit">Kijelentkezés</button>
                        </form>
                    </li>
                    @else
                        <li><a href="{{ route('login') }}">Login</a></li>
                    @endif
                </ul>
            </nav>
        </header>
        <main>
            @yield('content')
        </main>
        <footer>
            <p>@ Savanyú Vivien</p>
        </footer>
    </body>
</html>


