@extends('layouts.app')

@section('meta')
    <title>{{ $product->name }}</title>
@endsection

@section('content')
<div class="container">
    <div class="row mt-4 d-flex align-items-center">
        <div class="col-md-6">
            <div style="background-image: url(/images/{{ $product->pictures }})" class="product-image w-100"></div>
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
                    <p>Heighist bid: <strong>&euro;{{ $highest_bid }}</strong></p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @auth
                        <form method="POST">
                            {{csrf_field()}}

                            <input type="hidden" name="user_id" id="user_id" value="{{ Auth::id() }}">
                            <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">

                            <div class="form-group">
                                <label for="price">Bid</label>
                                @if(empty($product->bids)) 
                                <input type="number" min="{{ $product->min_bid }}" class="form-control" name="price" id="price" required>
                                @else
                                <input type="number" min="{{ $highest_bid + 1 }}" class="form-control" name="price" id="price" required>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Place bid</button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection