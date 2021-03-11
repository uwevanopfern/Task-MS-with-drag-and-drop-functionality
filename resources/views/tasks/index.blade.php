<!doctype html>
<html>

<head>
    <!-- Scripts -->

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>

    <div class="row mt-5">
        <div class="col-md-10 offset-md-1">
            <a href="{{ route('projects.index')}}">View projects</a>
            <p><a href="{{ route('tasks.create') }}">Add New Task</a></p>
            <h1>Tasks List</h1>
            <table id="table" class="table table-bordered">
                <thead>
                    <tr>
                        <th width="30px">#</th>
                        <th>Task Name</th>
                        <th>Priority</th>
                    </tr>
                </thead>
                <tbody id="tablecontents">
                    @forelse($tasks as $task)
                    <tr class="row1" data-id="{{ $task->id }}">
                        <td class="pl-3"><i class="fa fa-sort"></i></td>
                        <td>{{ $task->task_name }}</td>
                        <td>{{ $task->priority }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            <h5>After you drap and drop the row <button class="btn btn-success btn-sm"
                    onclick="window.location.reload()">REFRESH</button> the page to see the updates</h5>
        </div>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $("#table").DataTable();
    
            $( "#tablecontents" ).sortable({
              items: "tr",
              cursor: 'move',
              opacity: 0.6,
              update: function() {
                  sendOrderToServer();
              }
            });
    
            function sendOrderToServer() {
              var order = [];
              var token = $('meta[name="csrf-token"]').attr('content');
              $('tr.row1').each(function(index,element) {
                order.push({
                  id: $(this).attr('data-id'),
                  position: index+1
                });
              });
    
              $.ajax({
                type: "POST", 
                dataType: "json", 
                url: "{{ url('post-sortable') }}",
                    data: {
                  order: order,
                  _token: token
                },
                success: function(response) {
                    if (response.status == "success") {
                      console.log(response);
                    } else {
                      console.log(response);
                    }
                }
              });
            }
          });
    </script>

</body>

</html>