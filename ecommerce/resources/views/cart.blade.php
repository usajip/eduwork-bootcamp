@extends('layout')
@section('title', 'Shopping Cart')
@section('content')
    <!-- Shopping Cart -->
    <div class="container mt-5">
        <h1 class="text-center mb-4">Shopping Cart</h1>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Product 1 -->
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="https://via.placeholder.com/50" alt="Product 1" class="me-3">
                                <span>Product 1</span>
                            </div>
                        </td>
                        <td>$10.00</td>
                        <td>
                            <input type="number" class="form-control" value="1" min="1">
                        </td>
                        <td>$10.00</td>
                        <td>
                            <button class="btn btn-danger btn-sm">Remove</button>
                        </td>
                    </tr>
                    <!-- Product 2 -->
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="https://via.placeholder.com/50" alt="Product 2" class="me-3">
                                <span>Product 2</span>
                            </div>
                        </td>
                        <td>$20.00</td>
                        <td>
                            <input type="number" class="form-control" value="2" min="1">
                        </td>
                        <td>$40.00</td>
                        <td>
                            <button class="btn btn-danger btn-sm">Remove</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Cart Total -->
        <div class="d-flex justify-content-end mt-4">
            <div class="border p-4">
                <h5>Total: <span class="text-primary">$50.00</span></h5>
                <button class="btn btn-success w-100 mt-2">Proceed to Checkout</button>
            </div>
        </div>
    </div>
@endsection
