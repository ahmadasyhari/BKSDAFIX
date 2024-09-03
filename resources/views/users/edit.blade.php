@extends('layouts.admin')

@section('nav')
    @include('partials.sidebar')
@endsection

@section('content')
    <h1>Edit User</h1>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Name:</label>
        <input type="text" name="name" value="{{ $user->name }}" required><br>

        <label>Email:</label>
        <input type="email" name="email" value="{{ $user->email }}" required><br>

        <label>Password:</label>
        <input type="password" name="password"><br>

        <button type="submit">Update</button>
    </form>
@endsection
