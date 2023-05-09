<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Automarket</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
        crossorigin="anonymous">
    <script src="/js/load-car-data.js"></script>
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
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Create your car listing</h1>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('cars.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="make">Make</label>
                                    <select class="form-control" id="make" name="make" required>
                                        <option value="">Select a make</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="model">Model</label>
                                    <select class="form-control" id="model" name="model" required>
                                        <option value="">Select a model</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="year">Year</label>
                                    <select class="form-control" id="year" name="year" required>
                                        <option value="">Select a year</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="engine">Engine</label>
                                    <select class="form-control" id="engine" name="engine" required>
                                        <option value="">Select engine</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="transmission">Transmission</label>
                                    <select class="form-control" id="transmission" name="transmission" required>
                                        <option value="">Select a transmission type</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="cylinders">Cylinders</label>
                                    <select class="form-control" id="cylinders" name="cylinders" required>
                                        <option value="">Select number of cylinders</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="drive">Drive type</label>
                                    <select class="form-control" id="drive" name="drive" required>
                                        <option value="">Select a drive type</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="distance">Driven Distance (km)</label>
                                    <input type="number" class="form-control" id="distance" name="distance" required>
                                </div>
                                <div class="form-group">
                                    <label for="price">Price ($)</label>
                                    <input type="number" class="form-control" id="price" name="price" required>
                                </div>
                                <div class="form-group">
                                    <label for="comments">Additional Comments (Optional)</label>
                                    <textarea class="form-control" id="comments" name="comments" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="image">Upload Image (Optional)</label>
                                    <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Submit a listing</button>
                            </form>
                        </div>
                    </div>
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
