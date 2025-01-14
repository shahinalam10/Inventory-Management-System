@extends('layouts.app')

@section('content')
    <div class="card border-primary mb-4 shadow-sm">
        <div class="card-body">
            <h3 class="font-weight-bold mb-4 fs-4">Create Model</h3>

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
            <form action="{{ route('models.store') }}" method="POST">
                @csrf

                <!-- Brand Selection -->
                <div class="mb-4">
                    <label for="brand_id" class="form-label fs-6">Brand</label>
                    <select 
                        name="brand_id" 
                        id="brand_id" 
                        class="form-select form-select-md @error('brand_id') is-invalid @enderror" 
                        required
                    >
                        <option value="" disabled {{ old('brand_id') ? '' : 'selected' }}>Select a Brand</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                {{ $brand->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('brand_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Model Name -->
                <div class="mb-4">
                    <label for="name" class="form-label fs-6">Model Name</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        class="form-control form-control-md @error('name') is-invalid @enderror" 
                        value="{{ old('name') }}" 
                        required>
                </div>

                <!-- Buttons -->
                <div class="d-flex justify-content-start gap-3">
                    <button type="submit" class="btn btn-success btn-md rounded-3 px-4 py-2">Save</button>
                    <a href="{{ route('models.index') }}" class="btn btn-secondary btn-md rounded-3 px-4 py-2">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
