@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card border-primary mb-4 shadow-sm">
            <div class="card-body">
                <!-- Header and Add Item button -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="fs-3">Items</h1>
                    <a href="{{ route('items.create') }}" class="btn btn-primary btn-sm">Add Item</a>
                </div>

                <!-- Success message -->
                @if (session('success'))
                    <div class="alert alert-success mb-4">{{ session('success') }}</div>
                @endif

                <!-- Table of items -->
                <table class="table table-striped table-bordered table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Name</th>
                            <th>Brand</th>
                            <th>Model</th>
                            <th>Last Updated</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->brand->name }}</td>
                                <td>{{ $item->model->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->updated_at)->timezone('Asia/Dhaka')->format('F d, Y h:i A') }}</td>
                                <td>
                                    <!-- Edit button with modern look -->
                                    <a href="{{ route('items.edit', $item) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    
                                    <!-- Delete button with modern look -->
                                    <form action="{{ route('items.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
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

                <!-- Pagination -->
                {{ $items->links() }}
            </div>
        </div>
    </div>

    <!-- Include Bootstrap Icons CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>

    <!-- JavaScript confirmation for delete action -->
    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this item?');
        }
    </script>
@endsection
