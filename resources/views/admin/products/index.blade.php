@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> Products
                        <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm text-white float-end">Add products</a>
                    </h4>
                </div>
                <div class="card-body">
                    @if(session ('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                   @endif
                   <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ( $products as $product)
                            
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>
                                @if($product->category)
                                {{$product->category->name}}
                                @else
                                    No Category
                                @endif
                            </td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->selling_price}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{$product->status=='0'? 'Hidden':'Visible'}}</td>
                            <td>
                                <a href="{{route('product.edit',['product_id' => $product->id])}}" class="btn btn-success btn-sm">Edit</a>
                                <a href="{{route('product.delete',['product_id' => $product->id])}}" onclick="return confirm('Are You sure you want to delete this data?')" class="btn btn-danger btn-sm">
                                    Delete</a>
                            </td>
                        </tr>
                        @empty
                           <tr>
                            <td colspan="7">No Products Available
                                </td></tr> 
                        @endforelse
                    </tbody>
                </table>
                </div>
            @endsection
