@extends('layouts.app')

@section('content')
    <h2>Edit list</h2>

    <form action="{{ route('shopping_lists.update', $shoppingList) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{ $shoppingList->title }}" required>
        <button type="submit">Save</button>
    </form>
@endsection
