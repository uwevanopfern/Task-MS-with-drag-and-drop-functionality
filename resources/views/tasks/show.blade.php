<!doctype html>
<html>

<head>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Details for {{ $task->task_name }}</h1>
            <p><a href="{{ route('tasks.edit', ['task' => $task]) }}">Edit</a></p>

            <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST">
                @method('DELETE')
                @csrf

                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <p><strong>Name</strong> {{ $task->task_name }}</p>
            <p><strong>Priority</strong> {{ $task->priority }}</p>
        </div>
        <p><a href="{{ route('tasks.index')}}">Task list</a></p>
    </div>
</div>