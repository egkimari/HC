@extends('frontend.layout')

@section('title', 'Contact')

@section('content')
    <style>
        body {
            background-image: url('{{ asset("Images/home.jpg") }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin: 0;
        }
        .navbar-nav {
            margin: 0 auto;
        }
        .navbar-nav li {
            padding: 0 15px;
        }
        header .navbar {
            display: flex;
            justify-content: center;
            width: 100%;
        }
        .card {
            background: rgba(255, 255, 255, 0.8);
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 800px;
            width: 100%;
            margin: 40px auto;
        }
    </style>

    <header>
        <div class="container">
            <h1>Contact Us</h1>
        </div>
    </header>

    <main>
        <section id="contact">
            <div class="container">
                <div class="main-content">
                    <h2>Get In Touch</h2>
                    <form action="{{ route('contact.submit') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="message" name="message" class="form-control" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
@endsection
