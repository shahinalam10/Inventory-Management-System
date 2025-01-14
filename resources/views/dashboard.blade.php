@extends('layouts.app')

@section('content')
<div class="container-fluid py-5" style="background: linear-gradient(to right, #f8f9fa, #e9ecef); min-height: 100vh;">
    <!-- Dashboard Header -->
    <div class="mb-5 text-center">
        <h1 class="text-dark text-uppercase fw-bold">
            Inventory Management System
        </h1>
        <p class="text-muted" style="font-size: 1.1rem;">
            A quick overview of your inventory's key metrics at a glance.
        </p>
    </div>

    <!-- Dashboard Cards -->
    <div class="container">
        <div class="row g-4">
            <!-- Total Items Card -->
            <div class="col-12 col-md-4">
                <div class="card shadow border-0 rounded-4">
                    <div class="card-header bg-gradient-primary text-white d-flex align-items-center rounded-top-4 p-3">
                        <h6 class="mb-0 fw-bold">Total Items</h6>
                        <i class="bi bi-box ms-auto" style="font-size: 1.8rem;"></i>
                    </div>
                    <div class="card-body text-center">
                        <h4 class="fw-bold text-dark">{{ $itemCount }}</h4>
                        <p class="text-muted mb-0">Track your inventory with ease and stay updated on total items.</p>
                    </div>
                    <div class="card-footer bg-transparent border-0 text-center">
                        <a href="{{ route('items.index') }}" class="btn btn-outline-primary btn-sm rounded-pill">
                            View All Items
                        </a>
                    </div>
                </div>
            </div>

            <!-- Total Models Card -->
            <div class="col-12 col-md-4">
                <div class="card shadow border-0 rounded-4">
                    <div class="card-header bg-gradient-success text-white d-flex align-items-center rounded-top-4 p-3">
                        <h6 class="mb-0 fw-bold">Total Models</h6>
                        <i class="bi bi-gear ms-auto" style="font-size: 1.8rem;"></i>
                    </div>
                    <div class="card-body text-center">
                        <h4 class="fw-bold text-dark">{{ $modelCount }}</h4>
                        <p class="text-muted mb-0">Organize your models effortlessly with a comprehensive count.</p>
                    </div>
                    <div class="card-footer bg-transparent border-0 text-center">
                        <a href="{{ route('models.index') }}" class="btn btn-outline-success btn-sm rounded-pill">
                            View All Models
                        </a>
                    </div>
                </div>
            </div>

            <!-- Total Brands Card -->
            <div class="col-12 col-md-4">
                <div class="card shadow border-0 rounded-4">
                    <div class="card-header bg-gradient-info text-white d-flex align-items-center rounded-top-4 p-3">
                        <h6 class="mb-0 fw-bold">Total Brands</h6>
                        <i class="bi bi-clipboard-data ms-auto" style="font-size: 1.8rem;"></i>
                    </div>
                    <div class="card-body text-center">
                        <h4 class="fw-bold text-dark">{{ $brandCount }}</h4>
                        <p class="text-muted mb-0">Monitor your brands for efficient inventory management.</p>
                    </div>
                    <div class="card-footer bg-transparent border-0 text-center">
                        <a href="{{ route('brands.index') }}" class="btn btn-outline-info btn-sm rounded-pill">
                            View All Brands
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-gradient-primary {
        background: linear-gradient(135deg, #3498db, #2980b9);
    }
    .bg-gradient-success {
        background: linear-gradient(135deg, #27ae60, #1e8449);
    }
    .bg-gradient-info {
        background: linear-gradient(135deg, #00bcd4, #0288d1);
    }
    body {
        background: linear-gradient(90deg, #ffffff, #f8f9fa, #e9ecef);
    }
</style>
@endsection
