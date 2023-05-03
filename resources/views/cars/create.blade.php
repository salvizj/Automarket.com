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

<body class="antialiased">
    <header class="p-3 text-bg-primary sticky-top">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <span class="">Automarket</span>
                </a>
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="/" class="nav-link px-2 text-white">Home</a></li>
                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="/cars/show" class="nav-link px-2 text-white">Listings</a></li>
                    </ul>
                    @if (Auth::check())
                        <li><a href="/cars/myshow" class="nav-link px-2 text-white">My Listings</a></li>
                        <li><a href="/" class="nav-link px-2 text-dark active text-decoration-underline">Create a
                                Car Listing</a></li>
                        <li><a href="/user/profile" class="nav-link px-2 text-white">Profile</a></li>
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
    <main class="bg-body-secondary vh-100 pt-3">
        <div class="container mx-auto mt-5">
            <div>
                <div>
                    <h1> Create your car listing</h1>
                    <form method="POST" action="{{ route('cars.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-md-5">
                            <label for="make">Make</label>
                            <select class="form-control" id="make" name="make" required>
                                <option value="">Select a make</option>
                            </select>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="model">Model</label>
                            <select class="form-control" id="model" name="model" required>
                                <option value="">Select a model</option>
                            </select>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="transmission">Transmission</label>
                            <select class="form-control" id="transmission" name="transmission" required>
                                <option value="">Select a transmission</option>
                            </select>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="year">Year</label>
                            <select class="form-control" id="year" name="year" required>
                                <option value="">Select a year</option>
                            </select>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="distance">Driven Distance (km)</label>
                            <input type="number" class="form-control" id="distance" name="distance" required>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="price">Price ($)</label>
                            <input type="number" class="form-control" id="price" name="price" required>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="comments">Additional Comments(Optional)</label>
                            <textarea class="form-control" id="comments" name="comments" rows="3"></textarea>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="image">Upload Image(Optional)</label>
                            <input type="file" class="form-control-file" id="image" name="image"
                                accept="image/*" style="margin-top: 1rem">
                        </div>
                        <button type="submit" class="btn btn-primary" style="margin-top: 2em">Submit a
                            listing</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <img id="preview" style="display:none;max-width:50vw;max-height:50vh;margin-top:0">
                </div>
            </div>
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
