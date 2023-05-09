<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Automarket</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
        crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="\js\edit-listing.js"></script>
</head>

<body class="antialiased">
    <header>
        <nav class="navbar bg-primary navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Automarket</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/cars/show">Listings</a>
                        </li>
                        @if (Auth::check())
                            <li class="nav-item">
                                <a class="nav-link" href="/cars/myshow">My Listings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/cars/create">Create a Listing</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/user/profile">Profile</a>
                            </li>
                        @endif
                    </ul>
                    @if (Auth::check())
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-light">Logout</button>
                        </form>
                    @else
                        <a type="button" href="/auth/login" class="btn btn-outline-light ">Login</a>
                        <a type="button" href="/auth/register" class="btn btn-outline-light">Register</a>
                    @endif
                </div>
            </div>
        </nav>
    </header>
    <main class="d-flex flex-column min-vh-100">
        <form method="POST" action="{{ route('cars.update', $car->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        @if ($car->image)
                            <img src="{{ asset('storage/' . Str::after($car->image, 'public/')) }}" alt="Car Image" class="mx-auto d-block img-fluid">
                        @else
                            <img src="{{ asset('storage/car_images/default.png') }}" alt="Default Image" class="mx-auto d-block img-fluid">
                        @endif
                        <div class="form-group" style="display: none">
                            <label for="image">Upload a different image:</label>
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h1>{{ $car->make }} {{ $car->model }}</h1>
                        <ul>
                            <li><strong>Year:</strong> {{ $car->year }}</li>
                            <li><strong>Engine:</strong> {{ $car->engine }}</li>
                            <li><strong>Transmission:</strong> {{ $car->transmission }}</li>
                            <li><strong>Cylinders:</strong> {{ $car->cylinders }}</li>
                            <li><strong>Drive type:</strong> {{ $car->drive }}</li>
                            <li>
                                <strong>Distance:</strong>
                                <span class="distance-text">{{ $car->distance }} km</span>
                                <div class="col-md-2">
                                    <input type="text" class="form-control distance-input" name="distance" value="{{ $car->distance }}" style="display: none">
                                </div>
                            </li>
                            <li>
                                <strong>Price:</strong>
                                <span class="price-text">{{ $car->price }} &euro;</span>
                                <div class="col-md-2">
                                    <input type="text" class="form-control price-input" name="price" value="{{ $car->price }}" style="display: none">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container my-5">
                <div class="row">
                    <div class="col-md-5 offset-md-1">
                        <h4>Car description:</h4>
                        <p class="comment-text">{{ $car->comments }}</p>
                        <div class="form-group" style="display: none">
                            <label for="comments">Edit description:</label>
                            <textarea class="form-control" name="comments">{{ $car->comments }}</textarea>
                        </div>
                        <h4>Contact seller for more information:</h4>
                        <ul>
                            <li>Email: {{ $car->user->email }}</li>
                            <li>Phone: {{ $car->user->number }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="text-center d-flex justify-content-center">
                @if (Auth::check() && $car->user_id == Auth::id())
                    <button type="button" class="btn btn-primary edit-btn">Edit</button>
                    <button type="submit" class="btn btn-success save-btn" style="display: none">Save</button>
                @endif
            </div>
        </form>
        <footer class="footer mt-auto py-3 bg-light">
            <div class="container">
                <span class="text-muted">&copy; 2023 Automarket. All rights reserved.</span>
            </div>
        </footer>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
    </script>
</body>

</html>
