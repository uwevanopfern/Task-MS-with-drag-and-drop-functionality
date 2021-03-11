<!doctype html>
<html>

<head>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.13.0/Sortable.min.js"></script>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('projects.index')}}">View projects</a>
                <h1>Tasks List</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p><a href="{{ route('tasks.create') }}">Add New Task</a></p>
            </div>
            @if(Session::has('success'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                {{session('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>
        @forelse($tasks as $task)
        <div class="row">
            <div class="col-4">
                <ul class="list-group">
                    <li class="list-group-item" >
                        <a href="{{ route('tasks.show', ['task' => $task]) }}">
                            ID: {{ $task->id }} || Name: {{ $task->task_name }} || Priority: {{ $task->priority }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        @empty
        <p>No tasks Added Yet!!</p>
        @endforelse
        <div class="row">
            <div class="col-12 d-flex justify-content-center pt-4">
                {{ $tasks->links() }}
            </div>
        </div>
    </div>
</body>

</html>

<script>
    const dragArea = document.querySelector('.list-group');
    new Sortable(dragArea,{
        animation:350
    });
</script>