<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shopping List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
</head>
<body>
    <h1><a href="{{ route('shopping_lists.index') }}">Shopping Lists</a></h1>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    @yield('content')
</body>
</html>
