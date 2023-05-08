<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Automarket</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
        crossorigin="anonymous">
    <link href="/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/js/filter-car-data.js"></script>
</head>

<body class="antialiased ">
    <header>
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="/" class="nav-link px-2 text-white">Home</a></li>
                    <li class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="/cars/show" class="nav-link px-2 text-white active text-decoration-underline">
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
    <main>
        <div class="col mx-auto">
            <h3>Filter Listings</h3>
            <form method="POST" action="{{ route('car.filter') }}">
                @csrf
                <table class="table">
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="make">Make:</label>
                                <select class="form-control" id="make" name="make">
                                    <option value=""></option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="model">Model:</label>
                                <select class="form-control" id="model" name="model">
                                    <option value=""></option>
                                </select>
                            </div>
                        </td>
                        <td>
                        <td>
                            <div class="form-group">
                                <label for="from_year">From Y:</label>
                                <select class="form-control" id="from_year" name="from_year">
                                    <option value=""></option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="till_year">Till Y:</label>
                                <select class="form-control" id="till_year" name="til_year">
                                    <option value=""></option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="engine">Engine:</label>
                                <select class="form-control" id="engine" name="engine">
                                    <option value=""></option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="transmission">Transmission:</label>
                                <select class="form-control" id="transmission" name="transmission">
                                    <option value=""></option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="cylinders">Cylinders:</label>
                                <select class="form-control" id="cylinders" name="cylinders">
                                    <option value=""></option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="drive">Drive type:</label>
                                <select class="form-control" id="drive" name="drive">
                                    <option value=""></option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="price_min">Price Min:</label>
                                <input type="number" step="100" class="form-control" id="price_min" name="price_min">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="price_max">Price Max:</label>
                                <input type="number" step="100" class="form-control" id="price_max" name="price_max">
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
        <div class="col-md-10 mx-auto">
            @if ($listings != null && $listings->count() > 0)
                <h1>ALL Listings</h1>
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
                                                    <button id="deleteForm" class="btn btn-primary m-1 rounded" type="submit">Delete</button>
                                                </form>
                                        </div>
                            @endif
                            </td>
                            </tr>
                        @endif
            @endforeach
            </tbody>
            </table>
            @endif
        </div>
        <footer>
            <div class="container text-center">
                <span class="text-muted">© 2023 Automarket</span>
            </div>
        </footer>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
    </script>
</body>

</html>
