<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=Roboto:wght@400;700&display=swap" rel="stylesheet">

<style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Roboto', sans-serif;
        color: #fff;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh; /* Ensure the body takes the full viewport height */
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
        width: 100%; /* Ensure the card takes full width of its container */
        max-width: 500px; /* Limit the card width for better readability */
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

    .form-control {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid #00ff00;
        color: #fff;
    }

    .form-control:focus {
        background: rgba(255, 255, 255, 0.2);
        border-color: #00ff00;
        box-shadow: 0 0 10px #00ff00;
    }

    .btn-primary {
        background: linear-gradient(45deg, #00ff00, #00cc00);
        border: none;
        font-family: 'Press Start 2P', cursive;
    }

    .btn-primary:hover {
        background: linear-gradient(45deg, #00cc00, #009900);
    }

    .form-check-input:checked {
        background-color: #00ff00;
        border-color: #00ff00;
    }

    a {
        color: #00ff00;
    }

    a:hover {
        color: #00cc00;
    }

    .invalid-feedback {
        color: #ff4444;
    }
</style>

<!-- Cool Animated Background -->
<div class="background"></div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">{{ __('Register') }}</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label text-white">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Email Address -->
                        <div class="mb-3">
                            <label for="email" class="form-label text-white">{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label text-white">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label text-white">{{ __('Confirm Password') }}</label>
                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <a class="text-decoration-none" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>

                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>