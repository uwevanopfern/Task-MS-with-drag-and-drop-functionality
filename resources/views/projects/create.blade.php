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
            <h1>Add New Project</h1>
            @if(session('errors'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{session('errors')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <form action="{{ route('projects.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputEmail1">Project name</label>
                    <input type="text" name="project_name" class="form-control" placeholder="Enter project name">
                </div>
                <button type="submit" class="btn btn-primary">Add Project</button>
            </form>
        </div>
    </div>
</div>