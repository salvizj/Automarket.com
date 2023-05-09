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
    <script src="/js/filter-car-data.js"></script>
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
        <div class="container ">
            <h3 class="text-center mb-4">Filter Listings</h3>
            <form method="POST" action="{{ route('car.filter') }}">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-md-3 mb-3">
                        <label for="make">Make:</label>
                        <select class="form-control" id="make" name="make">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="model">Model:</label>
                        <select class="form-control" id="model" name="model">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="from_year">From Y:</label>
                        <select class="form-control" id="from_year" name="from_year">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="till_year">Till Y:</label>
                        <select class="form-control" id="till_year" name="till_year">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="engine">Engine:</label>
                        <select class="form-control" id="engine" name="engine">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="transmission">Transmission:</label>
                        <select class="form-control" id="transmission" name="transmission">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="cylinders">Cylinders:</label>
                        <select class="form-control" id="cylinders" name="cylinders">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="drive">Drive type:</label>
                        <select class="form-control" id="drive" name="drive">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="price_min">Price Min:</label>
                        <input type="number" step="100" class="form-control" id="price_min" name="price_min">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="price_max">Price Max:</label>
                        <input type="number" step="100" class="form-control" id="price_max" name="price_max">
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-md-3 text-right">
                        <button type="submit" class="btn btn-primary mr-2">Filter</button>
                        <a href="{{ route('cars.show') }}" class="btn btn-secondary">Clear Filter</a>
                    </div>
                </div>
            </form>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    @if ($listings != null && $listings->count() > 0)
                        <h1 class="mb-4">ALL Listings</h1>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Make</th>
                                        <th>Model</th>
                                        <th>Year</th>
                                        <th>Engine</th>
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
                                        @if ($listing->user_id != auth()->id())
                                            <tr>
                                                <td>
                                                    @if ($listing->image)
                                                        <img src="{{ asset('storage/car_images/' . $listing->image) }}" alt="Car Image" style="max-width: 100px">
                                                    @else
                                                        <img src="{{ asset('storage\car_images\default.png') }}" alt="Car Image" style="max-width: 100px">
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
                                                        @if (Auth::check() &&
                                                                Auth::user()->roles()->where('name', 'admin')->exists())
                                                            <form action="{{ route('cars.listingdestroy', $listing->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button id="deleteForm" class="btn btn-danger m-1  rounded" type="submit">Delete</button>
                                                            </form>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p>No listings found.</p>
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
