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
</head>

<body class="antialiased">
    <header>
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="/" class="nav-link px-2 text-white ">Home</a></li>
                    <li><a href="/cars/show" class="nav-link px-2 text-white">Listings</a></li>
                </ul>
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                </ul>

                </form>
                @if (Auth::check())
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-light me-2">Logout</button>
                    </form>
                @else
                    <a type="button" href="/auth/login" class="btn btn-outline-light me-2">Login</a>
                    <a type="button" href="/auth/register" class="btn btn-outline-light me-2 active">Register</a>
                @endif
            </div>
        </div>
        </div>
    </header>
    <main>
        <div class="modal modal-sheet position-static d-block " tabindex="-1" role="dialog" id="modalSignin">
            <div class="modal-dialog" role="document">
                <div class="modal-content rounded-4 shadow">
                    <div class="modal-header p-5 pb-4 border-bottom-0">
                        <h1 class="fw-bold mb-0 fs-2">Sign up for free</h1>
                    </div>
                    <div class="modal-body p-5 pt-0">
                        <form class="" method="POST" action="/register">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-3" id="first_name" name="first_name" placeholder="First name" required>
                                <label for="first_name">First name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-3" id="last_name" name="last_name" placeholder="Last name" required>
                                <label for="last_name">Last name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control rounded-3" id="number" name="number" placeholder="Phone number" required>
                                <label for="number">Phone number</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control rounded-3" id="email" name="email" placeholder="Email address" required>
                                <label for="email">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control rounded-3" id="password" name="password" placeholder="Password" required>
                                <label for="password">Password</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control rounded-3" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
                                <label for="password_confirmation">Confirm Password</label>
                            </div>
                            <div class="form-floating mb-3" id="admin-password" style="display:none">
                                <input type="password" class="form-control rounded-3" id="admin_password" name="admin_password" placeholder="Admin Password">
                                <label for="admin_password">Admin Password</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select rounded-3" id="role" name="role" required>
                                    <option value="">Select Role</option>
                                    <option value="registered">Registered User</option>
                                    <option value="admin">Admin User</option>
                                </select>
                                <label for="role">Role</label>
                            </div>
                            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Sign up</button>
                        </form>
                        <script src="/js/register-admin.js"></script>
                    </div>
                </div>
            </div>
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
