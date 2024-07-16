@extends('frontend.layout')

@section('title', 'About')

@section('content')
    <style>
        body {
            background-image: url('{{ asset("Images/about.jpg") }}');
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
            background: rgba(255, 255, 255, 0.9); /* Slightly more opaque */
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px; /* Increased padding for more space */
            max-width: 800px;
            width: 100%;
            margin: 40px auto;
        }
        .card h2 {
            margin-top: 0; /* Remove margin from the top of h2 */
        }
        .navbar-brand {
            font-size: 1.5rem;
        }
        .container text-center {
            margin-top: 2rem;
        }
        .text-box {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .text-box h2 {
            margin-top: 0;
        }
        .text-box p {
            margin-bottom: 1rem;
        }
    </style>

    <header>
        <div class="container">
            <h1>About HostelConnect</h1>
        </div>
    </header>

    <main>
        <section id="about" class="dark-bg">
            <div class="container">
                <div class="main-content">
                    <h2>What Is HostelConnect?</h2>
                    <p>
                        HostelConnect, created by Erick Githinji and Karen Kavuu, is an innovative web application aimed at revolutionizing the way students and landlords interact with hostel accommodations. HostelConnect offers a one-stop shop for landlords managing their properties and students looking for lodging options near their colleges.
                    </p>
                    <p>
                        HostelConnect provides a user-friendly experience where students can browse hostel listings tailored to their needs and preferences. Each listing includes detailed information such as facilities, location, cost, and reviews, enabling informed decisions about housing choices.
                    </p>
                    <p>
                        For landlords, HostelConnect simplifies listing and managing hostel properties. It includes tools for reservations, payments, and tenant communications, optimizing occupancy rates and profitability.
                    </p>
                    <p>
                        HostelConnect focuses on customer satisfaction and quality control, fostering a community where students and landlords can interact effectively. With its features and commitment to service, HostelConnect aims to be the premier platform for hostel accommodations.
                    </p>
                </div>
            </div>
        </section>
    </main>
@endsection
