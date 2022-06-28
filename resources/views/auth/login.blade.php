@extends('layouts.auth')

@section('title')
    Login
@endsection

@section('content')
    <div class="container" style="margin-top: 150px; width: 1000px; height: 500px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="d-flex justify-content-center" style="background-color: rgb(240, 240, 240);">
                        <img src="{{ url('/images/logo.png') }}" class="mt-5 w-50" alt="">
                    </div>

                    <div class="card-body" style="background-color: rgb(240, 240, 240)">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3" style="margin-top: 20px">
                                <label for="nik" class="col-md-3 col-form-label text-md-end"></label>

                                <div class="col-md-6">
                                    <input id="nik" type="text"
                                        class="form-control @error('nik') is-invalid @enderror" name="nik"
                                        placeholder="NIK" value="{{ old('nik') }}" required autocomplete="nik" autofocus>

                                    @error('nik')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-3 col-form-label text-md-end"></label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                                        name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Ingat Aku') }}
                                        </label>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="row mb-0">
                                <div class="col-md-3 offset-md-3">
                                    <button type="submit" class="btn btn-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-lock-fill me-2" style="margin-top: -5px"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                                        </svg>{{ __('Login') }}</i>
                                    </button>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Ingat Aku') }}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <a class="btn btn-link" style="margin-top: -7px; margin-left: -13px; color: black"
                                            href="{{ route('password.request') }}">
                                            {{ __('Lupa Password?') }}
                                        </a>
                                    </div>
                                    <div class="form-check" style="margin-top: -5px">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <a class="btn btn-link" style="margin-top: -7px; margin-left: -13px; color: black"
                                            href="{{ route('password.request') }}">
                                            {{ __('Lupa Username?') }}
                                        </a>
                                    </div>
                                    {{-- @if (Route::has('password.request'))
                                        <a class="btn btn-link" style="margin-top: -15px; margin-left: -13px"
                                            href="{{ route('password.request') }}">
                                            {{ __('Lupa Password?') }}
                                        </a>
                                    @endif
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" style="margin-top: -20px"
                                            href="{{ route('password.request') }}">
                                            {{ __('Lupa Username?') }}
                                        </a>
                                    @endif --}}
                                </div>
                                <div class="row">
                                    <div class="col-md-3 offset-md-3" style="margin-left: 159px  ;margin-top: -35px">
                                        <a href="{{ route('home') }}" class="btn btn-primary">Back to home</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
