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
    <script src="/js/edit-listing.js"></script>
</head>

<body class="antialiasedr">
    <header class="p-3 text-bg-primary sticky-top">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <span class="">Automarket</span>
                </a>
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="/" class="nav-link px-2 text-white">Home</a></li>
                    <li><a href="/cars/show" class="nav-link px-2 text-white">Listings</a></li>
                    <li><a href="/cars/myshow" class="nav-link px-2 text-white">My Listings</a></li>
                    <li><a href="/cars/create" class="nav-link px-2 text-white">Create a Listing</a>
                    </li>
                    <li><a href="/user/profile" class="nav-link px-2 text-white">Profile</a></li>
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
    <main class="vh-100 bg-body-secondary">
        <form method="POST" action="{{ route('cars.update', $car->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        @if ($car->image)
                            <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->title }} class="mx-auto d-block" style="max-width: 80%">
                        @else
                            <img src="{{ asset('storage/car_images/default.png') }}" alt="Default Image" class="mx-auto d-block" style="max-width: 80%">
                        @endif
                        <div class="form-control bg-body-secondary" style="display:none; margin-left:10rem">
                            <label for="image">Upload Image:</label>
                            <input type="file" class="form-control-file" name="image" id="image">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h1>{{ $car->make }} {{ $car->model }}</h1>
                        <ul>
                            <li><strong>Year:</strong> {{ $car->year }}</li>
                            <li><strong>Transmission:</strong> {{ $car->transmission }}</li>
                            <li><strong>Distance:</strong>
                                <span class="distance-text">{{ $car->distance }} km</span>
                                <input type="text" class="form-control distance-input"name="distance" value="{{ $car->distance }}" style="display:none;max-width: 10rem">
                            </li>
                            <li><strong>Price:</strong>
                                <span class="price-text">{{ $car->price }} &euro;</span>
                                <input type="text" class="form-control price-input" name="price" value="{{ $car->price }}" style="display:none;max-width: 10rem">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container my-5">
                <div class="row">
                    <div class="col-md-5 offset-md-1">
                        <h4>Car description:</h3>
                            <p class="comment-text"> {{ $car->comments }}</p>
                            <div class="form-control my-3 bg-body-secondary" style="display:none;">
                                <textarea class="form-control" name="comments" id="comments">{{ $car->comments }}</textarea>
                            </div>
                            <h4>Contact seller for more information:</h2>
                                <ul>
                                    <li>Email: {{ $car->user->email }}</li>
                                    <li>Phone: {{ $car->user->number }}</li>
                                </ul>
                    </div>
                </div>
            </div>
            <div class="text-center">
                @if (Auth::check() && $car->user_id == Auth::id())
                    <button type="button" class="btn btn-primary edit-btn">Edit</button>
                    <button type="submit" class="btn btn-success save-btn" style="display:none;">Save</button>
                @endif

            </div>
        </form>
    </main>
    <footer class="footer bg-body-secondary">
        <div class="container text-center">
            <span class="text-muted">© 2023 Automarket</span>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
    </script>
</body>

</html>
