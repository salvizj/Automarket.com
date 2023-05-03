<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Automarket</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/js/load-car-data.js"></script>
</head>

<body class="antialiased ">
    <header class="p-3 text-bg-primary sticky-top">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <span class="">Automarket</span>
                </a>
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="/" class="nav-link px-2 text-white">Home</a></li>
                    <li class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="/cars/show" class="nav-link px-2 text-dark active text-decoration-underline">
                            Listings</a></li>
                    @if (Auth::check())
                        <li><a href="/cars/myshow" class="nav-link px-2 text-white">My Listings</a></li>
                        <li><a href="/cars/create" class="nav-link px-2 text-white">Create a Listing</a></li>
                        <li><a href="/user/profile" class="nav-link px-2 text-white ">Profile</a></li>
                    @endif
                </ul>
                </form>
                @if (Auth::check())
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-light me-2">Logout</button>
                    </form>
                @else
                    <a type="button" href="/auth/login" class="btn btn-outline-light me-2">Login</a>
                    <a type="button" href="/auth/register" class="btn btn-outline-light me-2">Register</a>
                @endif
            </div>
        </div>
        </div>
    </header>
    <main class="vh-100 bg-body-secondary pt-5">
        <div class="col-md-10 mx-auto">
            <h3>Filter Listings</h3>
            <form method="POST" action="{{ route('car.filter') }}">
                @csrf
                <table class="table">
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="make">Make:</label>
                                <select class="form-control" id="make" name="make">
                                    <option value="">Select a make</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="model">Model:</label>
                                <select class="form-control" id="model" name="model">
                                    <option value="">Select a model</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="transmission">Transmission:</label>
                                <select class="form-control" id="transmission" name="transmission">
                                    <option value="">Select a transmission type</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="year">Year:</label>
                                <select class="form-control" id="year" name="year">
                                    <option value="">Select a year</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="price_min">Price Min:</label>
                                <input type="number" step="100" class="form-control" id="price_min"
                                    name="price_min">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="price_max">Price Max:</label>
                                <input type="number" step="100" class="form-control" id="price_max"
                                    name="price_max">
                            </div>
                        </td>
                    </tr>
                    <tr class="text-right">
                        <td colspan="10">
                            <button type="submit" class="btn btn-secondary">Filter</button>
                            <a href="{{ route('cars.show') }}" class="btn btn-secondary">Clear Filter</a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="col-md-9 mx-auto">
            @if ($listings != null && $listings->count() > 0)
                <h1>ALL Listings</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Make</th>
                            <th>Model</th>
                            <th>Transmission</th>
                            <th>Year</th>
                            <th>Distance km</th>
                            <th>Price &euro;</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listings as $listing)
                            @if ($listing->user_id != auth()->id())
                                <tr>
                                    <td>
                                        @if ($listing->image)
                                            <img src="{{ asset('storage/car_images/' . $listing->image) }}"
                                                alt="Car Image" style="max-width: 100px">
                                        @else
                                            <img src="{{ asset('storage\car_images\default.png') }}" alt="Car Image"
                                                style="max-width: 100px">
                                        @endif
                                    </td>
                                    <td>{{ $listing->make }}</td>
                                    <td>{{ $listing->model }}</td>
                                    <td>{{ $listing->transmission }}</td>
                                    <td>{{ $listing->year }}</td>
                                    <td>{{ $listing->distance }}</td>
                                    <td>{{ $listing->price }}</td>
                                    <td>
                                        <a href="{{ route('cars.view', $listing->id) }}"
                                            class="btn btn-primary">View</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </main>
    <footer class="footer bg-body-secondary">
        <div class="container text-center">
            <span class="text-muted">© 2023 Automarket</span>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
    </script>
</body>

</html>
