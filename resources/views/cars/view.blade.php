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
                <a class="navbar-brand" href="/">{{ __('messages.automarket') }}</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="{{ __('messages.toggle_navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/">{{ __('messages.home') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/cars/show">{{ __('messages.listings') }}</a>
                        </li>
                        @if (Auth::check())
                            <li class="nav-item">
                                <a class="nav-link" href="/cars/myshow">{{ __('messages.my_listings') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/cars/create">{{ __('messages.create_listing') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/user/profile">{{ __('messages.profile') }}</a>
                            </li>
                        @endif
                    </ul>
                    @if (Auth::check())
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-light">{{ __('messages.logout') }}</button>
                        </form>
                    @else
                        <a type="button" href="/auth/login" class="btn btn-outline-light ">{{ __('messages.login') }}</a>
                        <a type="button" href="/auth/register" class="btn btn-outline-light">{{ __('messages.register') }}</a>
                    @endif
                </div>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        @if (App::getLocale() == 'en')
                            {{ __('messages.english') }}
                        @elseif(App::getLocale() == 'lv')
                            {{ __('messages.latvian') }}
                        @endif
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                        <li><a class="dropdown-item" href="{{ route('change.language', ['lang' => 'en']) }}">{{ __('messages.english') }}</a></li>
                        <li><a class="dropdown-item" href="{{ route('change.language', ['lang' => 'lv']) }}">{{ __('messages.latvian') }}</a></li>
                    </ul>
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
                            <img src="{{ asset('storage/' . Str::after($car->image, 'public/')) }}" alt="{{ __('messages.car_image') }}" class="mx-auto d-block img-fluid">
                        @else
                            <img src="{{ asset('storage/car_images/default.png') }}" alt="{{ __('messages.default_image') }}" class="mx-auto d-block img-fluid">
                        @endif
                        <div class="form-group" style="display: none">
                            <label for="image">{{ __('messages.upload_image') }}</label>
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h1>{{ $car->make }} {{ $car->model }}</h1>
                        <ul>
                            <li><strong>{{ __('messages.year') }}:</strong> {{ $car->year }}</li>
                            <li><strong>{{ __('messages.engine') }}:</strong> {{ $car->engine }}</li>
                            <li><strong>{{ __('messages.transmission') }}:</strong> {{ $car->transmission }}</li>
                            <li><strong>{{ __('messages.cylinders') }}:</strong> {{ $car->cylinders }}</li>
                            <li><strong>{{ __('messages.drive_type') }}:</strong> {{ $car->drive }}</li>
                            <li>
                                <strong>{{ __('messages.distance') }}:</strong>
                                <span class="distance-text">{{ $car->distance }} km</span>
                                <div class="col-md-2">
                                    <input type="text" class="form-control distance-input" name="distance" value="{{ $car->distance }}" style="display: none">
                                </div>
                            </li>
                            <li>
                                <strong>{{ __('messages.price') }}:</strong>
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
                        <h4>{{ __('messages.car_description') }}:</h4>
                        <p class="comment-text">{{ $car->comments }}</p>
                        <div class="form-group" style="display: none">
                            <label for="comments">{{ __('messages.edit_description') }}</label>
                            <textarea class="form-control" name="comments">{{ $car->comments }}</textarea>
                        </div>
                        <div class="mb-3 mt-3">
                            <button type="button" class="btn btn-primary edit-btn">{{ __('messages.edit_listing') }}</button>
                            <button type="submit" class="btn btn-success save-btn" style="display: none">{{ __('messages.save_changes') }}</button>
                        </div>
                        <h4>{{ __('messages.contact_seller') }}:</h4>
                        <p class="seller-text"><b>{{ __('messages.email') }}</b>: {{ $car->user->email }}</p>
                        <p class="seller-text"><b>{{ __('messages.number') }}</b>{{ $car->user->number }}</p>
                    </div>
                </div>
            </div>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
    </script>
</body>

</html>
