@extends('layouts.frontend_theme')

@section('body')
    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__text">
                        <div class="section-title">
                            <h2>{{ __('Login') }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact__form">
                        <form method="POST" id="loginForm" action="{{ route('login') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" class="@error('email') is-invalid @enderror" required="">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <input type="password" lass="@error('email') is-invalid @enderror" name="password" placeholder="Password" required="">
                                    @error('password')
                                        <label class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </label>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" form="loginForm" class="site-btn">
                                Login
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
@endsection