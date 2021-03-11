<!doctype html>
<html>

<head>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Edit Task</h1>
                @if(session('errors'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{session('errors')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <form action="{{ route('tasks.update', ['task' => $task]) }}" method="POST">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputEmail1">Task Name</label>
                        <input type="text" name="task_name" value={{ $task->task_name }} class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Task Priority</label>
                        <input type="number" name="priority" value={{ $task->priority }} class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Task</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>