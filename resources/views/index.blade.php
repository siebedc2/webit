@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-4">
            <a href="{{ asset('/product/' . $product->slug) }}">{{$product->name}}</a>
        </div>
        @endforeach
    </div>
</div>
@endsection