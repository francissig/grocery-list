@extends('layouts.app')

@section('content')
    <h2>{{ $shoppingList->title }}</h2>

    @foreach ($categories as $category)
        <div>
            <h4>{{ $category->name }}</h4>

            <form action="{{ route('items.store', $shoppingList) }}" method="POST">
                @csrf
                <input type="hidden" name="category_id" value="{{ $category->id }}">
                <input type="text" name="name" placeholder="Add an item" required>
                <button type="submit">Add</button>
            </form>

            <ul>
                @foreach ($shoppingList->items->where('category_id', $category->id) as $item)
                    <li>
                        <form method="POST" action="{{ route('items.toggle', $item) }}" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <input type="checkbox" onchange="this.form.submit()" {{ $item->purchased ? 'checked' : '' }}>
                        </form>

                        <span>{{ $item->name }}</span>

                        <a href="{{ route('items.edit', $item) }}">Edit</a>

                        <form action="{{ route('items.destroy', $item) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach

    <form action="{{ route('shopping_lists.index') }}" method="GET">
        <button type="submit">Finalize List and Return to All Lists</button>
    </form>
@endsection
