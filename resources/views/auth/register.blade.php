@extends('layouts.template')

@section('content')
<div class="container">
    <section class="hero">
        <div class="hero-body">
            <div class="columns">
                <div class="column is-8 is-offset-2">
                    <h1 class="title is-3 has-text-centered">Recipeek</h1>
                    <h2 class="subtitle is-5 has-text-centered">Fill out the form below to create an account.</h2>
                    <div class="box">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="field">
                                <div class="control">
                                    <input type="name" class="input is-large" name="name" placeholder="Your name">
                                </div>
                            </div>
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
                                <div class="control">
                                    <input type="password" class="input is-large" name="password_confirmation" placeholder="Confirm password">
                                </div>
                            </div>
                            <div class="field is-grouped is-grouped-centered">
                                <div class="control">
                                    <button type="submit" class="button is-danger is-medium" name="register">Register</button>
                                    <a href="{{ route('login') }}" class="button is-link is-medium">Click to Login</a>
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
