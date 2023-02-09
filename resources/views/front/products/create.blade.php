@extends('layouts.admin')

@section('content')
    <table class="table table-bordered">

        <a href="/products" class="btn btn-primary mb-2">Back</a>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create Product</h4>

                        <form action="/products" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label for="type">Type</label>
                                <input type="text" name="type" class="form-control" id="type"
                                    placeholder="Enter Type">
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" name="price" class="form-control" id="price"
                                    placeholder="Enter Price">
                            </div>
                            <button type="submit" class="btn btn-success mt-2">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </table>
@endsection
