<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="container">
        <h1>change Task</h1>
        <form action="{{ route('update', $taak->id) }}" method="post" class="input-container">
            @csrf
            @method('PUT')
            <input name="Task" type="text" value="{{ $taak->task }}" required>
            <button >Save</button>
        </form>
    </div>
</body>

</html>
