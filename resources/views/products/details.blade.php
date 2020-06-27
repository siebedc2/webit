@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">

        </div>

        <div class="col-md-6">
            <div class="row">
                <div class="col-12">
                    <h2>{{ $product->name }}</h2>
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
                                <label for="price">Bod</label>
                                <input type="number" min="{{ $product->min_bid }} " class="form-control" name="price" id="price" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Place bid</button>
                        </form>
                    @endauth
                </div>
            </div>
            <div class="row">
                @foreach($product->bids as $bid)
                    <div class="col-12">
                        {{ $bid->price }}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection