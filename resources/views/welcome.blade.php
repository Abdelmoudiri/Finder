@extends('layouts')

@section('title', 'Home page')

@section('content')
<div class="hero-section bg-primary text-white py-5 mb-5">
    <div class="container">
        <h1 class="display-4 text-center mb-4">Find What You've Lost</h1>
        <div class="card shadow">
            <div class="card-body">
                <form action="" method="GET" class="row g-3 align-items-center">
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                            <input type="text" name="search" class="form-control form-control-lg" placeholder="Search..." value="{{ request('search') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <select name="type" class="form-select form-select-lg">
                            <option value="">All Types</option>
                            <option value="perdu" {{ request('type') == 'perdu' ? 'selected' : '' }}>Lost</option>
                            <option value="trouvé" {{ request('type') == 'trouvé' ? 'selected' : '' }}>Found</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary btn-lg w-100">
                            Search
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <h2 class="text-center mb-4">Recent Announcements</h2>
    <div class="row g-4">
        @foreach($annonces as $ann)
        <a href="{{route("getAnnonceDetails",$ann)}}" class="col-md-4">
            <div class="card h-100 hover-shadow transition-all">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <h3 class="h5 card-title text-primary mb-0">{{ $ann->titre }}</h3>
                        <span class="badge rounded-pill {{ $ann->type === 'perdu' ? 'bg-danger' : 'bg-success' }}">
                            {{ ucfirst($ann->type) }}
                        </span>
                    </div>
                    <p class="card-text text-muted">{{ Str::limit($ann->description, 100) }}</p>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div class="text-muted small">
                            <i class="fas fa-map-marker-alt me-1"></i>
                            {{ $ann->lieu }}
                        </div>
                        <div class="text-muted small">
                            <i class="fas fa-calendar-alt me-1"></i>
                            {{ \Carbon\Carbon::parse($ann->date)->format('d/m/Y') }}
                        </div>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>

<style>
.hero-section {
    background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
    margin-top: -1.5rem;
}
.hover-shadow:hover {
    transform: translateY(-5px);
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
}
.transition-all {
    transition: all 0.3s ease;
}
</style>
@endsection