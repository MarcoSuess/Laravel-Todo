<ul>
    <li class="{{ $todoList->done ? 'line-through' : '' }}">
        {{ $todoList->content }}

        <form id="todoDone-{{ $todoList->id }}" action="{{ route('update', $todoList->id) }}"
            method="post">
            @csrf
            @method('post')

            <input onClick="document.getElementById('todoDone-{{ $todoList->id }}').submit()"
                id="checkbox-{{ $todoList->id }}" {{ $todoList->done == true ? 'checked' : '' }}
                name="done" type="checkbox">

        </form>

    </li>
</ul>