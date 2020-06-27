@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h1>User</h1>
        </div>
        <div class="col">
            <a class="font-weight-bold" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout</a>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display:none;">{{ csrf_field() }}</form>
        </div>
    </div>
</div>
@endsection