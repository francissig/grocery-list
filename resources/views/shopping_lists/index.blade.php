@extends('layouts.app')

@section('content')
    <h1>Shopping Lists</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="{{ route('shopping_lists.create') }}">Create New List</a>

    @if($shoppingLists->count())
        <ul>
            @foreach ($shoppingLists as $list)
                <li>
                    <a href="{{ route('shopping_lists.show', $list) }}">{{ $list->title }}</a>

                    <form action="{{ route('shopping_lists.destroy', $list) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this list?')">
                            Delete
                        </button>
                    </form>
                </li>
            @endforeach
        </ul>
    @else
        <p>No shopping lists yet.</p>
    @endif
@endsection
