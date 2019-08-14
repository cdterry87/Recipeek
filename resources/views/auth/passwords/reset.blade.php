@extends('layouts.auth')

@section('content')
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <reset :title="'{{ config('app.name') }}'" :errors="'{{ json_encode($errors->all()) }}'"></reset>
    </form>
@endsection
