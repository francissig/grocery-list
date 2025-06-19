@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex flex-col items-center justify-center px-4 py-10 space-y-10 bg-gray-50">
        <div class="w-full max-w-xl bg-white shadow rounded p-6 space-y-6 text-left">
            <h2 class="text-2xl font-bold text-gray-800">Edit List</h2>

            <form action="{{ route('shopping_lists.update', $shoppingList) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="title" class="block font-medium text-gray-700 mb-1">Title</label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        value="{{ $shoppingList->title }}"
                        required
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                </div>

                <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">
                    Save Title
                </button>
            </form>
        </div>

        @foreach ($categories as $category)
            <div class="w-full max-w-xl bg-white shadow rounded p-6 space-y-4 text-left">
                <h4 class="text-xl font-semibold text-gray-700">{{ $category->name }}</h4>

                <form action="{{ route('items.store', $shoppingList) }}" method="POST" class="flex gap-2">
                    @csrf
                    <input type="hidden" name="category_id" value="{{ $category->id }}">
                    <input
                        type="text"
                        name="name"
                        placeholder="Add an item"
                        required
                        class="flex-1 border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                        Add
                    </button>
                </form>

                <ul class="space-y-2">
                    @foreach ($shoppingList->items->where('category_id', $category->id) as $item)
                        <li class="flex items-center justify-between bg-gray-100 px-4 py-2 rounded">
                            <div class="flex items-center gap-3">
                                <form method="POST" action="{{ route('items.toggle', $item) }}">
                                    @csrf
                                    @method('PATCH')
                                    <input type="checkbox" onchange="this.form.submit()" {{ $item->purchased ? 'checked' : '' }}>
                                </form>

                                <span class="{{ $item->purchased ? 'line-through text-gray-500' : 'text-gray-800' }}">
                                    {{ $item->name }}
                                </span>
                            </div>

                            <form action="{{ route('items.destroy', $item) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 text-sm hover:underline">Delete</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach

        <a href="{{ route('shopping_lists.show', $shoppingList) }}" class="bg-gray-300 text-gray-800 px-6 py-2 rounded hover:bg-gray-400">
            Back to List
        </a>
    </div>
@endsection
