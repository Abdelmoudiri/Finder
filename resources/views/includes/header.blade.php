<nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">
            <i class="fas fa-search-location me-2"></i>
            {{config('app.name')}}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/"><i class="fas fa-home me-1"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/"><i class="fas fa-bullhorn me-1"></i> Annonces</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('getAnnoncepage')}}">
                        <i class="fas fa-plus-circle me-1"></i> Ajouter Annonce
                    </a>
                </li>
            </ul>

            <div class="d-flex align-items-center">
                <form class="d-flex me-3" role="search">
                    <div class="input-group">
                        <input class="form-control search-input" type="search" placeholder="Search..." aria-label="Search">
                        <button class="btn btn-light" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>

                @auth
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-1"></i> {{auth()->user()->name}}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{route('profile')}}"><i class="fas fa-user me-2"></i>Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{route('logout')}}"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                        </ul>
                    </div>
                @else
                    <div class="auth-buttons">
                        <a class="btn btn-outline-light me-2" href="{{route('login')}}">Login</a>
                        <a class="btn btn-light" href="{{route('register')}}">Register</a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>

<style>
.custom-navbar {
    background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
    padding: 1rem 0;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.navbar-brand {
    font-size: 1.5rem;
    letter-spacing: 0.5px;
}

.nav-link {
    font-weight: 500;
    padding: 0.5rem 1rem !important;
    transition: all 0.3s ease;
}

.nav-link:hover {
    transform: translateY(-2px);
}

.search-input {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    border: none;
}

.search-input:focus {
    box-shadow: none;
}

.dropdown-menu {
    border: none;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
}

.dropdown-item {
    padding: 0.5rem 1.5rem;
}

.auth-buttons .btn {
    font-weight: 500;
    padding: 0.375rem 1.5rem;
}
</style>
