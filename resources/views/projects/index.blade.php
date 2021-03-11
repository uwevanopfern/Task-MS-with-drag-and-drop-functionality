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
                <a href="{{ route('tasks.index')}}">View tasks</a>
                <h1>Projects List</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p><a href="{{ route('projects.create') }}">Add Project</a></p>
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
        @forelse($projects as $project)
        <div class="row">
            <div class="col-4">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{ route('projects.show', ['project' => $project]) }}">
                            ID: {{ $project->id }} || Name: {{ $project->project_name }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        @empty
        <p>No projects Added Yet!!</p>
        @endforelse
        <div class="row">
            <div class="col-12 d-flex justify-content-center pt-4">
                {{ $projects->links() }}
            </div>
        </div>
    </div>
</body>

</html>