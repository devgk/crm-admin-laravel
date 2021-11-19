@extends('layouts.gatewayLayout')

@section('content')
    <div class="row justify-content-center form-bg-image">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
                <div class="text-center text-md-center mb-4 mt-md-0">
                    <h1 class="mb-0 h3">Access Denied!</h1>
                </div>
                
                <div class="alert alert-danger" role="alert">
                    <strong>Access Denied!</strong> Sorry only admins are allowed to manage products and categories
                    
                </div>

                <div class="text-center">
                    <a class="btn btn-primary" href="{{ route('dashboard') }}">Close</a>
                </div>
            </div>
        </div>
    </div>
@endsection
