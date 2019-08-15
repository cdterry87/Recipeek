@extends('layouts.auth')

@section('content')
    <div id="welcome">
        <div class="content">
            <div class="m-b-md">
                <div class="title logo">
                    {{ config('app.name', 'Laravel') }}
                </div>
                <div class="subtitle m-t-sm">
                    Something interesting about this site!
                </div>
            </div>
            <div class="links">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}" class="button">Get Started!</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </div>
@endsection
