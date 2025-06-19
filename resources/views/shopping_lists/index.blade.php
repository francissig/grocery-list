@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex flex-col items-center justify-center px-4 py-8 space-y-8 bg-gray-50 text-center">
        <h1 class="text-3xl font-bold text-gray-800">All Shopping Lists</h1>

        @if(session('success'))
            <p class="text-green-700 bg-green-100 px-4 py-2 rounded shadow-sm">
                {{ session('success') }}
            </p>
        @endif

        @if($shoppingLists->count())
            <ul class="w-full max-w-md space-y-4">
                @foreach ($shoppingLists as $list)
                    <li class="flex items-center justify-between bg-white shadow-sm px-4 py-3 rounded border border-gray-200">
                        <a href="{{ route('shopping_lists.show', $list) }}" class="text-lg font-medium text-blue-700 hover:underline">
                            {{ $list->title }}
                        </a>

                        <form action="{{ route('shopping_lists.destroy', $list) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this list?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-sm text-red-600 hover:underline">
                                Delete
                            </button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-500 italic">No shopping lists yet.</p>
        @endif

        <a href="{{ route('shopping_lists.create') }}" class="inline-block bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700 transition">
            Create New List
        </a>
    </div>
@endsection
