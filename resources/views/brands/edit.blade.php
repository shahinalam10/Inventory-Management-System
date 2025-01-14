@extends('layouts.app')

@section('content')
    <div class="card border-primary mb-4 shadow-sm">
        <div class="card-body">
            <h3 class="font-weight-bold mb-4 fs-5">Edit Brand</h3>

            <!-- Edit Form -->
            <form action="{{ route('brands.update', $brand->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="name" class="form-label fs-5">Brand Name</label>
                    <input type="text" name="name" id="name" class="form-control form-control-md" value="{{ $brand->name }}" required>
                </div>
                
                <div class="d-flex justify-content-start gap-2">
                    <button type="submit" class="btn btn-success btn-md rounded-3 px-3 py-1">Update</button>
                    <a href="{{ route('brands.index') }}" class="btn btn-secondary btn-md rounded-3 px-3 py-1">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
