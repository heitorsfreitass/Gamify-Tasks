@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=Roboto:wght@400;700&display=swap" rel="stylesheet">

<style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Roboto', sans-serif;
        color: #fff;
        background: #1a1a1a; /* Dark background */
    }

    /* Cool Animated Background */
    .background {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        background: linear-gradient(-45deg, #1a1a1a, #003300, #006600, #009900);
        background-size: 400% 400%;
        animation: gradientBG 15s ease infinite;
    }

    @keyframes gradientBG {
        0% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
        100% {
            background-position: 0% 50%;
        }
    }

    /* Card Styling */
    .card {
        background: rgba(0, 0, 0, 0.8);
        border: 2px solid #00ff00;
        border-radius: 15px;
        animation: glow 1.5s infinite alternate;
    }

    @keyframes glow {
        from {
            box-shadow: 0 0 10px #00ff00, 0 0 20px #00ff00, 0 0 30px #00ff00;
        }
        to {
            box-shadow: 0 0 20px #00ff00, 0 0 30px #00ff00, 0 0 40px #00ff00;
        }
    }

    .card-header {
        background: linear-gradient(45deg, #00ff00, #00cc00);
        border-bottom: 2px solid #00ff00;
        font-family: 'Press Start 2P', cursive;
    }

    .table {
        color: #fff; /* White text for table */
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(255, 255, 255, 0.05); /* Slight transparency for striped rows */
    }

    .table-striped tbody tr:hover {
        background-color: rgba(0, 255, 0, 0.1); /* Neon green hover effect */
    }

    .btn-primary {
        background: linear-gradient(45deg, #00ff00, #00cc00);
        border: none;
        font-family: 'Press Start 2P', cursive;
    }

    .btn-primary:hover {
        background: linear-gradient(45deg, #00cc00, #009900);
    }

    h2, h3 {
        font-family: 'Press Start 2P', cursive;
        color: #00ff00; /* Neon green for headings */
    }

    p {
        color: #fff;
    }
</style>

<div class="background"></div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center mb-5">
                <h2 class="display-6 text-center">Welcome!</h2>
                <p style="color:#000000;">Total Points: <strong>{{ Auth::user()->points }}</strong></p>
            </div>
            
            <div class="card text-center">
                <div class="card-header">
                    <h2 class="fw-bold" style="font-size: 24px;">Scoreboard</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Total Points</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->points }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="text-center mt-5">
                <a href="/user-rewards/{{ Auth::user()->id }}" class="btn btn-primary">See Rewards</a>
            </div>
        </div>
    </div>
</div>
@endsection