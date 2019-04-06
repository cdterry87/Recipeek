@extends('layouts.template')

@section('content')
<div class="container">
    <div class="columns">
        <div class="column is-6">
            <h1 class="title is-3">Recipeek</h1>
            <h2 class="subtitle is-5">Verify your email address</h2>
            <div class="box">
                <div class="card-body">
                    @if (session('resent'))
                        <div class="message is-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
