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
</head>

<body class="antialiased ">
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
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    @if ($listings->count() > 0)
                        <h1>MY Listings:</h1>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Make</th>
                                    <th>Model</th>
                                    <th>Year</th>
                                    <th>Enginer</th>
                                    <th>Transmission</th>
                                    <th>Cylinders</th>
                                    <th>Drive type</th>
                                    <th>Distance km</th>
                                    <th>Price &euro;</th>
                                    <th>Views</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listings as $listing)
                                    <tr>
                                        <td>
                                            @if ($listing->image)
                                                <img src="{{ asset('storage/' . Str::after($listing->image, 'public/')) }}" alt="Car Image" style="max-width: 100px">
                                            @else
                                                <img src="{{ asset('storage/car_images/default.png') }}" alt="Car Image" style="max-width: 100px">
                                            @endif
                                        </td>
                                        <td>{{ $listing->make }}</td>
                                        <td>{{ $listing->model }}</td>
                                        <td>{{ $listing->year }}</td>
                                        <td>{{ $listing->engine }}</td>
                                        <td>{{ $listing->transmission }}</td>
                                        <td>{{ $listing->cylinders }}</td>
                                        <td>{{ $listing->drive }}</td>
                                        <td>{{ $listing->distance }}</td>
                                        <td>{{ $listing->price }}</td>
                                        <td>{{ $listing->view_count }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('cars.view', $listing->id) }}" class="btn btn-primary m-1 rounded">View</a>
                                                <form action="{{ route('cars.listingdestroy', $listing->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button id="deleteForm" class="btn btn-danger m-1 rounded" type="submit">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="text-center">
                            <h1 id="myshow-main-page">You have not created any listings yet</h1>
                            <a href="{{ route('cars.create') }}" class="btn btn-primary p-2 mt-4">Create Listing</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
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
