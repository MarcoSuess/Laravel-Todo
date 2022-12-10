<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">



    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        h1 {
            width: 100%;
            text-align: center;
        }
    </style>
</head>

<body class="antialiased">
    <h1>Todo App</h1>

    <form action="{{ route('store') }}" method="post">
        @csrf
        <input placeholder="Add your new todo" name="content" type="text">
        <button type="submit">Add</button>
    </form>

    @if (count($todoLists))
        @foreach ($todoLists as $todoList)
            <ul>
                <li>
                    {{$todoList->content}}
                </li>
            </ul>
        @endforeach
    @endif
</body>

</html>
