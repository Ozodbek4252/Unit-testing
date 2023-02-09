@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Table head</h4>
                    <div class="table-responsive">
                        <table class="table mb-3">
                            @auth
                                @if (Auth::user()->type == 1)
                                    <a href="{{ Route('products.create') }}" class="btn btn-primary mb-2">Create Product</a>
                                @endif
                            @endauth
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->type }}</td>
                                        <td>{{ $product->price }}</td>
                                        @auth
                                            <td>
                                                <button class="btn btn-primary">Add to Cart</button>
                                                <a href="{{ Route('products.edit', $product->id) }}"
                                                    class="btn btn-warning">Edit</a>
                                            </td>
                                        @endauth
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">No products found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
