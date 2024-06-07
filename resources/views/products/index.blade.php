@extends('layout.main')
@section('admin-content')
    @include('include.sidenav')
    @include('include.topbar')
    <div class="card-lg">
        <div class="actions">
            <form action="" method="post">
                <input type="text" class="input-search" placeholder="Search..."><button class="btn-search"><x-fas-search
                        class="fas-icon" /></button>
            </form>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Supplier</th>
                    <th scope="col">Category</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Barcode</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->supplier_name }}</td>
                        <td>{{ $product->category_name }}</td>
                        <td>{{ $product->brand_name }}</td>
                        <td>{{ $product->barcode }}</td>
                        <td>{{ $product->unit_price }}</td>
                        <td>{{ $product->unit_in_stock }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#showProduct">View</button>
                                <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editProduct">Edit</button>
                                <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#deleteProduct">Delete</button>
                            </div>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="paginator">
            {{$products->links()}}
        </div>
    </div>
<!--Floating Action Button-->
<button class="btn fab">Add Product</button>

@extends('products.show')
@extends('products.edit')
@extends('products.delete')
@endsection