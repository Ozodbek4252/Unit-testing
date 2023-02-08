Products Page

{{-- create table for product  --}}
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->type }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    {{--  <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">View</a>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>  --}}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No products found</td>
            </tr>
        @endforelse
    </tbody>

</table>
