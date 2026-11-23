@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')

    <h1>Dashboard</h1>

    <p>Olá, {{ $user->name }}!</p>

@endsection
