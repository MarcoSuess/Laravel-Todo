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
    </style>
</head>

<body class="antialiased">
    <h1>Todo App</h1>
    <input name="showDoneTodo"  type="checkbox">
    <label for="showDoneTodo">Show Done Todos</label>
    <form class="create-todo" action="{{ route('store') }}" method="post">
        @csrf
        <input placeholder="Add your new todo" name="content" type="text">
        <button type="submit">Add</button>
    </form>


    <div class="list">


        @if (count($todoLists))
            @foreach ($todoLists as $todoList)
                <ul>
                    <li>
                        {{ $todoList->content }}
                    
                        <form id="todoDone-{{$todoList->id}}" action="{{ route('update', $todoList->id) }}" method="post">
                            @csrf
                            @method('post')
                            
                            <input  onClick="document.getElementById('todoDone-{{$todoList->id}}').submit()" id="checkbox-{{$todoList->id}}" {{$todoList->done == true ? 'checked' : ''}}  name="done" type="checkbox">

                        </form>
      
                    </li>
                </ul>
            @endforeach
        @endif
    </div>
</body>

</html>
