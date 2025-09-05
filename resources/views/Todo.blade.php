<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional To-Do List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite('resources/css/app.css')
</head>

<body>
    <div class="container">
        <h1>My Tasks</h1>
        <form action="/todo" method="post" class="input-container">
            @csrf
            <input name="Task" type="text" placeholder="Add a new task..." required>
            <button type="submit" class="add-btn"><i class="fas fa-plus"></i></button>
        </form>

        <ul class="task-list">
            @foreach ($taken as $taak)
                <li>
                    <span class="task-name">{{ $taak->task }}</span>
                    <div class="task-buttons">
                        <form action="{{ route('todo.edit', $taak->id) }}" method="GET">
                            <button class="edit-btn"><i class="fas fa-pencil-alt"></i></button>
                        </form>
                        <form action="{{ route('destroy', $taak->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="delete-btn"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</body>

</html>
