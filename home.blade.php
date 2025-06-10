@extends("parent")

@section('content')
<!-- Hero Banner Section -->
@if(Route::currentRouteName() == "homepage")
  <section class="hero-banner mb-5">
    <div class="container-fluid p-0">
        <img src="{{ asset('images/banner.jpg') }}" class="w-100 img-fluid rounded" alt="Banner" style="max-height: 400px; object-fit: cover;" />
    </div>
   </section>
@endif
<!-- Main Content Section -->
<div class="container my-5">
    <div class="row g-4"> <!-- Added gap for better spacing -->

        <!-- Categories Sidebar -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white fw-bold">
                    Categories
                </div>
                <div class="list-group list-group-flush">
                    @foreach ($categories as $category)
                        <a href="{{route('filter', $category->id)}}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center transition-all hover-bg-light">
                            {{ $category->cat_title }}
                            <span class="badge bg-primary rounded-pill">
                                {{ $category->products->count() }}
                            </span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="col-md-9">
            <div class="row row-cols-1 row-cols-md-3 g-4"> <!-- Responsive grid with 3 columns on medium screens -->
                @forelse ($products as $item)
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0 transition-all hover-shadow">
                            <img src="{{ asset('images/' . $item->image) }}" 
                                 class="card-img-top img-fluid rounded-top" 
                                 alt="{{ $item->title }}" 
                                 style="height: 200px; object-fit: cover;" />
                            <div class="card-body">
                                <h3 class="h6 mb-2">{{ Str::limit($item->title, 50) }}</h3>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="text-primary fw-bold me-2">₹{{ $item->discount_price }}</span>
                                    <del class="text-muted small">₹{{ $item->price }}</del>
                                </div>
                                <a href="" 
                                   class="btn btn-outline-primary btn-sm w-100 mt-2">
                                    View Details
                                </a>
                                <a href="" 
                                   class="btn btn-success btn-sm w-100 mt-2">
                                    Add to Cart
                                </a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <h2 class="display-1 fw-bold text-muted w-100" style="color: #ddd">Not Found</h2>
                    <p class="w-100 lead text-secondary">:( Please try wish another keyword or select other categories </p>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $products->links('pagination::bootstrap-5') }} <!-- Using Bootstrap 5 pagination -->
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom CSS for transitions and hover effects */
    .transition-all {
        transition: all 0.3s ease;
    }
    .hover-bg-light:hover {
        background-color: #f8f9fa;
    }
    .hover-shadow:hover {
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transform: translateY(-5px);
    }
</style>
@endsection