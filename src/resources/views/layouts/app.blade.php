<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'LaravelDataHub') }}</title>

    <!-- Bootstrap CSS (via CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'LaravelDataHub') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarNav" aria-controls="navbarNav" 
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!-- Main Content with Conditional Sidebar -->
    <div class="container-fluid">
        <div class="row">
            @if(!request()->is('/'))
                <!-- Sidebar -->
                <aside class="col-md-3 col-lg-2 bg-light border-end min-vh-100">
                    <div class="p-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/posts-typicode') }}">Typicode Posts</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/posts-placeholder') }}">Placeholder.org Posts</a>
                            </li>
                            <!-- Add more links here -->
                        </ul>
                    </div>
                </aside>
            @endif

            <!-- Page Content -->
            <main class="@if(!request()->is('/')) col-md-9 col-lg-10 @else col-12 @endif p-4">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-light text-center py-3 mt-4">
        <small>&copy; {{ date('Y') }} LaravelDataHub. All rights reserved.</small>
    </footer>

    <!-- Bootstrap JS (via CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
