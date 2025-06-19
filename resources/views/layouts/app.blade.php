<!DOCTYPE html>
<html lang="en" data-theme="nord">

<head>
    <meta charset="UTF-8">
    <title>Shopping List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
</head>

<body>

    <div class="navbar bg-base-100 shadow-sm">
        <div class="navbar-start">

            <a href="{{ route('shopping_lists.index') }}" class="btn btn-ghost text-xl">Shopping List</a>
        </div>
        <div class="navbar-center hidden lg:flex">

        </div>
        <div class="navbar-center">
            <a href="{{ route('shopping_lists.create') }}" class="btn">New List</a>
        </div>
    </div>


    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    @yield('content')
</body>

</html>
