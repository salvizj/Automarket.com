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
                        <a type="button" href="/auth/login" class="btn btn-outline-light">{{ __('messages.login') }}</a>
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
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">{{ __('messages.create_listing_title') }}</h1>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('cars.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="make">{{ __('messages.make') }}</label>
                                    <select class="form-control" id="make" name="make" required>
                                        <option value="">{{ __('messages.select_make') }}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="model">{{ __('messages.model') }}</label>
                                    <select class="form-control" id="model" name="model" required>
                                        <option value="">{{ __('messages.select_model') }}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="year">{{ __('messages.year') }}</label>
                                    <select class="form-control" id="year" name="year" required>
                                        <option value="">{{ __('messages.select_year') }}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="engine">{{ __('messages.engine') }}</label>
                                    <select class="form-control" id="engine" name="engine" required>
                                        <option value="">{{ __('messages.select_engine') }}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="transmission">{{ __('messages.transmission') }}</label>
                                    <select class="form-control" id="transmission" name="transmission" required>
                                        <option value="">{{ __('messages.select_transmission') }}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="cylinders">{{ __('messages.cylinders') }}</label>
                                    <select class="form-control" id="cylinders" name="cylinders" required>
                                        <option value="">{{ __('messages.select_cylinders') }}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="drive">{{ __('messages.drive_type') }}</label>
                                    <select class="form-control" id="drive" name="drive" required>
                                        <option value="">{{ __('messages.select_drive_type') }}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="distance">{{ __('messages.driven_distance') }} (km)</label>
                                    <input type="number" class="form-control" id="distance" name="distance" required>
                                </div>
                                <div class="form-group">
                                    <label for="price">{{ __('messages.price') }} ($)</label>
                                    <input type="number" class="form-control" id="price" name="price" required>
                                </div>
                                <div class="form-group">
                                    <label for="comments">{{ __('messages.additional_comments') }} ({{ __('messages.optional') }})</label>
                                    <textarea class="form-control" id="comments" name="comments" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="image">{{ __('messages.upload_image') }} ({{ __('messages.optional') }})</label>
                                    <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">{{ __('messages.submit_listing') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
    </script>
</body>

</html>
