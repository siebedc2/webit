@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($products as $product)
            @if($product->status != 'offline')
                <div class="col-md-3">
                    <a href="{{ asset('/product/' . $product->slug) }}">
                        <div class="row">
                            <div class="col-12">
                                <div style="background-image: url(/images/{{ $product->pictures }})" class="product-image w-100"></div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <p class="text-center">{{ $product->name }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endif
        @endforeach
    </div>
</div>
@endsection