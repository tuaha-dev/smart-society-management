<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>SmartSociety</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-responsive {
            -webkit-overflow-scrolling: touch;
        }
        body {
            overflow-x: hidden;
        }
    </style>
</head>
<body class="bg-light">
    
    <!-- Only show the Navbar if the user is NOT on the login page -->
    @if(!request()->routeIs('login'))
    <nav class="navbar navbar-dark bg-primary shadow-sm py-2">
        <div class="container-fluid px-3 d-flex align-items-center justify-content-between">
            <a class="navbar-brand fw-bold mb-0 text-truncate" style="max-width: 140px;" href="/">SmartSociety</a>
            
            @auth
            <div class="d-flex align-items-center gap-2">
                <span class="badge bg-white text-primary text-truncate" style="max-width: 90px;">
                    {{ Auth::user()->username }}
                </span>
                <form action="{{ route('logout') }}" method="POST" class="d-inline m-0">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm px-2 py-1" style="font-size: 0.75rem;">
                        Logout
                    </button>
                </form>
            </div>
            @endauth
        </div>
    </nav>
    @endif

    <main class="container-fluid px-3 py-4">
        @yield('content')
    </main>

    <script href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>