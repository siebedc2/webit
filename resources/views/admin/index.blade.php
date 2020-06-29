@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if (session('status'))
            <div class="col-12">
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-12">
            @foreach($products as $product)
                @if($product->status != 'offline')
                    <p>{{ $product->name }}</p>
                    <form onclick="return confirm(`Ben je zeker dat je het product '{{ $product->name }}' wilt verwijderen?`)" action="/admindashboard/products/delete/{{ $product->id }}" method="post">
                        {{csrf_field()}}                 
                        <button class="btn btn-primary" type="submit">Delete</button>
                    </form>
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection