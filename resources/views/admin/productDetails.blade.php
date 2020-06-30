@extends('layouts.app')

@section('meta')
    <title>{{ $product->name }}</title>
@endsection

@section('content')
<div class="container">
    <div class="row mt-4 d-flex align-items-center">
        <div class="col-md-6">
            <div style="background-image: url(/images/uploads/{{ $product->pictures }})" class="product-image w-100"></div>
        </div>

        <div class="col-md-6">
            <div class="row">
                <div class="col-12">
                    <h2>{{ $product->name }}</h2>
                </div>
                <div class="col-12">
                    <p>{{ $product->description }}</p>
                </div>
                <div class="col-md-6">
                    <p>Minimum bid: <strong>&euro;{{ $product->min_bid }}</strong></p>
                </div>
                <div class="col-md-6">
                    <p>Heighist bid: <strong>&euro;{{ $highest_bid->price ?? '-' }}</strong></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection