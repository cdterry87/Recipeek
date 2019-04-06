@extends('layouts.template')

@section('content')
<div class="container">
    <section class="hero">
        <div class="hero-body">
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    <h1 class="title is-3 has-text-centered">Recipeek</h1>
                    <h2 class="subtitle is-5 has-text-centered">Login, and start cookin'!</h2>
                    <div class="box">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="field">
                                <div class="control">
                                    <input type="email" class="input is-large" name="email" placeholder="Your email">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input type="password" class="input is-large" name="password" placeholder="Your password">
                                </div>
                            </div>
                            <div class="field">
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">{{ __('Remember Me') }}</label>
                            </div>
                            <div class="field is-grouped is-grouped-centered">
                                <div class="control">
                                    <button type="submit" class="button is-danger is-medium" name="login">Login</button>
                                    <a href="{{ route('register') }}" class="button is-link is-medium">Create an Account</a>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control has-text-centered">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
