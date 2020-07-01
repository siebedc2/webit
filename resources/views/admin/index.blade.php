@extends('layouts.app')

@section('content')
@include('components.delete-product-popup')
<div class="container">
    <div class="row">
        <div class="col-6">
            <h2>Products</h2>
        </div>
        <div class="col-6 d-flex justify-content-end">
            <a href="/admindashboard/products/change" class="mb-2 btn btn-primary">Create</a>
        </div>
    </div>
    <div class="row">
        @if (session('status'))
            <div class="col-12">
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            </div>
        @endif
    </div>
    <div class="row font-weight-bold">
        <div class="col-3 border">
            <p class="py-2 mb-0">name</p>
        </div>
        <div class="col-6 border">
            <p class="py-2 mb-0">description</p>
        </div>
        <div class="col-3 border">
            <p class="py-2 mb-0">actions</p>
        </div>
    </div>
    @foreach($products as $product)
        @if($product->status != 'offline')
        <div class="row">
            <div class="col-3 border">
                <p class="py-2 mb-0">{{ $product->name }}</p>
            </div>
            <div class="col-6 border">
                <p class="py-2 mb-0">{{ $product->description }}</p>
            </div>
            <div class="col-3 border d-md-flex flex-wrap justify-content-md-between align-items-start py-2">
                <a href="/admindashboard/products/details/{{$product->slug}}" class="btn btn-primary">Details</a>

                <a href="/admindashboard/products/change/{{$product->slug}}" class="btn btn-primary">Edit</a>

                <p hidden>{{$product->id}}</p>
                <a href="/admindashboard/products/delete" class="btn btn-primary delete-product-btn">Delete</a>
            </div>
        </div>
        @endif
    @endforeach
</div>
@endsection