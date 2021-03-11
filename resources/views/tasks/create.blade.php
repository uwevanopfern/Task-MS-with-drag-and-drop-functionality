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
            <h1>Add New Task</h1>
            @if(session('errors'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{session('errors')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <form action="{{ route('tasks.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputEmail1">Task Name</label>
                    <input type="text" name="task_name" class="form-control" placeholder="Enter task name">
                </div>
                <div class="form-group">
                    <select class="form-control" name="project_id">
                        @foreach($projects as $project)
                        <option value={{ $project->id }}>{{ $project->project_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Task Priority</label>
                    <input type="number" name="priority" class="form-control"
                        placeholder="Enter task priority, eg: 1 or 3">
                </div>
                <button type="submit" class="btn btn-primary">Add Task</button>
            </form>
        </div>
    </div>
</div>