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
            <h1>Details for {{ $project->project_name }}</h1>

            <form action="{{ route('projects.destroy', ['project' => $project]) }}" method="POST">
                @method('DELETE')
                @csrf

                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <br>
            <h1>Tasks for {{ $project->project_name }} project</h1>
            <ul class="list-group">
                @forelse($project->tasks as $task)
                <li class="list-group-item">
                    Task name: <strong>{{ $task->task_name }}</strong> with
                    priority<strong> {{$task->priority}}</strong>
                </li>
                @empty
                <p>No tasks belongs to this project</p>
                @endforelse
            </ul>
        </div>
        <br>

        <p><a href="{{ route('projects.index')}}">Projects list</a></p>
    </div>
</div>