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
    <script src="/js/edit-profile.js"></script>
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
        <div class="container">
            <div class="card">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <h4>{{ __('messages.current_role') }}: {{ auth()->user()->roles()->pluck('name')->implode(' ') }}</h4>
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PUT')
                        <h5 class="card-title">{{ __('messages.first_name') }}:</h5>
                        <p class="card-text">
                            <span id="first_name">{{ auth()->user()->first_name }}</span>
                            <input type="text" name="first_name" class="form-control" id="first_name_input" value="{{ auth()->user()->first_name }}" style="display:none;"
                                autocomplete="first_name">
                        </p>
                        <h5 class="card-title">{{ __('messages.last_name') }}:</h5>
                        <p class="card-text">
                            <span id="last_name">{{ auth()->user()->last_name }}</span>
                            <input type="text" name="last_name" class="form-control" id="last_name_input" value="{{ auth()->user()->last_name }}" style="display:none;" autocomplete="last_name">
                        </p>
                        <h5 class="card-title">{{ __('messages.number') }}:</h5>
                        <p class="card-text">
                            <span id="number">{{ auth()->user()->number }}</span>
                            <input type="text" name="number" class="form-control" id="number_input" value="{{ auth()->user()->number }}" style="display:none;" autocomplete="number">
                        </p>
                        <h5 class="card-title">{{ __('messages.email') }}:</h5>
                        <p class="card-text">
                            <span id="email">{{ auth()->user()->email }}</span>
                            <input type="email" name="email" class="form-control" id="email_input" value="{{ auth()->user()->email }}" style="display:none;" autocomplete="email">
                        </p>
                        <h5 class="card-title">{{ __('messages.password') }}:</h5>
                        <p class="card-text">
                            <span id="password">*******</span>
                        </p>
                        <div class="form-group new-password-section" style="display:none;">
                            <label for="new_password">{{ __('messages.new_password') }}:</label>
                            <input type="password" name="new_password" class="form-control" id="new_password" autocomplete="new-password">
                            <label for="new_password_confirmation">{{ __('messages.confirm_new_password') }}:</label>
                            <input type="password" name="new_password_confirmation" class="form-control" id="new_password_confirmation" autocomplete="new_password_confirmation">
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-primary edit-btn">{{ __('messages.edit') }}</button>
                            <button type="submit" class="btn btn-success save-btn" style="display:none;">{{ __('messages.save') }}</button>
                        </div>
                    </form>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
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
