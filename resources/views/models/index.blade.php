@extends('layouts.app')

@section('content')
    <div class="card border-primary mb-4 shadow-sm">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="font-weight-bold fs-4">Model List</h3>
                <a href="{{ route('models.create') }}" class="btn btn-primary btn-md rounded-pill">
                    <i class="bi bi-plus-circle"></i> Add New Model
                </a>
            </div>

            <!-- Success Message -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th class="fs-6 text-center">Id</th>
                            <th class="fs-6">Model Name</th>
                            <th class="fs-6">Brand</th>
                            <th class="fs-6 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($models as $model)
                            <tr>
                                <td class="text-center fs-6">{{ $loop->iteration + ($models->currentPage() - 1) * $models->perPage() }}</td>
                                <td class="fs-6">{{ $model->name }}</td>
                                <td class="fs-6">{{ $model->brand->name }}</td>
                                <td class="text-center fs-6">
                                    <!-- Edit Button -->
                                    <a href="{{ route('models.edit', $model->id) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <!-- Delete Button -->
                                    <form action="{{ route('models.destroy', $model->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this model?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-4 d-flex justify-content-center">
                {{ $models->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
