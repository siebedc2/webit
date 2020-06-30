@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">
            <h2>Bids</h2>
        </div>
        <div class="col-6 d-flex justify-content-end">
            <a href="/userdashboard/changePassword"><i class="pr-1 fa fa-cog"></i></i>change password</a>
        </div>
    </div>
    <div class="row">
        <div class="col-4 border">
            <p class="py-2 mb-0"><strong>date</strong></p>
        </div>
        <div class="col-4 border">
            <p class="py-2 mb-0"><strong>product</strong></p>
        </div>
        <div class="col-4 border">
            <p class="py-2 mb-0"><strong>bid</strong></p>
        </div>
    </div>
    <div class="row">
        @foreach($bids as $bid)
            <div class="col-4 border">
                <p class="py-2 mb-0">{{$bid->created_at}}</p>
            </div>
            <div class="col-4 border">
                <p class="py-2 mb-0">{{$bid->product->name}}</p>
            </div>
            <div class="col-4 border">
                <p class="py-2 mb-0">&euro;{{$bid->price}}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection