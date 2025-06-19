@extends('layouts.app')

@section('content')
    <h2>Create a new shopping list</h2>

    <form action="{{ route('shopping_lists.store') }}" method="POST">
        @csrf
        <label for="title">Title</label>
        <input type="text" name="title" id="title" required>
        <button type="submit">Create list</button>
    </form>
@endsection
