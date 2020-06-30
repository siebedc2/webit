@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Change password</h2>
        </div>
    </div>
    <div class="row">
        @if(session('errors'))
            <div class="col-12">
                <div class="alert alert-danger text-center">
                    {{session('errors.message')}}
                </div>
            </div>
        @endif

        @if (session('status'))
            <div class="col-12">
                <div class="alert alert-success text-center">
                    {{ session('status') }}
                </div>
            </div>
        @endif

        <div class="col-12">
            <form method="POST">
                {{csrf_field()}}                                
                <div class="form-group">
                    <input name="newPassword" type="password" class="w-100 bg-light form-control" id="newPassword" placeholder="new password" required>
                </div>
                <div class="form-group">
                    <input name="repeatNewPassword" type="password" class="w-100 bg-light form-control" id="repeatNewPassword" placeholder="repeat new password" required>
                </div>

                <button type="submit" class="btn btn-primary">Change password</button>
            </form>
        </div>
    </div>
</div>
@endsection