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

<body class="antialiased">
    <header>
        <nav class="navbar bg-primary navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">{{ __('messages.automarket') }}</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
            <div class="row">
                <div class="col-md-12 mx-auto">
                    @if ($listings->count() > 0)
                        <h1>{{ __('messages.my_listings') }}:</h1>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>{{ __('messages.image') }}</th>
                                    <th>{{ __('messages.make') }}</th>
                                    <th>{{ __('messages.model') }}</th>
                                    <th>{{ __('messages.year') }}</th>
                                    <th>{{ __('messages.engine') }}</th>
                                    <th>{{ __('messages.transmission') }}</th>
                                    <th>{{ __('messages.cylinders') }}</th>
                                    <th>{{ __('messages.drive_type') }}</th>
                                    <th>{{ __('messages.distance_km') }}</th>
                                    <th>{{ __('messages.price_eur') }}</th>
                                    <th>{{ __('messages.views') }}</th>
                                    <th>{{ __('messages.actions') }}</th>
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
                                                <a href="{{ route('cars.view', $listing->id) }}" class="btn btn-primary m-1 rounded">{{ __('messages.view') }}</a>
                                                <form action="{{ route('cars.listingdestroy', $listing->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button id="deleteForm" class="btn btn-danger m-1 rounded" type="submit">{{ __('messages.delete') }}</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="text-center">
                            <h1 id="myshow-main-page">{{ __('messages.no_listings') }}</h1>
                            <a href="{{ route('cars.create') }}" class="btn btn-primary p-2 mt-4">{{ __('messages.create_listing') }}</a>
                        </div>
                    @endif
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
