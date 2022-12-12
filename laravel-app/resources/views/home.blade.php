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
            margin-left: 32px;
        }

        h1 {}

        .create-todo {
            margin-top: 32px;
        }

        li {
            display: flex;
        }

        .line-through {
            text-decoration: line-through;
        }
    </style>
</head>

<body class="antialiased">
    <h1>Todo App</h1>

    <form id="filter" action="{{ route('indexFilter') }}" method="get">
        @csrf
        <input <?php echo isset($_GET['showOpenTodos']) && $_GET['showOpenTodos'] == 'on' ? 'checked' : ''; ?> onclick="document.getElementById('filter').submit()" id="showOpen"
            name="showOpenTodos" type="checkbox">
        <label for="showDoneTodo">Show Open Todos</label>
    </form>


    <form class="create-todo" action="{{ route('store') }}" method="post">
        @csrf
        <input placeholder="Add your new todo" name="content" type="text">
        <button type="submit">Add</button>
    </form>

    <div class="list">
        @if (count($todoLists))
            @foreach ($todoLists as $todoList)
                @include('todo-list')
            @endforeach
        @endif
    </div>
</body>

</html>
