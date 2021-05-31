@extends('layouts.app')

@section('content')
    <div id="login">
        <div class="container">
            <div class="row justify-content-center align-items-center fullHeight">
                <div class="col-md-5">
                    <div class="login">
                        <div class="heading">{{ __('Store your files') }}</div>

                        <div class="formbody">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group">

                                    <input placeholder="{{ __('E-Mail Address') }}" id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">

                                    <input placeholder="{{ __('Password') }}" id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="form-group mb-0">
                                    <div class="text-center">
                                        <button type="submit" class="but">
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
