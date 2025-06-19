@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex flex-col items-center justify-center px-4 py-10 space-y-10 bg-gray-50">
        <h2 class="text-3xl font-bold text-gray-800">{{ $shoppingList->title }}</h2>

        @foreach ($categories as $category)
            <div class="w-full max-w-xl bg-white shadow rounded p-6 space-y-4 text-left">
                <h4 class="text-xl font-semibold text-gray-700">{{ $category->name }}</h4>

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
                                <button type="submit" class="text-red-600 text-sm hover:underline">
                                    Delete
                                </button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach

        <div class="flex gap-4">
            <a href="{{ route('shopping_lists.index') }}" class="bg-gray-300 text-gray-800 px-5 py-2 rounded hover:bg-gray-400">
                Back
            </a>

            <a href="{{ route('shopping_lists.edit', $shoppingList) }}" class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">
                Edit List
            </a>
        </div>
    </div>
@endsection
