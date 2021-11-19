@extends('layouts.gatewayLayout')

@section('content')
    <div class="row justify-content-center form-bg-image" data-background-lg="../../assets/img/illustrations/signin.svg">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
                <div class="text-center text-md-center mb-4 mt-md-0">
                    <h1 class="mb-0 h3">Create Account</h1>
                </div>

                @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Try Again!</strong> Your account might already be created
                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group">
                        {{-- Name --}}
                        <div class="form-group mb-4">
                            <label for="name">Your Name</label>
                            <div class="input-group">
                                <input type="name" class="form-control @error('name') border-danger @enderror" value="{{ old('name') }}" id="name" name="name" placeholder="Your Name" autofocus required>
                            </div>

                            @if ($errors->has('name'))
                                <small class="form-text text-danger">{{ $errors->first('name') }}</small>
                            @else
                                <small class="form-text text-muted">Your name please keep it unique.</small>
                            @endif
                        </div>

                        {{-- Email --}}
                        <div class="form-group mb-4">
                            <label for="email">Your Email</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">
                                    <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                                </span>
                                <input type="email" class="form-control @error('email') border-danger @enderror" placeholder="example@company.com" id="email" name="email" value="{{ old('email') }}" autofocus required>
                            </div>
                            
                            @if ($errors->has('email'))
                                <small class="form-text text-danger">{{ $errors->first('email') }}</small>
                            @else
                                <small class="form-text text-muted">Your Email.</small>
                            @endif
                        </div>

                        {{-- Password --}}
                        <div class="form-group mb-4">
                            <label for="password">Your Password</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon2">
                                    <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>
                                </span>
                                <input type="password" placeholder="Password" class="form-control @error('password') border-danger @enderror" name="password" id="password" required>
                            </div>
                            
                            @if ($errors->has('password'))
                                <small class="form-text text-danger">{{ $errors->first('password') }}</small>
                            @else
                                <small class="form-text text-muted">Your password.</small>
                            @endif
                        </div>

                        {{-- Confirm Password --}}
                        <div class="form-group mb-4">
                            <label for="password-confirm">Confirm Password</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon2">
                                    <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>
                                </span>
                                <input type="password" placeholder="Confirm Password" class="form-control" id="password-confirm" name="password_confirmation" required>
                            </div>
                        </div>

                        <!-- End of Form -->
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="terms" required>
                                <label class="form-check-label fw-normal mb-0" for="terms">
                                    I agree to the <a href="#" class="fw-bold">terms and conditions</a>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-gray-800">Sign in</button>
                    </div>
                </form>

                <div class="d-flex justify-content-center align-items-center mt-4">
                    <span class="fw-normal">
                        Already have an account? 
                        <a href="{{ route('login') }}" class="fw-bold">Login here</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
@endsection
