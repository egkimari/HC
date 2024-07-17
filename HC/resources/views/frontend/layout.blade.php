<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'HostelConnect')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS file -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <!-- Yield additional styles -->
    @yield('styles')
</head>
<body>
    <!-- Header Section -->
    <header>
        <!-- Navigation bar with centered links -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <!-- Brand logo -->
            <a class="navbar-brand" href="{{ url('/') }}">HostelConnect</a>
            <!-- Toggle button for mobile devices -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navigation links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item {{ Request::is('hostels') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/hostels') }}">Hostels</a>
                    </li>
                    <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/about') }}">About</a>
                    </li>
                    <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    @guest
                        <li class="nav-item {{ Request::is('login') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('login') }}">Log in</a>
                        </li>
                        <li class="nav-item {{ Request::is('register') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @else
                        @if(auth()->user()->isLandlord())
                            <li class="nav-item">
                                <a class="nav-link profile-link" href="{{ route('landlord.profile.show') }}">Profile</a>
                            </li>
                        @elseif(auth()->user()->isStudent())
                            <li class="nav-item">
                                <a class="nav-link profile-link" href="{{ route('student.profile.show') }}">Profile</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </header>

    <!-- Main Content Section -->
    <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <!-- Footer Section -->
    <footer class="mt-4 py-3 bg-light">
        <div class="container text-center">
            <p>&copy; 2024 HostelConnect. All rights reserved.</p>
        </div>
    </footer>

    <!-- JavaScript files -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
