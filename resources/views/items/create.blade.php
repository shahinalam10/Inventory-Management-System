@extends('layouts.app')

@section('content')
    <div class="card border-primary mb-4 shadow-sm">
        <div class="card-body">
            <h3 class="font-weight-bold mb-4 fs-4">Add Item</h3>

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

            <!-- Add Item Form -->
            <form action="{{ route('items.store') }}" method="POST">
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
                        <option value="" disabled {{ old('brand_id') ? '' : 'selected' }}>Select Brand</option>
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

                <!-- Model Selection -->
                <div class="mb-4">
                    <label for="model_id" class="form-label fs-6">Model</label>
                    <select 
                        name="model_id" 
                        id="model_id" 
                        class="form-select form-select-md @error('model_id') is-invalid @enderror" 
                        required
                    >
                        <option value="" disabled {{ old('model_id') ? '' : 'selected' }}>Select Model</option>
                    </select>
                    @error('model_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Item Name -->
                <div class="mb-4">
                    <label for="name" class="form-label fs-6">Item Name</label>
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
                    <button type="submit" class="btn btn-success btn-md rounded-3 px-4 py-2">Add Item</button>
                    <a href="{{ route('items.index') }}" class="btn btn-secondary btn-md rounded-3 px-4 py-2">Back</a>
                </div>
            </form>
        </div>
    </div>

    <!-- jQuery and AJAX for dynamic model loading -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        // When a brand is selected
        $('#brand_id').on('change', function() {
            var brandId = $(this).val();
            
            if(brandId) {
                $.ajax({
                    url: '{{ url('models-by-brand') }}/' + brandId, // API endpoint to fetch models
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        var modelSelect = $('#model_id');
                        modelSelect.empty(); // Clear existing options
                        modelSelect.append('<option value="">Select a model</option>'); // Default option
                        
                        $.each(data, function(key, model) {
                            modelSelect.append('<option value="' + model.id + '">' + model.name + '</option>');
                        });
                    }
                });
            } else {
                $('#model_id').empty().append('<option value="">Select a model</option>'); // Clear models if no brand is selected
            }
        });
    });
    </script>
@endsection
