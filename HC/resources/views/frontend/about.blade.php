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
        header {
            background-color: #f8f9fa;
            padding: 10px 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        header .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        header h1 {
            font-family: 'Times New Roman', serif;
            font-size: 30px;
            margin-bottom: 10px;
            color: #333;
        }
        .dark-bg {
            background-color: #343a40;
            color: #fff;
            padding: 40px 20px;
        }
        .main-content {
            max-width: 800px;
            margin: 0 auto;
        }
        .main-content h2 {
            font-size: 28px;
            margin-bottom: 20px;
        }
        .main-content p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 20px;
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
