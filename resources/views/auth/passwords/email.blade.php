@extends('layouts.auth')

@section('content')
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <email :title="'{{ config('app.name') }}'" :errors="'{{ json_encode($errors->all()) }}'"></email>
    </form>
@endsection
