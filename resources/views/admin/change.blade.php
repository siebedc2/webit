@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('status'))
                <div class="col-12">
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                </div>
            @endif

            <form method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group d-none">
                    <label for="id">id</label>
                    <input name="id" type="text" class="w-100 bg-light form-control" id="id" placeholder="id" value="{{ $product->id ?? '' }}">
                </div>                                
                <div class="form-group">
                    <label for="name">Name *</label>
                    <input name="name" type="text" class="w-100 bg-light form-control" id="name" placeholder="name" value="{{ $product->name ?? '' }}" required>
                </div>
                <div class="form-group">
                    <label for="slug">Slug *</label>
                    <input name="slug" type="text" class="w-100 bg-light form-control" id="slug" placeholder="slug" value="{{ $product->slug ?? '' }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Description *</label>
                    <textarea name="description" class="w-100 bg-light form-control" id="description" placeholder="description" rows="3" required>{{ $product->description ?? '' }}</textarea>
                </div>
                <div class="form-group">
                    <label for="pictures">Picture</label>
                    <input name="pictures" type="file" class="form-control-file" id="pictures" value="{{ $product->pictures ?? '' }}">
                </div>
                <div class="form-group">
                    <label for="min_bid">Min bid</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">&euro;</div>
                        </div>
                        <input name="min_bid" min="1" type="number" class="bg-light form-control" id="min_bid" placeholder="min bid" value="{{ $product->min_bid ?? '' }}">               
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Create/update product</button>
            </form>
        </div>
    </div>
</div>
@endsection