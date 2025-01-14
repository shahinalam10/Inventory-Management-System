@extends('layouts.app')

@section('content')
    <div class="card border-primary mb-4 shadow-sm">
        <div class="card-body">
            <!-- Section Title -->
            <h3 class="font-weight-bold mb-4 fs-5">Create Brand</h3>

            <!-- Display Error Messages -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Create Form -->
            <form action="{{ route('brands.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label fs-5">Brand Name</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        class="form-control form-control-md @error('name') is-invalid @enderror" 
                        value="{{ old('name') }}" 
                        required>
                </div>
                
                <div class="d-flex justify-content-start gap-2">
                    <button type="submit" class="btn btn-success btn-md rounded-3 px-3 py-1">Save</button>
                    <a href="{{ route('brands.index') }}" class="btn btn-secondary btn-md rounded-3 px-3 py-1">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
