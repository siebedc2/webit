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
            <div class="row mt-3 mt-md-0">
                <div class="col-12">
                    <h2>{{ $product->name }}</h2>
                </div>
                <div class="col-12">
                    <p>{{ $product->description }}</p>
                </div>
                <div class="col-6">
                    <p>Minimum bid: <strong>&euro;{{ $product->min_bid }}</strong></p>
                </div>
                <div class="col-6">
                    <p>Heighist bid: <strong>&euro;{{ $highest_bid->price ?? '-' }}</strong></p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @auth
                        <form method="POST">
                            {{csrf_field()}}

                            <input type="hidden" name="user_id" id="user_id" value="{{ Auth::id() }}">
                            <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
                            
                            
                            @if(empty($highest_bid) || $highest_bid->user_id != Auth::id())
                                <div class="form-group">
                                    <label for="price">Bid</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">&euro;</div>
                                        </div>
                                        @if($product->bids->count() == 0) 
                                            <input type="number" min="{{ $product->min_bid }}" class="form-control" name="price" id="price" required>
                                        @else
                                            <input type="number" min="{{ $highest_bid->price + 1 }}" class="form-control" name="price" id="price" required>
                                        @endif
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Place bid</button>
                            @else
                                <p class="font-italic">You have the highest bid</p>
                            @endif
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection