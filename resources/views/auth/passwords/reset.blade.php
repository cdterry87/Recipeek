@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns">
        <div class="column is-6 is-offset-3">
            <h1 class="title is-3">Recipeek</h1>
            <h2 class="subtitle is-5">Fill out the form below to reset your password</h2>
            <div class="box">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

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

                    <div class="field">
                        <div class="control">
                            <button type="submit" class="button is-danger">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
