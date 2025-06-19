@extends('layouts.app')

@section('content')
    <h2>Edit item</h2>

    <form action="{{ route('items.update', $item) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $item->name }}" required>
        <button type="submit">Save</button>
        <a href="{{ route('shopping_lists.show', $item->shoppingList) }}">Cancel</a>
    </form>
@endsection
