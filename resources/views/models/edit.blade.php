@extends('layouts.app')

@section('content')
    <div class="card border-primary mb-4 shadow-sm">
        <div class="card-body">
            <h3 class="font-weight-bold mb-4 fs-4">Edit Model</h3>

            <!-- Edit Form -->
            <form action="{{ route('models.update', $model->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-4">
                    <label for="brand_id" class="form-label fs-6">Brand</label>
                    <select name="brand_id" id="brand_id" class="form-select form-select-md" required>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" {{ $model->brand_id == $brand->id ? 'selected' : '' }}>
                                {{ $brand->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-4">
                    <label for="name" class="form-label fs-6">Model Name</label>
                    <input type="text" name="name" id="name" class="form-control form-control-md" value="{{ $model->name }}" required>
                </div>

                

                <div class="d-flex justify-content-start gap-3">
                    <button type="submit" class="btn btn-success btn-md rounded-3 px-4 py-2">Update</button>
                    <a href="{{ route('models.index') }}" class="btn btn-secondary btn-md rounded-3 px-4 py-2">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
