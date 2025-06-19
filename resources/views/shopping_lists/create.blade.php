@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex flex-col items-center justify-center px-4 py-10 bg-gray-50">
        <div class="w-full max-w-md bg-white shadow rounded p-6 space-y-6 text-center">
            <h2 class="text-2xl font-bold text-gray-800">Create a New Shopping List</h2>

            <form action="{{ route('shopping_lists.store') }}" method="POST" class="space-y-4 text-left">
                @csrf

                <div class="flex flex-col">
                    <label for="title" class="mb-1 font-medium text-gray-700">Title</label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        required
                        class="border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                </div>

                <div class="text-right">
                    <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">
                        Create List
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
