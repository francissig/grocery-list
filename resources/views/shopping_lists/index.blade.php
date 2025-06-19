@extends('layouts.app')

@section('content')
    <a href="{{ route('shopping_lists.create') }}">Add a new list</a>

    <ul>
        @forelse ($lists as $list)
            <li>
                <a href="{{ route('shopping_lists.show', $list) }}">{{ $list->title }}</a>
                <a href="{{ route('shopping_lists.edit', $list) }}">Edit</a>
            </li>
        @empty
            <li>No shopping lists yet.</li>
        @endforelse
    </ul>
@endsection
