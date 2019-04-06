@extends('layouts.template')

@section('content')
<div class="container">
    <section class="hero">
        <div class="hero-body">
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    <h1 class="title is-3 has-text-centered">Recipeek</h1>
                    <h2 class="subtitle is-5 has-text-centered">Confirm your email address to reset your password.</h2>
                    <div class="box">
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="field">
                                <div class="control">
                                    <input type="email" class="input is-large" name="email" placeholder="Your email">
                                </div>
                            </div>
                            <div class="field is-grouped is-grouped-centered">
                                <div class="control">
                                    <button type="submit" class="button is-danger is-medium" name="login">Send Password Reset Link</button>
                                    <a href="{{ route('login') }}" class="button is-link is-medium">Return to Login</a>
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
