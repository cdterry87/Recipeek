@extends('layouts.auth')

@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <register :title="'{{ config('app.name') }}'" :errors="'{{ json_encode($errors->all()) }}'"></register>
    </form>
@endsection
