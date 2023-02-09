@extends('layouts.admin')

@section('content')
    <table class="table table-bordered">

        <a href="/products" class="btn btn-primary mb-2">Back</a>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update Product</h4>

                        <form action="{{Route('products.update', $product->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    value="{{$product->name}}" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label for="type">Type</label>
                                <input type="text" name="type" class="form-control" id="type"
                                    value="{{$product->type}}" placeholder="Enter Type">
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" name="price" class="form-control" id="price"
                                    value="{{$product->price}}" placeholder="Enter Price">
                            </div>
                            <button type="submit" class="btn btn-warning mt-2">Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </table>
@endsection
