<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Automarket</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
        crossorigin="anonymous">
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
        <div class="modal modal-sheet position-static d-block " tabindex="-1" role="dialog" id="modalSignin">
            <div class="modal-dialog" role="document">
                <div class="modal-content rounded-4 shadow">
                    <div class="modal-header p-5 pb-4 border-bottom-0">
                        <h1 class="fw-bold mb-0 fs-2">{{ __('messages.register') }}</h1>
                    </div>
                    <div class="modal-body p-5 pt-0">
                        <form class="" method="POST" action="/register">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-3" id="first_name" name="first_name" placeholder="{{ __('messages.first_name') }}" required>
                                <label for="first_name">{{ __('messages.first_name') }}</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-3" id="last_name" name="last_name" placeholder="{{ __('messages.last_name') }}" required>
                                <label for="last_name">{{ __('messages.last_name') }}</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control rounded-3" id="number" name="number" placeholder="{{ __('messages.phone_number') }}" required>
                                <label for="number">{{ __('messages.number') }}</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control rounded-3" id="email" name="email" placeholder="{{ __('messages.email_address') }}" required>
                                <label for="email">{{ __('messages.email') }}</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control rounded-3" id="password" name="password" placeholder="{{ __('messages.password') }}" required>
                                <label for="password">{{ __('messages.password') }}</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control rounded-3" id="password_confirmation" name="password_confirmation" placeholder="{{ __('messages.confirm_password') }}"
                                    required>
                                <label for="password_confirmation">{{ __('messages.confirm_password') }}</label>
                            </div>
                            <div class="form-floating mb-3" id="admin-password" style="display:none">
                                <input type="password" class="form-control rounded-3" id="admin_password" name="admin_password" placeholder="{{ __('messages.admin_password') }}">
                                <label for="admin_password">{{ __('messages.admin_password') }}</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select rounded-3" id="role" name="role" required>
                                    <option value="">{{ __('messages.select_role') }}</option>
                                    <option value="registered">{{ __('messages.registered_user') }}</option>
                                    <option value="admin">{{ __('messages.admin_user') }}</option>
                                </select>
                                <label for="role">{{ __('messages.role') }}</label>
                            </div>
                            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">{{ __('messages.sign_up') }}</button>
                        </form>
                        <script src="/js/register-admin.js"></script>
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
