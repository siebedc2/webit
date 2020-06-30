@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($bids as $bid)
            <div class="col-12">
                <p>{{$bid->price}}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection