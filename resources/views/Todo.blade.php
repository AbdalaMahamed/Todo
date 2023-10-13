<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite('resources/css/app.css')
</head>

<body>
    <div class="container">
        <h1>To-Do List</h1>
        <form action="/todo" method="post" class="input-container">
            @csrf
            <input name="Task"   type="text" placeholder="Add a new task" required>
            <button for="new-task">+</button>
        </form>
        <ul >
            @foreach ($taken as $taak)
                <li action="/edit" >
                    <span class="icons">
                        {{ $taak->task }}
                        <div class="buttonicon">
                            <form action={{ route('todo.edit', $taak->id) }}>
                            <button   class="fas fa-pencil-alt"></button> <!-- Potlood icoon -->
                        </form>
                            <form action="{{ route('destroy', $taak->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="fas fa-trash"></button> <!-- Prullenbak icoon -->
                            </form>
                        </div>
                    </span>
                </li>
            @endforeach
        </ul>
    </div>
</body>

</html>
