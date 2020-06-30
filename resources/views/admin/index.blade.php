@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">
            <a href="/admindashboard/bids" class="btn btn-primary">Bids</a>
        </div>
        <div class="col-6">
            <a href="/admindashboard/products/change" class="btn btn-primary">Create product</a>
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
                <p>{{ $product->name }}</p>
            </div>
            <div class="col-6 border">
                <p>{{ $product->description }}</p>
            </div>
            <div class="col-3 border">
                <a href="/admindashboard/products/details/{{$product->slug}}" class="btn btn-primary">Details</a>

                <a href="/admindashboard/products/change/{{$product->slug}}" class="btn btn-primary">Edit</a>

                <form onclick="return confirm(`Are you sure?`)" action="/admindashboard/products/delete/{{ $product->id }}" method="post">
                    {{csrf_field()}}                 
                    <button class="btn btn-primary" type="submit">Delete</button>
                </form>
            </div>
        </div>
        @endif
    @endforeach
</div>
@endsection