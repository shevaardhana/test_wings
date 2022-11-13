@extends('layout')

@section('content')

<div class="row">
    <div class="col-md-4"></div>

    <div class="col-md-6">
        <div class="card mt-5" style="width: 400px;">
            <div class="card-title">
                <h4 class="text-center">Login</h4>
            </div>
            <div class="card-body">
                <!-- form ke login controller no ajax -->
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="user" class="form-label">User</label>
                        <input type="text" class="form-control" id="user" name="user">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <div class="text-center">
                        <button class="btn btn-primary1" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-2"></div>
</div>

@push('after-style')
    <style>
        .btn-primary1 {
            font-family: Raleway-SemiBold;
            font-size: 15px;
            color: white;
            letter-spacing: 1px;
            line-height: 15px;
            background-color:rgba(58, 133, 191, 0.75);
            border-radius: 40px;
            transition: all 0.3s ease 0s;
            padding: 0px, 10px, 0px, 10px;
        }
    </style>
@endpush

