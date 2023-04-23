<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Autosales</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="/js/edit-profile.js"></script>    
    </head>
    <body class="antialiased">
      <header class="p-3 text-bg-dark">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
                <span class="fs-4">Autosales</span>
            </a>    
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><a href="/" class="nav-link px-2 text-white">Home</a></li>
              <li><a href="/create" class="nav-link px-2 text-white">Add Car</a></li>
              <li><a href="/user/profile" class="nav-link px-2 text-secondary active">Profile</a></li>
            </ul>  
            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
              <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
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
      </header>
      <div class="container mt-5">
        <h1 class="text-center mb-5">Welcome {{ auth()->user()->first_name }}</h1>
        <div class="card">
          <div class="card-body">
            @if(session('success'))
              <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form method="POST" action="{{ route('profile.update') }}">
              @csrf
              <input type="hidden" name="_method" value="PUT">
              <h5 class="card-title">First Name:</h5>
              <p class="card-text">
                <span id="first_name">{{ auth()->user()->first_name }}</span>
                <input type="text" name="first_name" class="form-control" id="first_name_input" value="{{ auth()->user()->first_name }}" style="display:none;">
              </p>
              <h5 class="card-title">Last Name:</h5>
              <p class="card-text">
                <span id="last_name">{{ auth()->user()->last_name }}</span>
                <input type="text" name="last_name" class="form-control" id="last_name_input" value="{{ auth()->user()->last_name }}" style="display:none;">
              </p>
              <h5 class="card-title">Number:</h5>
              <p class="card-text">
                <span id="number">{{ auth()->user()->number }}</span>
                <input type="text" name="number" class="form-control" id="number_input" value="{{ auth()->user()->number }}" style="display:none;">
              </p>
              <h5 class="card-title">Email:</h5>
              <p class="card-text">
                <span id="email">{{ auth()->user()->email }}</span>
                <input type="email" name="email" class="form-control" id="email_input" value="{{ auth()->user()->email }}" style="display:none;">
              </p>
              <h5 class="card-title">Password:</h5>
              <p class="card-text">
                <span id="password">*******</span>
              </p>
              <div class="form-group new-password-section" style="display:none;">
                <label for="new_password">New Password:</label>
                <input type="password" name="new_password" class="form-control" id="new_password">
              </div>
              <div class="text-center">
                <button type="button" class="btn btn-primary edit-btn">Edit</button>
                <button type="submit" class="btn btn-success save-btn" style="display:none;">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      
    
    
    
    
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    </body>
</html>
