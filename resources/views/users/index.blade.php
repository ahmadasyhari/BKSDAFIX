@extends('layouts.admin')

@section('nav')
    @include('partials.sidebar')
@endsection

@section('content')
    <h1>Users</h1>
    <a href="{{ route('users.create') }}">Create User</a>

    <ul>
        @foreach ($users as $user)
            <li>{{ $user->name }} - <a href="{{ route('users.show', $user->id) }}">View</a> | <a href="{{ route('users.edit', $user->id) }}">Edit</a> | 
            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
            </li>
        @endforeach
    </ul>
@endsection
